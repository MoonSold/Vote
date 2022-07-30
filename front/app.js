Ext.Loader.setConfig({
    enabled: true,
    disableCaching: false,
    paths: {UsersApp: 'app', Ext: 'ext-4.2.1-master/src'}
});


Ext.application({
    requires: ["app.view.AllVoteGroup","app.view.TopPanel","app.view.LoginForm", "app.view.RegisterForm"],
    controllers: ["VoteGroup",'TopPanel',"Register","Login"],
    stores: ["app.store.VoteGroupStore"],
    name: 'app',
    appFolder: 'front/app',
    launch: function() {
        Ext.createWidget("TopPanel",{
            height: 100,
            renderTo:Ext.getBody()
        });
        Ext.createWidget("AllVoteGroup",{
            flex: 1,
            renderTo:Ext.getBody()
        })
    }
})


