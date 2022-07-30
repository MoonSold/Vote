Ext.define('app.controller.Register', {
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
                button.up('form').destroy();
                let data = Ext.decode(response.responseText)
                Ext.util.Cookies.set('token',data.token);
                Ext.util.Cookies.set('username', data.username);

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