/**
 * Loads a grid with the log request ranks.
 *
 * @class MODx.grid.LogrequestRank
 * @extends MODx.grid.Grid
 * @param {Object} config An object of options.
 * @xtype modx-grid-logrequest-rank
 */
MODx.grid.LogrequestRank = function (config) {
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
    MODx.grid.LogrequestRank.superclass.constructor.call(this, config);
};
Ext.extend(MODx.grid.LogrequestRank, MODx.grid.Logrequest, {});
Ext.reg('modx-grid-logrequest-rank', MODx.grid.LogrequestRank);
