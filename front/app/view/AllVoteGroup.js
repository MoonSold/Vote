Ext.define("app.view.VoteList",{
    extend: 'Ext.Panel',
    alias: 'widget.groupList',
    title: "Список всех голосований",
    width: "60%",
    layout:'accordion',
    initComponent: function() {
        this.items = [{
            xtype: 'panel',
            title: 'Голосование 1',
            html: 'Огромное описание'
        }];
        this.callParent(arguments);
    }
})


