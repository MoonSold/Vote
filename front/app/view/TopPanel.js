Ext.define('app.view.TopPanel', {
    extend: 'Ext.toolbar.Toolbar',
    alias: "widget.TopPanel",
    id: "TopPanel",
    items: [
        {
            xtype: "button",
            text: 'Авторизация',
            id: "auth-button",
            action: "auth",
        },'-',{
            xtype: 'button',
            text : 'Регистрация',
            id: "register-button",
            action: "register"
        },'-',{
            xtype: 'button',
            text : 'Выход',
            action: "exit"
        }]
});