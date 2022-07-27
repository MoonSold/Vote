Ext.define('app.controller.Users', {
    extend: 'Ext.app.Controller',

    views: ['AllVoteGroup'],
    models: ['VoteGroup'],
    init: function () {
        this.control({
            'viewport > booklist': {
                itemdblclick: this.editBook
            },
            'bookwindow button[action=new]': {
                click: this.createBook
            },
            'bookwindow button[action=save]': {
                click: this.updateBook
            },
            'bookwindow button[action=delete]': {
                click: this.deleteBook
            },
            'bookwindow button[action=clear]': {
                click: this.clearForm
            }
        });
    }
});