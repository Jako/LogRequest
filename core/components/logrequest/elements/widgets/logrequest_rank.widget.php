<?php
/**
 * LogRequest Rank Widget
 *
 * @package logrequest
 * @subpackage widget
 */

require_once dirname(__DIR__, 2) . '/vendor/autoload.php';

use TreehillStudio\LogRequest\Widgets\Widget;

class RankWidget extends Widget
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

return 'RankWidget';
