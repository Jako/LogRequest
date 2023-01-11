/**
 * Loads a grid with the log requests.
 *
 * @class LogRequest.grid.LogrequestLog
 * @extends LogRequest.grid.Logrequest
 * @param {Object} config An object of options.
 * @xtype logrequest-grid-logrequest-log
 */
LogRequest.grid.LogrequestLog = function (config) {
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
            renderer: LogRequest.util.dateRenderer(MODx.config.manager_date_format + ' ' + MODx.config.manager_time_format),
            width: 100
        }],
        type: 'log'
    });
    LogRequest.grid.LogrequestLog.superclass.constructor.call(this, config);
};
Ext.extend(LogRequest.grid.LogrequestLog, LogRequest.grid.Logrequest, {});
Ext.reg('logrequest-grid-logrequest-log', LogRequest.grid.LogrequestLog);
