Ext.define('app.controller.AdminTopPanelController', {
    extend: 'Ext.app.Controller',
    views: ['AdminTopPanel'],
    GetAllVoteGroup: function (button){
        let store = Ext.widget('AdminElementGrid').getStore();
        store.removeAll()
        Ext.getCmp('element_grid').destroy();
        Ext.createWidget('AdminAllGroupGrid',{
            renderTo: Ext.getBody(),
            id: 'vote_group_table'
        });
        Ext.getCmp('all_vote_group').hide();
    },
    GetResult: function (button){
        Ext.Ajax.request({
            url: 'admin.php',
            method: "post",
            params: {"result":"get"},
            success: function(response){
                location.reload();
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