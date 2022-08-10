Ext.define('app.view.AdminLoginForm', { // #1
    alias: "widget.AdminLoginForm",
    extend: 'Ext.window.Window',
    xtype: 'form',
    region: 'center',
    width: 250,
    defaultType: 'textfield',
    defaults: {
        anchor: '100%'
    },
    frame:true,
    bodyPadding: 10,
    items: [
        {
            allowBlank: false,
            id: "admin_name",
            fieldLabel: 'Имя Админа',
            name: 'admin_name',
            emptyText: 'Имя Админа'
        },
        {
            allowBlank: false,
            fieldLabel: 'Пароль',
            name: 'password',
            id: "admin_password",
            emptyText: 'пароль',
            inputType: 'password'
        },
    ],
<<<<<<< HEAD
    buttons: [ {
=======
    buttons: [{
        text: 'Отмена',
        handler: function () { this.up('window').destroy(); }
    }, {
>>>>>>> stage
        text: 'Войти',
        action: "auth"
    }],
    autoShow: true,
    iconCls: 'fa fa-key fa-lg',
    title: 'Авторизация Админа',
    closeAction: 'hide',
    closable: false,
    draggable: false,
    resizable: false// #4
});