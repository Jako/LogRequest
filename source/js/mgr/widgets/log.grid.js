/**
 * Loads a grid with the log requests.
 *
 * @class MODx.grid.LogrequestLog
 * @extends MODx.grid.Grid
 * @param {Object} config An object of options.
 * @xtype modx-grid-logrequest-log
 */
MODx.grid.LogrequestLog = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        url: config.connector_url,
        baseParams: {
            action: 'mgr/log/getlist'
        },
        cls: 'modx-grid modx-grid-small',
        fields: ['value', 'loggedon'],
        columns: [{
            header: _('logrequest.widget.value'),
            dataIndex: 'value',
            width: 250
        }, {
            header: _('logrequest.widget.date'),
            dataIndex: 'loggedon',
            renderer: Ext.util.Format.dateRenderer(MODx.config.manager_date_format + ' ' + MODx.config.manager_time_format),
            width: 100
        }],
        paging: true,
        pageSize: 7,
        showPerPage: false,
        listeners: {
            afterrender: this.onAfterRender,
            scope: this
        }
    });
    MODx.grid.LogrequestLog.superclass.constructor.call(this, config);
};
Ext.extend(MODx.grid.LogrequestLog, MODx.grid.Grid, {
    // Workaround to resize the grid when in a dashboard widget
    onAfterRender: function () {
        var cnt = Ext.getCmp('modx-content');
        // Dashboard widget "parent" (renderTo),
        var parent = Ext.get('modx-grid-logrequest-log');

        if (cnt && parent) {
            cnt.on('afterlayout', function (elem, layout) {
                var width = parent.getWidth();
                // Only resize when more than 400px (else let's use/enable the horizontal scrolling)
                if (width > 400) {
                    this.setWidth(width);
                }
            }, this);
        }
        var widget = Ext.get('dashboard-block-treehillstudio-log');
        var about = widget.select('.treehillstudio-widget-about');
        about.on('click', function () {
            var msg = '<span style="display: inline-block; text-align: center"><img src="' + LogRequest.config.assetsUrl + 'img/mgr/treehill-studio.png" srcset="' + LogRequest.config.assetsUrl + 'img/mgr/treehill-studio@2x.png 2x" alt"Treehill Studio"><br>' +
                '© 2016-2019 by <a href="https://treehillstudio.com" target="_blank">treehillstudio.com</a></span>';
            Ext.Msg.show({
                title: _('logrequest') + ' ' + LogRequest.config.version,
                msg: msg,
                buttons: Ext.Msg.OK,
                cls: 'treehillstudio_window',
                width: 330
            });
        })
    }
});
Ext.reg('modx-grid-logrequest-log', MODx.grid.LogrequestLog);
