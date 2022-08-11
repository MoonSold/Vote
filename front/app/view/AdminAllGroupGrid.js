Ext.define('app.view.AdminAllGroupGrid', {
    extend: "Ext.grid.Panel",
    alias: "widget.AdminAllGroupGrid",
    title: "Все голосования",
    store: 'VoteGroupStore',
    columns: [
        {
            header: "Номер",
            dataIndex: 'id',
            width: 50
        },{
            header: 'Название',
            dataIndex: 'VoteGroup',
            flex: 1
        },
        {
            header: 'Описание',
            dataIndex: 'Description',
            flex: 1
        },
        {
            xtype: "actioncolumn",
            icon: 'front/app/ext-4.2.1-master/examples/restful/images/add.gif',
            header: 'Выбрать действие',
            flex: 1,
            itemId: "Choose"
        }],
    listeners: {
        cellclick: function(gridView,htmlElement,columnIndex,dataRecord){
            localStorage.setItem('group_id', dataRecord.data['id']);
            Ext.createWidget('AdminViewWindow',{
                renderTo: Ext.getBody(),
            })
        },
        beforerender: function(component, eOpts){
            Ext.Ajax.request({
                url: 'api/api.php',
                method: "get",
                params: {"actor":"admin","method":"controllerGetVoteGroup"},
                success: function(response){
                    let data = Ext.decode(response.responseText);
                    let store = Ext.widget('AdminAllGroupGrid').getStore();
                    store.add(data);
                }
            });
        }

    }
});

