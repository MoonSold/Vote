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
        }
    }
});