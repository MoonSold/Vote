Ext.Loader.setConfig({
    enabled: true,
    disableCaching: false,
    paths: {UsersApp: 'app', Ext: 'ext-4.2.1-master/src'}
});


Ext.application({
<<<<<<< HEAD
    requires: ['app.view.AdminLoginForm','app.view.AdminTopPanel','app.view.AdminViewWindow','app.view.AdminAllGroupGrid','app.view.AdminElementGrid','app.view.AdminEnterForm','app.view.AdminElementWindow'],
    controllers: ["AdminLoginController","AdminTopPanelController",'AdminAllGroupGridController','AdminElementController',"AdminViewWindowController",'AdminElementWindowController'],
    stores: ["app.store.VoteGroupStore","app.store.VoteElementStore"],
    name: 'app',
    appFolder: 'front/app',
    launch: function() {
        Ext.createWidget('AdminLoginForm',{
            renderTo: Ext.getBody()
        });
=======
    requires: ['app.view.AdminLoginForm'],
    controllers: ["AdminLoginController"],
    // stores: ["app.store.ResultStore"],
    name: 'app',
    appFolder: 'front/app',
    launch: function() {
    Ext.createWidget('AdminLoginForm',{
        renderTo: Ext.getBody()
    })

>>>>>>> stage
    }
})

