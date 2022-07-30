Ext.define('app.view.RegisterForm', { // #1
    alias: "widget.RegisterForm",
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
            fieldLabel: 'Логин',
            id: "register-login",
            name: 'login',
            emptyText: 'логин'
        },
        {
            allowBlank: false,
            fieldLabel: 'Имя пользователя',
            id: "register-username",
            name: 'username',
            emptyText: 'Имя пользователя'
        },
        {
            allowBlank: false,
            fieldLabel: 'Пароль',
            name: 'password',
            id: "register-password",
            emptyText: 'пароль',
            inputType: 'password'
        },
        {
            xtype:'checkbox',
            fieldLabel: 'Запомнить меня',
            id: "register-remember",
            name: 'remember'
        }
    ],
    buttons: [{
        text: 'Отмена',
        handler: function () { this.up('window').close(); }

    }, {
        text: 'Войти',
        action: "register"
    }],
    autoShow: true,
    iconCls: 'fa fa-key fa-lg',
    title: 'Регистрация',
    closeAction: 'hide',
    closable: false,
    draggable: false,
    resizable: false// #4
});