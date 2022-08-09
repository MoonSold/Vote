Ext.define('app.controller.AdminAllGroupGridController', {
    extend: 'Ext.app.Controller',
    stores: ["VoteGroupStore"],
    models: ["VoteGroupModel"],
    views: ['AdminAllGroupGrid'],
    init: function () {
        Ext.Ajax.request({
            url: 'api/api.php',
            method: "get",
            params: {"actor":"admin","method":"controllerGetVoteGroup"},
            success: function(response){
                let data = Ext.decode(response.responseText);
                let store = Ext.widget('AdminAllGroupGrid').getStore();
                store.add(data);
            }
        });
        this.callParent();
    },
});