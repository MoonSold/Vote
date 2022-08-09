Ext.define('app.view.AdminViewWindow', { // #1
    alias: "widget.AdminViewWindow",
    id: "choose_window",
    extend: 'Ext.window.Window',
    width: 1000,
    height: 200,
    xtype: 'window',
    layout: 'column',
    items:[{
        xtype: 'button',
        width: 120,
        height: 40,
        text: "Обновить",
        style:'margin-left:60px; margin-top:70px;',
        id: "update_group",
        action: 'update'
    },{
        width: 120,
        height: 40,
        xtype: "button",
        style:'margin-left:60px; margin-top:70px;',
        text: "Удалить",
        action: "delete"
    },{
        width: 120,
        height: 40,
        xtype: "button",
        style:'margin-left:60px; margin-top:70px;',
        text: "Перейти к вопросам",
        action: "go_question"
    },{
        width: 120,
        height: 40,
        xtype: "button",
        style:'margin-left:60px; margin-top:70px;',
        text: "Новая группа",
        action: "new_group"
    },
    {
        width: 120,
            height: 40,
            xtype: "button",
            style:'margin-left:60px; margin-top:70px;',
            text: "Отмена",
            handler: function () { this.up('window').destroy(); }
        }
    ],
    autoShow: true,
    iconCls: 'fa fa-key fa-lg',
    title: 'Выберете действие',
    closeAction: 'hide',
    closable: false,
    draggable: false,
    resizable: false// #4
});