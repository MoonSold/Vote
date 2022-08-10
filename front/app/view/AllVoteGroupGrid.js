Ext.define('app.view.AllVoteGroupGrid', {
    extend: "Ext.grid.Panel",
    alias: "widget.AllVoteGroupGrid",
    title: "список голосований",
    store: 'VoteGroupStore',
    columns: [
        {
        xtype: "rownumberer",
        header: "Номер",
        dataIndex: 'id',
            width: 50
    },
        {
        xtype: "actioncolumn",
        icon: 'front/app/ext-4.2.1-master/examples/restful/images/add.gif',
        header: 'Перейти к голосованию',
        flex: 1,
            dataIndex: 'id',
        itemId: "GoQuestion"
    }, {
        header: 'Название',
<<<<<<< HEAD
        dataIndex: 'VoteGroup',
=======
        dataIndex: 'QuestionGroup',
>>>>>>> stage
        flex: 1
    },{
        header: 'Описание',
        dataIndex: 'Description',
        flex: 1
    }],
    listeners: {
        cellclick: function(gridView,htmlElement,columnIndex,dataRecord){
            Ext.Ajax.request({
                url: 'api/api.php',
                method: "get",
                params: {"actor":"user","method":"controllerGetVoteElement","id":dataRecord.raw[0]},
                success: function(response){
<<<<<<< HEAD
                    if (response.responseText === ''){
                        Ext.Msg.alert('Голосование не готово','Голосование не готово')
                    }
                    else {
                        let data = Ext.decode(response.responseText);
                        Ext.createWidget('VoteElementGrid', {renderTo: Ext.getBody()});
                        let store = Ext.widget("VoteElementGrid").getStore()
                        store.add(data);
                        gridView.up().destroy();
                    }
=======
                    let data = Ext.decode(response.responseText);
                    Ext.createWidget('VoteElementGrid',{renderTo: Ext.getBody()});
                    let store = Ext.widget("VoteElementGrid").getStore()
                    store.add(data);
                    gridView.up().destroy();
>>>>>>> stage
                }
            });
            }
        }
});


