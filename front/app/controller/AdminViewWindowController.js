Ext.define('app.controller.AdminViewWindowController', {
    extend: 'Ext.app.Controller',
    views: ['AdminViewWindow'],
    Update: function (button){
            Ext.getCmp('choose_window').destroy();
            Ext.createWidget('AdminEnterForm',{
                renderTo: Ext.getBody(),
                id: 'update_window',
                title: "Обновление записи",
                buttons: [{
                    text: 'Отмена',
                    handler: function () { this.up('window').destroy(); }
                }, {
                    text: 'Изменить',
                    handler: function () {
                        let name = Ext.getCmp("name").getValue();
                        let description = Ext.getCmp("description").getValue();
                        Ext.Ajax.request({
                            url: 'api/api.php',
                            method: "post",
                            params: {'id':localStorage.getItem('group_id'),"group_name":name,"description":description,"actor":"admin","method":"controllerAdminUpdateVoteGroup"},
                            success: function(response){
                                Ext.getCmp('update_window').destroy();
                                Ext.Msg.alert('Запись обновлена');
                                let store = Ext.widget('AdminAllGroupGrid').getStore();
                                Store.sync({
                                    success: function () {
                                        store.reload()
                                    }
                                })
                            }
                        });
                    }
                }],

            })
    },
    Delete: function (button){
        Ext.getCmp('choose_window').destroy();
        Ext.Ajax.request({
            url: 'api/api.php',
            method: "post",
            params: {'id':localStorage.getItem('group_id'),"actor":"admin","method":"controllerAdminDeleteVoteGroup"},
            success: function(response){
                Ext.Msg.alert('Запись удалена');
                let store = Ext.widget('AdminAllGroupGrid').getStore();
                store.reload();
            }
        });
    },
    Add: function () {
        Ext.getCmp('choose_window').destroy();
        Ext.createWidget('AdminEnterForm',{
            renderTo: Ext.getBody(),
            id: 'add_window',
            title: "Добавление новой записи",
            buttons: [{
                text: 'Отмена',
                handler: function () { this.up('window').destroy(); }
            }, {
                text: 'Добавить',
                handler: function () {
                    let name = Ext.getCmp("name").getValue();
                    let description = Ext.getCmp("description").getValue();
                    Ext.Ajax.request({
                        url: 'api/api.php',
                        method: "post",
                        params: {"group_name":name,"description":description,"actor":"admin","method":"controllerAdminAddVoteGroup"},
                        success: function(response){
                            Ext.getCmp('add_window').destroy();
                            Ext.Msg.alert('Добавлена новая группа');
                            let store = Ext.widget('AdminAllGroupGrid').getStore();
                            store.reload();
                        }
                    });
                }
            }],

        })
    },
    Go: function (){
        Ext.Ajax.request({
            url: 'api/api.php',
            method: "post",
            params: {'id':localStorage.getItem('group_id'),"actor":"admin","method":"controllerAdminGetVoteElement"},
            success: function(response){
                if (response.responseText === ''){
                    Ext.createWidget('AdminElementWindow', {
                        title: 'Нету ни одного голосования, нужно добавить',
                        renderTo: Ext.getBody(),
                        id: 'choose_window',
                        width: 300,
                        items:[{
                            xtype: 'button',
                            width: 120,
                            height: 40,
                            text: "Добавить",
                            style:'margin-left:80px; margin-top:70px;margin-right:80px;',
                            action: 'add'
                        }]
                    })
                }
                else {
                    let store = Ext.widget('AdminElementGrid').getStore();
                    store.add(Ext.decode(response.responseText));
                }
            }
        });
        Ext.getCmp('choose_window').destroy();
        Ext.getCmp('vote_group_table').destroy()
        Ext.createWidget('AdminElementGrid', {
            renderTo: Ext.getBody(),
            id:"element_table"
        })
        Ext.getCmp('all_vote_group').show();
    },
    init: function () {
        this.control({
            'AdminViewWindow button[action=update]': {
                click: this.Update
            },
            'AdminViewWindow button[action=delete]': {
                 click: this.Delete
             },
            'AdminViewWindow button[action=new_group]': {
                click: this.Add
            },
            'AdminViewWindow button[action=go_question]': {
                click: this.Go
            }
        })
        this.callParent();
    }
});