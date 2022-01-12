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
        type: 'log'
    });
    MODx.grid.LogrequestLog.superclass.constructor.call(this, config);
};
Ext.extend(MODx.grid.LogrequestLog, MODx.grid.Logrequest, {});
Ext.reg('modx-grid-logrequest-log', MODx.grid.LogrequestLog);
