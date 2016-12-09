//
// Model
//
window.Artigo = Backbone.Model.extend({
    urlRoot: 'api/',
    sync: function (method, model, options) {
        console.log(method + "(sync): ", model.attributes);
        return Backbone.sync.apply(this, arguments);
    }
});

