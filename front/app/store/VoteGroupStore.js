Ext.define('app.store.VoteGroupStore', {
    extend: 'Ext.data.Store',
    model: 'app.model.VoteGroupModel',
    autoLoad: false,
    storeId: 'VoteGroupStore',
});