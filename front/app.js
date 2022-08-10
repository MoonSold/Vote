Ext.Loader.setConfig({
    enabled: true,
    disableCaching: false,
    paths: {UsersApp: 'app', Ext: 'ext-4.2.1-master/src'}
});


Ext.application({
<<<<<<< HEAD
    requires: ["app.view.VoteElementGrid","app.view.AllVoteGroupGrid","app.view.TopPanel","app.view.LoginForm", "app.view.RegisterForm","app.global.GlobalVar"],
=======
    requires: ["app.view.VoteElementGrid","app.view.AllVoteGroupGrid","app.view.TopPanel","app.view.LoginForm", "app.view.RegisterForm"],
>>>>>>> stage
    controllers: ["VoteGroupController",'TopPanelController',"RegisterFormController","LoginFormController","VoteElementController"],
    stores: ["app.store.VoteGroupStore","app.store.VoteElementStore"],
    name: 'app',
    appFolder: 'front/app',
    launch: function() {
        Ext.createWidget("TopPanel",{
            height: 100,
            renderTo:Ext.getBody()
        });
        if (Ext.util.Cookies.get('token')){
            Ext.getCmp('auth-button').hide();
            Ext.getCmp('register-button').hide();
            Ext.getCmp('exit-button').show();
        }
        else {
            Ext.getCmp('auth-button').show();
            Ext.getCmp('register-button').show();
            Ext.getCmp('exit-button').hide();
        }
        Ext.createWidget("AllVoteGroupGrid",{
            flex: 1,
            renderTo:Ext.getBody()
        })
    }
})


