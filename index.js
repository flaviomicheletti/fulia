var AppRouter = Backbone.Router.extend({
    routes: {
        '':       'listar',
        'artigo': 'artigo',
    }
});

var app_router = new AppRouter();

app_router.on('route:listar', function () {
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
});

app_router.on('route:artigo', function () {
    console.log('form artigo');
});

Backbone.history.start();
