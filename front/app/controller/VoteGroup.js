Ext.define('app.controller.VoteGroup', {
    extend: 'Ext.app.Controller',

    views: ['AllVoteGroup'],
    init: function () {
        Ext.Ajax.request({
            url: 'api/api.php',
            method: "get",
            params: {"actor":"user","method":"controllerGetQuestionGroup"},
            success: function(response){
                console.log(response.responseText);
                let data = Ext.decode(response.responseText)
                let store = Ext.getStore('app.store.VoteGroupStore');
                store.load(data);
                console.log(store)
            }
        });
        this.callParent();
    }
});