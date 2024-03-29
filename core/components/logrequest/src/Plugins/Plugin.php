<?php
/**
 * Abstract plugin
 *
 * @package logrequest
 * @subpackage plugin
 */

namespace TreehillStudio\LogRequest\Plugins;

use modX;
use LogRequest;

/**
 * Class Plugin
 */
abstract class Plugin
{
    /** @var modX $modx */
    protected $modx;
    /** @var LogRequest $logrequest */
    protected $logrequest;
    /** @var array $scriptProperties */
    protected $scriptProperties;

    /**
     * Plugin constructor.
     *
     * @param $modx
     * @param $scriptProperties
     */
    public function __construct($modx, &$scriptProperties)
    {
        $this->scriptProperties = &$scriptProperties;
        $this->modx =& $modx;
        $corePath = $this->modx->getOption('logrequest.core_path', null, $this->modx->getOption('core_path') . 'components/logrequest/');
        $this->logrequest = $this->modx->getService('logrequest', 'LogRequest', $corePath . 'model/logrequest/', [
            'core_path' => $corePath
        ]);
    }

    /**
     * Run the plugin event.
     */
    public function run()
    {
        $init = $this->init();
        if ($init !== true) {
            return;
        }

        $this->process();
    }

    /**
     * Initialize the plugin event.
     *
     * @return bool
     */
    public function init()
    {
        return true;
    }

    /**
     * Process the plugin event code.
     *
     * @return mixed
     */
    abstract public function process();
}