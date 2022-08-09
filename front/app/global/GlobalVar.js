Ext.define('app.global.GlobalVar', {
    groupId: 0,
    getGroupId: function(){
        return this.groupId;
    },
    setGroupId: function(value) {
        this.groupId = value;
    }
});