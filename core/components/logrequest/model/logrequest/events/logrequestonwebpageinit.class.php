<?php
/**
 * @package logrequest
 * @subpackage plugin
 */

class LogRequestOnWebPageInit extends LogRequestPlugin
{
    public function run()
    {
        $triggers = explode(',', $this->logrequest->getOption('trigger'));
        foreach ($triggers as $trigger) {
            if ($trigger && isset($_REQUEST[$trigger])) {
                /** @var LogRequestLog $logEntry */
                if (!$this->modx->getCount('LogRequestLog', array(
                    'trigger' => $trigger,
                    'value' => $_REQUEST[$trigger],
                    'request' => json_encode($_REQUEST),
                    'loggedon:>=' => time() - 10,
                    'loggedon:<=' => time() + 10
                ))
                ) {
                    $logEntry = $this->modx->newObject('LogRequestLog');
                    $logEntry->set('trigger', $trigger);
                    $logEntry->set('value', $_REQUEST[$trigger]);
                    $logEntry->set('request', json_encode($_REQUEST));
                    $logEntry->set('loggedon', time());
                    $logEntry->save();
                }
            }
        }
    }
}
