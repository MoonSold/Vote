Ext.define('app.controller.AdminLoginController', {
    extend: 'Ext.app.Controller',
    views: ['AdminLoginForm'],
    AuthAdmin: function (button) {
        let login = Ext.getCmp("admin_name").getValue();
        let password = Ext.getCmp("admin_password").getValue();
<<<<<<< HEAD
=======
        console.log(login,password);
>>>>>>> stage
        Ext.Ajax.request({
            url: 'api/api.php',
            method: "post",
            params: {"login":login,"password":password,"actor":"admin","method":"controllerAdminAuthFunction"},
            success: function(response){
                button.up('form').destroy();
<<<<<<< HEAD
                Ext.createWidget('AdminTopPanel',{
                    renderTo:Ext.getBody()
                });
                Ext.createWidget('AdminAllGroupGrid',{
                    renderTo: Ext.getBody(),
                    id: 'vote_group_table'
                });
                Ext.getCmp('all_vote_group').hide();
=======
                let data = Ext.decode(response.responseText)
>>>>>>> stage
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