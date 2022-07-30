Ext.define('app.controller.Login', {
    extend: 'Ext.app.Controller',
    views: ['LoginForm'],
    AuthUser: function (button) {
        let login = Ext.getCmp("auth-login").getValue();
        let password = Ext.getCmp("auth-password").getValue();
        let check = Ext.getCmp("auth-remember").getValue();
        Ext.Ajax.request({
            url: 'api/api.php',
            method: "post",
            params: {"login":login,"password":password,"check":check,"actor":"user","method":"controllerAuthFunction"},
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
            'LoginForm button[action=auth]': {
                click: this.AuthUser
            }
        });
        this.callParent();
    }
});