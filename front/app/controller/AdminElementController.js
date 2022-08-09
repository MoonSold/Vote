Ext.define('app.controller.AdminElementController', {
    extend: 'Ext.app.Controller',
    stores: ["VoteElementStore"],
    models: ["VoteElementModel"],
    views: ['AdminElementGrid'],
    initialize: function () {
        Ext.Ajax.request({
            url: 'api/api.php',
            method: "get",
            params: {"id":localStorage.getItem('group_id'),"actor":"admin","method":"controllerAdminGetVoteElement"},
            success: function(response){
                Ext.getCmp('choose_window').destroy();
                Ext.widget('AdminAllGroupGrid').destroy();
                let store = Ext.widget('AdminElementGrid').getStore();
                store.add(Ext.decode(response.responseText)),
                    Ext.getCmp('choose_window').destroy();
                Ext.getCmp('add_new_group').destroy()
            }
        });
    }
});