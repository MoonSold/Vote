Ext.define('app.controller.RegisterFormController', {
    extend: 'Ext.app.Controller',
    views: ['RegisterForm'],
    RegisterUser: function (button) {
        let login = Ext.getCmp("register-login").getValue();
        let password = Ext.getCmp("register-password").getValue();
        let username = Ext.getCmp("register-username").getValue();
        let check = Ext.getCmp("register-remember").getValue();
        Ext.Ajax.request({
            url: 'api/api.php',
            method: "post",
            params: {"login":login,"password":password,"username":username,"check":check,"actor":"user","method":"controllerRegistrationFunction"},
            success: function(response){
                let data = Ext.decode(response.responseText);
                if (data['register'] === false){
                    Ext.Msg.alert("Что-то пошло не так","Неверно введённые данные или логин занят");
                }
                else {
                    button.up('form').destroy();
                    Ext.util.Cookies.set('token', data.token);
                    Ext.util.Cookies.set('username', data.username);
                    location.reload();
                }
            },
            failure: function(response, opts) {
                Ext.Msg.alert("Что-то пошло не так","Неверно введённые данные или логин занят");
            }
        });
    },
    init: function () {
        this.control({
            'RegisterForm button[action=register]': {
                click: this.RegisterUser
            }
        });
        this.callParent();
    }
});