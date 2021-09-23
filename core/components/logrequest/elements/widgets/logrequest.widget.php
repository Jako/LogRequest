<?php
/**
 * LogRequest Widget
 *
 * @package logrequest
 * @subpackage widget
 */

abstract class modDashboardWidgetLogrequest extends modDashboardWidgetInterface
{
    /**
     * @var LogRequest
     */
    public $logrequest;

    public $cssBlockClass = 'dashboard-block-treehillstudio';

    /**
     * Renders the content of the block in the appropriate size
     * @return string
     */
    public function process()
    {
        $output = $this->render();
        if (!empty($output)) {
            $widgetArray = $this->widget->toArray();
            $widgetArray['content'] = $output;
            $widgetArray['class'] = $this->cssBlockClass;
            $widgetArray['name_trans'] .= '<span class="treehillstudio-widget-about"><img width="91" height="25" src="' . $this->logrequest->getOption('assetsUrl') . 'img/mgr/treehill-studio-mini.png" srcset="' . $this->logrequest->getOption('assetsUrl') . 'img/mgr/treehill-studio-mini@2x.png 2x" alt="Treehill Studio"></span>';
            $output = $this->getFileChunk('dashboard/block.tpl', $widgetArray);
            $output = preg_replace('@\[\[(.[^\[\[]*?)\]\]@si', '', $output);
            $output = preg_replace('@\[\[(.[^\[\[]*?)\]\]@si', '', $output);
        }
        return $output;
    }

    /**
     * modDashboardWidgetLogrequest constructor.
     * @param xPDO $modx
     * @param modDashboardWidget $widget
     * @param modManagerController $controller
     */
    public function __construct(xPDO &$modx, modDashboardWidget &$widget, modManagerController &$controller)
    {
        parent::__construct($modx, $widget, $controller);

        $corePath = $this->modx->getOption('logrequest.core_path', null, $this->modx->getOption('core_path') . 'components/logrequest/');
        $this->logrequest = $this->modx->getService('logrequest', 'LogRequest', $corePath . 'model/logrequest/', array(
            'core_path' => $corePath
        ));

        $this->controller->addLexiconTopic($this->widget->get('lexicon'));
    }

    /**
     * @param $type string
     * @return string
     */
    public function renderCustom($type)
    {
        $assetsUrl = $this->logrequest->getOption('assetsUrl');
        $jsUrl = $this->logrequest->getOption('jsUrl') . 'mgr/';
        $jsSourceUrl = $assetsUrl . '../../../source/js/mgr/';
        $cssUrl = $this->logrequest->getOption('cssUrl') . 'mgr/';
        $cssSourceUrl = $assetsUrl . '../../../source/css/mgr/';

        if ($this->logrequest->getOption('debug') && ($this->logrequest->getOption('assetsUrl') != MODX_ASSETS_URL . 'components/logrequest/')) {
            $this->controller->addJavascript($jsSourceUrl . 'widgets/' . $type . '.grid.js');
            $this->controller->addCss($cssSourceUrl . 'logrequest.css');
        } else {
            $this->controller->addJavascript($jsUrl . 'logrequest.min.js');
            $this->controller->addCss($cssUrl . 'logrequest.min.css');
        }
        $this->modx->controller->addHtml('<script type="text/javascript">'
            . 'var LogRequest = {'
            . 'config : ' . json_encode($this->logrequest->config, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES)
            . '};'
            . '</script>');
        $this->controller->addHtml('<script type="text/javascript">Ext.onReady(function() {
    MODx.load({
        xtype: "modx-grid-logrequest-' . $type . '",
        renderTo: "modx-grid-logrequest-' . $type . '",
        connector_url: "' . $this->logrequest->getOption('connectorUrl') . '"
    });
});</script>');

        return $this->getFileChunk($this->logrequest->getOption('templatesPath') . 'logrequest_' . $type . '.tpl');
    }
}
