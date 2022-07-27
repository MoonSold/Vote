Ext.application({
    requires: ['Ext.container.Viewport'],
    name: 'app',
    appFolder: 'app',
    controllers: ['VoteGroup'],
    launch: function() {
        Ext.create('Ext.container.Viewport', {
            layout: 'fit',
            items: {
                xtype: 'AllVoteGroup'
            }
        });
    }
})


