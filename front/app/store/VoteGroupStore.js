Ext.define('app.store.VoteGroupStore', {
    extend: 'Ext.data.Store',
    model: 'app.model.VoteGroup',
    autoLoad: true,
    storeId: 'VoteGroupStore',
    proxy: {
        type: 'ajax',
        url: 'front/app/data/vote_group.json',
        reader: {
            type: 'json',
            root: 'vote_group',
            successProperty: 'success'
        }
    }
});