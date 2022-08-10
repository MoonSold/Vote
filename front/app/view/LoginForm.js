Ext.define('app.view.LoginForm', { // #1
    alias: "widget.LoginForm",
    extend: 'Ext.window.Window',
    xtype: 'form',// #3
    // кнопки формы
    defaultType: 'textfield',
    defaults: {
        anchor: '100%'
    },
    frame:true,
    bodyPadding: 10,
    items: [
        {
            allowBlank: false,
            id: "auth-login",
            fieldLabel: 'Логин',
            name: 'login',
            emptyText: 'логин'
        },
        {
            allowBlank: false,
            fieldLabel: 'Пароль',
            name: 'password',
            id: "auth-password",
            emptyText: 'пароль',
            inputType: 'password'
        },
        {
            xtype:'checkbox',
            id: "auth-remember",
            fieldLabel: 'Запомнить меня',
            name: 'remember'
        }
    ],
    buttons: [{
        text: 'Отмена',
        handler: function () { this.up('window').destroy(); }
    }, {
        text: 'Войти',
        action: "auth"
    }],
    autoShow: true,
    iconCls: 'fa fa-key fa-lg',
    title: 'Авторизация',
    closeAction: 'hide',
    closable: false,
    draggable: false,
    resizable: false// #4
});