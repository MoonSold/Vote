Ext.Loader.setConfig({
    enabled: true,
    disableCaching: false,
    paths: {UsersApp: 'app', Ext: 'ext-4.2.1-master/src'}
});


Ext.application({
    requires: ['app.view.AdminLoginForm'],
    controllers: ["AdminLoginController"],
    // stores: ["app.store.ResultStore"],
    name: 'app',
    appFolder: 'front/app',
    launch: function() {
    Ext.createWidget('AdminLoginForm',{
        renderTo: Ext.getBody()
    })

    }
})

