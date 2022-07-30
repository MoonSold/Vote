Ext.define('app.view.AllVoteGroup', {
    extend: "Ext.panel.Panel",
    alias: "widget.AllVoteGroup",
    title: "Список всех голосований",
    store: "VoteGroupStore",
    requires: [
        'Ext.layout.container.Accordion',
        'Ext.grid.*',
        'app.model.VoteGroup'
    ],
    xtype: 'layout-accordion',
    layout: 'accordion',
    defaults: {
        bodyPadding: 10
    },

    initComponent: function() {
        this.callParent();
    },

    changeRenderer: function(val) {
        if (val > 0) {
            return '<span style="color:green;">' + val + '</span>';
        } else if(val < 0) {
            return '<span style="color:red;">' + val + '</span>';
        }
        return val;
    },

    pctChangeRenderer: function(val){
        if (val > 0) {
            return '<span style="color:green;">' + val + '%</span>';
        } else if(val < 0) {
            return '<span style="color:red;">' + val + '%</span>';
        }
        return val;
    }
});


