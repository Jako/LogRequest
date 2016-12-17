<?php
/**
 * LogRequest Log Widget
 *
 * @package logrequest
 * @subpackage widget
 */

class modDashboardWidgetLogrequestLog extends modDashboardWidgetInterface
{
    /**
     * @return string
     */
    public function render()
    {
        $corePath = $this->modx->getOption('logrequest.core_path', null, $this->modx->getOption('core_path') . 'components/logrequest/');
        $logrequest = $this->modx->getService('logrequest', 'LogRequest', $corePath . '/model/logrequest/', array(
            'core_path' => $corePath
        ));

        $this->controller->addLexiconTopic($this->widget->get('lexicon'));

        $assetsUrl = $logrequest->getOption('assetsUrl');
        $jsUrl = $logrequest->getOption('jsUrl') . 'mgr/';
        $jsSourceUrl = $assetsUrl . '../../../source/js/mgr/';
        $cssUrl = $logrequest->getOption('cssUrl') . 'mgr/';
        $cssSourceUrl = $assetsUrl . '../../../source/css/mgr/';

        if ($logrequest->getOption('debug') && ($logrequest->getOption('assetsUrl') != MODX_ASSETS_URL . 'components/logrequest/')) {
            $this->controller->addJavascript($jsSourceUrl . 'widgets/rank.grid.js');
            $this->controller->addCss($cssSourceUrl . 'logrequest.css');
        } else {
            $this->controller->addJavascript($jsUrl . 'logrequest.min.js');
            $this->controller->addCss($cssUrl . 'logrequest.min.css');
        }
        $this->controller->addHtml('<script type="text/javascript">Ext.onReady(function() {
    MODx.load({
        xtype: "modx-grid-logrequest-log",
        renderTo: "modx-grid-logrequest-log",
        connector_url: "' . $logrequest->getOption('connectorUrl') . '"
    });
});</script>');

        return $this->getFileChunk($logrequest->getOption('templatesPath') . 'logrequest_log.tpl');
    }
}

return 'modDashboardWidgetLogrequestLog';