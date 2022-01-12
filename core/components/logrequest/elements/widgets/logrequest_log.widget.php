<?php
/**
 * LogRequest Log Widget
 *
 * @package logrequest
 * @subpackage widget
 */

require_once dirname(__DIR__, 2) . '/vendor/autoload.php';

use TreehillStudio\LogRequest\Widgets\Widget;

class LogWidget extends Widget
{
    public $cssBlockClass = 'dashboard-block-treehillstudio" id="dashboard-block-treehillstudio-log';

    /**
     * @return string
     */
    public function render()
    {
        return $this->renderCustom('log');
    }
}

return 'LogWidget';
