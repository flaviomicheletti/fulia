var App = window.App || {};

App.router = Backbone.Router.extend({
    routes: {
        ''           : 'listar',
        'artigo/:id' : 'artigo',
    },
    listar: function () {
        var artigos = new Artigos();
        artigos.fetch({
            success: function (collection, response) {
                var lista = new ArtigosTableView();
                $('#content').html(lista.render());    

                var trs = new ArtigosTBodyView({
                    collection: artigos
                });
                console.log(trs.$el);
                trs.render();
            },
            error: function (collection, response) {
                console.log('NEG');
                console.log(collection, response);
            }
        }); 
    },
    artigo: function (id) {
        console.log(id);
        artigo = new Artigo({id: id});
        artigo.fetch({
            success: function (_model) {
                console.log("read(fetch): ok!");
                //console.log(artigo.attributes);

                formulario = new ArtigoFormView();
                $('#content').html(formulario.render(_model));
            },
            error: function (model, xhr, options) {
                console.log("read(fetch): falhou!");
            }
        });    
    }
});