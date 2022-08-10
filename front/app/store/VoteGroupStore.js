Ext.define('app.store.VoteGroupStore', {
    extend: 'Ext.data.Store',
    model: 'app.model.VoteGroupModel',
<<<<<<< HEAD
    storeId: 'VoteGroupStore',
    autoLoad: false,
    autoSync: false,
    proxy: {
        type: 'ajax',
        url: 'api/api.php?_dc=1659962804491&actor=admin&method=controllerGetVoteGroup',
        api: {
            create: 'api/api.php?_dc=1659962804491&actor=admin&method=controllerGetVoteGroup',
            read: 'api/api.php?_dc=1659962804491&actor=admin&method=controllerGetVoteGroup',
            update: 'api/api.php?_dc=1659962804491&actor=admin&method=controllerGetVoteGroup',
            destroy: 'api/api.php?_dc=1659962804491&actor=admin&method=controllerGetVoteGroup'
        },
        reader: {
            type: 'json'
        },
        writer: {
            type: 'json'
        }
    },
=======
    autoLoad: false,
    storeId: 'VoteGroupStore',
>>>>>>> stage
});