window.artigos = new Artigos();
artigos.fetch({
    success: function (collection, response) {
        window.artigos_view = new ArtigosView({
            collection: artigos
        });
        window.artigos_view.render();
    },
    error: function (collection, response) {
        console.log('NEG');
        console.log(collection, response);
    }
});

//
// view
//
window.ArtigosView = Backbone.View.extend({
    el: $("#lista-artigos"),
    render: function () {
        var artigos = this.collection.models;                 // models
        for (var i = 0; i < artigos.length; i++) {
            var linha_view = new ArtigoLinhaView();           // view da linha
            $(this.el).append(linha_view.render(artigos[i]));
        }
        return this;
    }
});

//
// linha view
//
var ArtigoLinhaView = Backbone.View.extend({
    tagName: 'tr',    
    template: _.template($('#linha-artigo').html()),
    render: function (model) {
        this.model = model;
        return this.$el.html(this.template(model.attributes));
    },
    events: {
        "click a":      "abrir_form",
        "click button": "deletar"
    },
    abrir_form: function (evt) {
        evt.preventDefault();
        console.log('abrir-form: ', this.model.id);
    },
    deletar: function () {
        console.log('deletar: ', this.model.id);
    }
    
});
