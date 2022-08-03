Ext.define('app.controller.AdminLoginController', {
    extend: 'Ext.app.Controller',
    views: ['AdminLoginForm'],
    AuthAdmin: function (button) {
        let login = Ext.getCmp("admin_name").getValue();
        let password = Ext.getCmp("admin_password").getValue();
        console.log(login,password);
        Ext.Ajax.request({
            url: 'api/api.php',
            method: "post",
            params: {"login":login,"password":password,"actor":"admin","method":"controllerAdminAuthFunction"},
            success: function(response){
                button.up('form').destroy();
                let data = Ext.decode(response.responseText)
            }
        });
    },
    init: function () {
        this.control({
            'AdminLoginForm button[action=auth]': {
                click: this.AuthAdmin
            }
        });
        this.callParent();
    }
});