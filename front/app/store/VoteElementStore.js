Ext.define('app.store.VoteElementStore', {
    extend: 'Ext.data.Store',
    model: 'app.model.VoteElementModel',
    autoLoad: false,
    storeId: 'VoteElementStore',
    proxy: {
        type: 'ajax',
        url: '',
    },
});