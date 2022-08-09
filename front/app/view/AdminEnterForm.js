Ext.define('app.view.AdminEnterForm', { // #1
    alias: "widget.AdminEnterForm",
    extend: 'Ext.window.Window',
    xtype: 'form',
    region: 'center',
    width: 300,
    defaultType: 'textfield',
    defaults: {
        anchor: '100%'
    },
    frame: true,
    bodyPadding: 10,
    items: [
        {
            allowBlank: false,
            id: "name",
            fieldLabel: 'Новое название голосования',
        },
        {
            allowBlank: false,
            id: "description",
            fieldLabel: 'Новое описание',
        },
    ],
    autoShow: true,
    iconCls: 'fa fa-key fa-lg',
    title: 'Авторизация Админа',
    closeAction: 'hide',
    closable: false,
    draggable: false,
    resizable: false// #4
})