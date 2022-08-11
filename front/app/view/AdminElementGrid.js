Ext.define('app.view.AdminElementGrid', {
    extend: "Ext.grid.Panel",
    alias: "widget.AdminElementGrid",
    title: "Список Элементов",
    store: 'VoteElementStore',
    columns: [
        {
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
        cellclick: function (gridView, htmlElement, columnIndex, dataRecord) {
            localStorage.setItem('element_id',dataRecord.data['id']);
            console.log(localStorage.getItem('element_id'));
            Ext.createWidget('AdminElementWindow', {
                renderTo: Ext.getBody(),
                id: 'choose_window'
            })
        },
        beforerender: function(component, eOpts){
            Ext.Ajax.request({
                url: 'api/api.php',
                method: "get",
                params: {"id":localStorage.getItem('group_id'),"actor":"admin","method":"controllerAdminGetVoteElement"},
                success: function(response){
                    let store = Ext.widget('AdminElementGrid').getStore();
                    store.add(Ext.decode(response.responseText));
                }
            });
        }
    }
});