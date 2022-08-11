Ext.define('app.controller.AdminElementWindowController', {
    extend: 'Ext.app.Controller',
    views: ['AdminElementWindow'],
    Delete: function (button){
        Ext.getCmp('choose_window').destroy();
        Ext.Ajax.request({
            url: 'api/api.php',
            method: "post",
            params: {'id':localStorage.getItem('element_id'),"actor":"admin","method":"controllerAdminDeleteVoteElement"},
            success: function(response){
                Ext.Msg.alert('Кандидат Удалён');
                let store = Ext.widget('AdminElementGrid').getStore();
                store.removeAll();
                Ext.getCmp('element_grid').destroy();
                Ext.createWidget('AdminElementGrid',{
                    renderTo:Ext.getBody(),
                    id: 'element_grid'
                })
            }
        });
    },
    Add: function () {
        Ext.getCmp('choose_window').destroy();
        Ext.createWidget('AdminEnterForm',{
            renderTo: Ext.getBody(),
            id: 'add_window',
            title: "Добавление нового кандидата",
            items: [
                {
                    allowBlank: false,
                    id: "name",
                    fieldLabel: 'Новый кандидат',
                }],
            buttons: [{
                text: 'Отмена',
                handler: function () { this.up('window').destroy(); }
            }, {
                text: 'Добавить',
                handler: function () {
                    let name = Ext.getCmp("name").getValue();
                    Ext.Ajax.request({
                        url: 'api/api.php',
                        method: "post",
                        params: {"group_id":localStorage.getItem('group_id'),"element":name,"actor":"admin","method":"controllerAdminAddVoteElement"},
                        success: function(response){
                            Ext.getCmp('add_window').destroy();
                            Ext.Msg.alert('Добавлен новый кандидат');
                            let store = Ext.widget('AdminElementGrid').getStore();
                            store.removeAll();
                            Ext.getCmp('element_grid').destroy();
                            Ext.createWidget('AdminElementGrid',{
                                renderTo:Ext.getBody(),
                                id: 'element_grid'
                            })
                        }
                    });
                }
            }],

        })
    },
    init: function () {
        this.control({
            'AdminElementWindow button[action=add]': {
                click: this.Add
            },
            'AdminElementWindow button[action=delete]': {
                click: this.Delete
            }
        })
        this.callParent();
    }
});