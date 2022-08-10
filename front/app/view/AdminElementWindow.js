Ext.define('app.view.AdminElementWindow', {
    alias: "widget.AdminElementWindow",
    id: "choose_window",
    extend: 'Ext.window.Window',
    width: 600,
    height: 200,
    xtype: 'window',
    layout: 'column',
    items:[{
        xtype: 'button',
        width: 120,
        height: 40,
        text: "Добавить",
        style:'margin-left:60px; margin-top:70px;',
        action: 'add'
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