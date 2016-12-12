//
// Model
//
window.Artigo = Backbone.Model.extend({
    urlRoot: 'api/',
    sync: function (method, model, options) {
        // console.log(method + "(sync): ", model.attributes);
        return Backbone.sync.apply(this, arguments);
    },
    defaults: {
        _url:           '',
        titulo:         '',
        resumo:         '',
        keywords:       '',
        nivel:          '',
        secao:          '',
        autor:          '',
        dt_atualizacao: '',
        dt_criacao:     '',
        ordem:           0
    }
});

//
// Collections
//
window.Artigos = Backbone.Collection.extend({
    model: Artigo,
    url: 'api/artigos/',
    query: new Artigo()
});