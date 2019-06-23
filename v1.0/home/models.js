//
// Model
//
App.Artigo = Backbone.Model.extend({
    urlRoot: '../../../api/artigo',
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
App.Artigos = Backbone.Collection.extend({
    model: App.Artigo,
    url: '../../api/artigos/',
    query: new App.Artigo()
});