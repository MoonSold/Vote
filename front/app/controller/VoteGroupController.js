Ext.define('app.controller.VoteGroupController', {
    extend: 'Ext.app.Controller',
    stores: ["VoteGroupStore"],
    models: ["VoteGroupModel"],
    views: ['AllVoteGroupGrid'],

    init: function () {
        Ext.Ajax.request({
            url: 'api/api.php',
            method: "get",
<<<<<<< HEAD
            params: {"token":Ext.util.Cookies.get("token"),"actor":"user","method":"controllerGetVoteGroup"},
            success: function(response){
                let data = Ext.decode(response.responseText);
                let check = data.pop();
                console.log(data)
=======
            params: {"actor":"user","method":"controllerGetVoteGroup"},
            success: function(response){
                let data = Ext.decode(response.responseText);
                let check = data.pop();
>>>>>>> stage
                let store = Ext.widget('AllVoteGroupGrid').getStore();
                store.add(data);
            }
        });
        this.callParent();
    },
});