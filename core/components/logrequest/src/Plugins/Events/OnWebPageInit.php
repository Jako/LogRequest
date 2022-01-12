<?php
/**
 * @package logrequest
 * @subpackage plugin
 */

namespace TreehillStudio\LogRequest\Plugins\Events;

use LogRequestLog;
use TreehillStudio\LogRequest\Plugins\Plugin;

class OnWebPageInit extends Plugin
{
    public function process()
    {
        $triggers = explode(',', $this->logrequest->getOption('trigger'));
        foreach ($triggers as $trigger) {
            $value = $this->modx->request->getParameters($trigger, 'REQUEST');
            $request = $this->modx->request->getParameters([], 'REQUEST');
            unset($request[$this->modx->getOption('request_param_alias')]);
            if ($value) {
                /** @var LogRequestLog $logEntry */
                if (!$this->modx->getCount('LogRequestLog', [
                    'trigger' => $trigger,
                    'value' => $value,
                    'request' => json_encode($request),
                    'loggedon:>=' => time() - 10,
                    'loggedon:<=' => time() + 10
                ])
                ) {
                    $logEntry = $this->modx->newObject('LogRequestLog');
                    $logEntry->set('trigger', $trigger);
                    $logEntry->set('value', $value);
                    $logEntry->set('request', json_encode($request));
                    $logEntry->set('loggedon', time());
                    $logEntry->save();
                }
            }
        }
    }
}
