Ext.define('app.view.AdminTopPanel', {
    extend: 'Ext.toolbar.Toolbar',
    alias: "widget.AdminTopPanel",
    id: "AdminTopPanel",
    items: [
        {
            xtype: "button",
            text: 'Все опросники',
            id: "all_vote_group",
            action: "vote_group",
        },{
            xtype: 'button',
            text : 'Все результаты',
            id: "get_result",
            action: "get_result"
        }]
});