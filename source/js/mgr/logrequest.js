var logrequest = function (config) {
    config = config || {};
    logrequest.superclass.constructor.call(this, config);
};
Ext.extend(logrequest, Ext.Component, {
    initComponent: function () {
        this.stores = {};
        this.ajax = new Ext.data.Connection({
            disableCaching: true,
        });
    }, page: {}, window: {}, grid: {}, tree: {}, panel: {}, combo: {}, config: {}, util: {}, form: {}
});
Ext.reg('logrequest', logrequest);

LogRequest = new logrequest();
