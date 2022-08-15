/**
 * Loads a grid with the log request ranks.
 *
 * @class LogRequest.grid.LogrequestRank
 * @extends LogRequest.grid.Logrequest
 * @param {Object} config An object of options.
 * @xtype modx-grid-logrequest-rank
 */
LogRequest.grid.LogrequestRank = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        fields: ['value', 'count'],
        columns: [{
            header: _('logrequest.widget.value'),
            dataIndex: 'value',
            width: 250
        }, {
            header: _('logrequest.widget.count'),
            dataIndex: 'count',
            width: 100
        }],
        type: 'rank'
    });
    LogRequest.grid.LogrequestRank.superclass.constructor.call(this, config);
};
Ext.extend(LogRequest.grid.LogrequestRank, LogRequest.grid.Logrequest, {});
Ext.reg('logrequest-grid-logrequest-rank', LogRequest.grid.LogrequestRank);
