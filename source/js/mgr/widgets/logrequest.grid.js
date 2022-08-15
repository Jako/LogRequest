/**
 * Loads a grid with the log requests.
 *
 * @class LogRequest.grid.Logrequest
 * @extends MODx.grid.Grid
 * @param {Object} config An object of options.
 * @xtype modx-grid-logrequest-log
 */
LogRequest.grid.Logrequest = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        id: 'logrequest-grid-' + config.type,
        url: config.connector_url,
        baseParams: {
            action: 'mgr/' + config.type + '/getlist'
        },
        cls: 'modx-grid modx-grid-small modx'+ LogRequest.config.modxversion,
        fields: ['value', 'loggedon'],
        showActionsColumn: false,
        columns: [{
            header: _('logrequest.widget.value'),
            dataIndex: 'value',
            width: 250
        }, {
            header: _('logrequest.widget.date'),
            dataIndex: 'loggedon',
            renderer: LogRequest.util.dateRenderer(MODx.config.manager_date_format + ' ' + MODx.config.manager_time_format),
            width: 100
        }],
        paging: true,
        pageSize: 6,
        showPerPage: false,
        listeners: {
            afterrender: this.onAfterRender,
            scope: this
        },
        type: 'log'
    });
    LogRequest.grid.Logrequest.superclass.constructor.call(this, config);
};
Ext.extend(LogRequest.grid.Logrequest, MODx.grid.Grid, {
    onAfterRender: function () {
        // Workaround to resize the grid when in a dashboard widget
        var cnt = Ext.getCmp('modx-content');
        var target = Ext.get('modx-grid-logrequest-' + this.config.type);

        if (cnt && target) {
            cnt.on('afterlayout', function () {
                var width = target.getWidth();
                // Only resize when more than 400px (else let's use/enable the horizontal scrolling)
                if (width > 400) {
                    this.setWidth(width);
                }
            }, this);
            cnt.on('resize', function () {
                var width = target.getWidth();
                // Only resize when more than 400px (else let's use/enable the horizontal scrolling)
                if (width > 400) {
                    this.setWidth(width);
                }
            }, this);
        }
        var widget = Ext.get('dashboard-block-treehillstudio-' + this.config.type);
        var about = widget.select('.treehillstudio-widget-about');
        about.on('click', function () {
            var msg = '<span style="display: inline-block; text-align: center"><img src="' + LogRequest.config.assetsUrl + 'img/mgr/treehill-studio.png" srcset="' + LogRequest.config.assetsUrl + 'img/mgr/treehill-studio@2x.png 2x" alt="Treehill Studio"><br>' +
                '&copy; 2016-2022 by <a href="https://treehillstudio.com" target="_blank">treehillstudio.com</a></span>';
            Ext.Msg.show({
                title: _('logrequest') + ' ' + LogRequest.config.version,
                msg: msg,
                buttons: Ext.Msg.OK,
                cls: 'treehillstudio_window',
                width: 358
            });
        })
    }
});
Ext.reg('logrequest-grid-logrequest', LogRequest.grid.Logrequest);
