Ext.define('app.controller.TopPanel', {
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
    ExitNow: function (){

    },
    init: function () {
        this.control({
            'TopPanel button[action=auth]': {
                click: this.AuthNow
            },
            'TopPanel button[action=register]': {
                click: this.RegisterNow
            },
            'TopPanel button[action=exit]': {
                click: this.ExitNow
            }
        });
        this.callParent();
    }
});