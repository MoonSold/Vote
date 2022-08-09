Ext.define('app.controller.TopPanelController', {
    extend: 'Ext.app.Controller',
    views: ['TopPanel'],
    RegisterNow: function (){
        Ext.create("widget.RegisterForm",{
            renderTo:Ext.getBody(),
        })
    },
    AuthNow: function(){
        Ext.create("widget.LoginForm",{
            renderTo:Ext.getBody()
        })

    },
    ExitNow: function (button){
        Ext.util.Cookies.clear("token");
        Ext.util.Cookies.clear("username");
        Ext.Ajax.request({
            url: 'api/api.php',
            method: "post",
            params: {"actor":"user","method":"controllerExitFunction"},
            success: function(response){
                location.reload();
            }
        });
    },
    init: function () {
        if (Ext.util.Cookies.get('token')){
            this.control({
                'TopPanel button[action=exit]': {
                    click: this.ExitNow
                }
            })
        }
        else {
            this.control({
                'TopPanel button[action=auth]': {
                    click: this.AuthNow
                },
                'TopPanel button[action=register]': {
                    click: this.RegisterNow
                }
        })
        }
        this.callParent();
    }
});