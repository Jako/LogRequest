<?php
/**
 * @package logrequest
 * @subpackage plugin
 */

abstract class LogRequestPlugin
{
    /** @var modX $modx */
    protected $modx;
    /** @var LogRequest $logrequest */
    protected $logrequest;
    /** @var array $scriptProperties */
    protected $scriptProperties;

    public function __construct($modx, &$scriptProperties)
    {
        $this->scriptProperties =& $scriptProperties;
        $this->modx = &$modx;
        $corePath = $this->modx->getOption('logrequest.core_path', null, $this->modx->getOption('core_path') . 'components/logrequest/');
        $this->logrequest = $this->modx->getService('logrequest', 'LogRequest', $corePath . 'model/logrequest/', array(
            'core_path' => $corePath
        ));
    }

    abstract public function run();
}