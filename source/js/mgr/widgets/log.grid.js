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
            width: 350
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
        parent = Ext.get('modx-grid-logrequest-log');

        if (cnt && parent) {
            cnt.on('afterlayout', function (elem, layout) {
                var width = parent.getWidth();
                // Only resize when more than 500px (else let's use/enable the horizontal scrolling)
                if (width > 500) {
                    this.setWidth(width);
                }
            }, this);
        }
    }
});
Ext.reg('modx-grid-logrequest-log', MODx.grid.LogrequestLog);
