Ext.define('app.controller.AdminTopPanelController', {
    extend: 'Ext.app.Controller',
    views: ['AdminTopPanel'],
    GetAllVoteGroup: function (button){
        Ext.getCmp('element_table').destroy();
        Ext.createWidget('AdminAllGroupGrid',{
            renderTo: Ext.getBody(),
            id: 'vote_group_table'
        });
        Ext.getCmp('all_vote_group').hide();
    },
    GetResult: function (button){
        Ext.Ajax.request({
            url: 'api/api.php',
            method: "get",
            params: {'actor':'admin','get_result':true,'method':"controllerAdminGetResult"},
            success: function(response){
                document.location.replace("/api/api.php");
            }
        });
    },
    init: function () {
        this.control({
            'AdminTopPanel button[action=vote_group]': {
                click: this.GetAllVoteGroup
            },
            'AdminTopPanel button[action=get_result]': {
                click: this.GetResult
            }
        })
        this.callParent();
    }
});