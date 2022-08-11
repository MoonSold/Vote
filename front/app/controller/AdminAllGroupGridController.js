Ext.define('app.controller.AdminAllGroupGridController', {
    extend: 'Ext.app.Controller',
    stores: ["VoteGroupStore"],
    models: ["VoteGroupModel"],
    views: ['AdminAllGroupGrid'],
    init: function () {
        this.callParent();
    },
});