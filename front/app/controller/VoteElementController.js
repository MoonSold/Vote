Ext.define('app.controller.VoteElementController', {
    extend: 'Ext.app.Controller',
    stores: ["VoteElementStore"],
    models: ["VoteElementModel"],
    views: ['VoteElementGrid'],
    init: function () {
        this.callParent();
    },
});