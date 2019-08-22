<?php
/**
 * LogRequest Rank Widget
 *
 * @package logrequest
 * @subpackage widget
 */

require_once(dirname(__FILE__) . '/logrequest.widget.php');

class modDashboardWidgetLogrequestRank extends modDashboardWidgetLogrequest
{
    public $cssBlockClass = 'dashboard-block-treehillstudio" id="dashboard-block-treehillstudio-rank';

    /**
     * @return string
     */
    public function render()
    {
        return $this->renderCustom('rank');
    }
}

return 'modDashboardWidgetLogrequestRank';
