Ext.define('app.view.VoteElementGrid', {
    extend: "Ext.grid.Panel",
    alias: "widget.VoteElementGrid",
    title: "Голосование",
    store: 'VoteElementStore',
    columns: [
        {
            xtype: "rownumberer",
            header: "Номер",
            dataIndex: 'id',
            width: 50
        },{
            header: 'Кандидаты',
            dataIndex: 'VoteElement',
            flex: 1
        },
        {
            xtype: "actioncolumn",
            icon: 'front/app/ext-4.2.1-master/examples/restful/images/add.gif',
            header: 'Проголосовать',
            flex: 1,
            itemId: "Vote"
        }],
    listeners: {
        cellclick: function(gridView,htmlElement,columnIndex,dataRecord){
            Ext.Ajax.request({
                url: 'api/api.php',
                method: "post",
                params: {"actor":"user","method":"controllerSetResult","id":dataRecord.raw[0],"token":Ext.util.Cookies.get("token")},
                success: function(response){
                    console.log(response.responseText);
<<<<<<< HEAD
                    location.reload();
                    Ext.Msg.alert("Ваш голос учтён");
                },
                failure: function(response, opts) {
                    Ext.Msg.alert("Авторизируйтесь","Только авторизированные пользователи могут голосовать");
=======
                    Ext.Msg.alert("Ваш голос учтён");
                    location.reload();
>>>>>>> stage
                }
            });
        }
    }
});

