<?php
/**
 * LogRequest Log Widget
 *
 * @package logrequest
 * @subpackage widget
 */

require_once(dirname(__FILE__).'/logrequest.widget.php');

class modDashboardWidgetLogrequestLog extends modDashboardWidgetLogrequest
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

return 'modDashboardWidgetLogrequestLog';
