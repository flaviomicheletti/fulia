var AppRouter = Backbone.Router.extend({
    routes: {
        '':       'listar',
        'artigo': 'artigo',
    }
});

var app_router = new AppRouter();

app_router.on('route:listar', function () {
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
});

app_router.on('route:artigo', function () {
    artigo = new Artigo({id: 1});
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
});

Backbone.history.start();