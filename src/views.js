//
// Lista de artigos (table)
//
App.ArtigosTableView = Backbone.View.extend({
    template: _.template($('#tpl-lista-de-artigos').html()),
    render: function () {
        return this.$el.html(this.template());
    }
});

//
// Lista de artigos (body)
//
App.ArtigosTBodyView = Backbone.View.extend({
    render: function () {
        this.el=  $("#tbody");
        var artigos = this.collection.models;           // models
        var tr = {};

        for (var i = 0; i < artigos.length; i++) {
            tr = new App.ArtigosTrView();               // view da linha
            $(this.el).append(tr.render(artigos[i]));
        }
        return this;
    }
});

//
// Lista de artigos (cada linha)
//
App.ArtigosTrView = Backbone.View.extend({
    tagName: 'tr',
    template: _.template($('#tpl-cada-artigo').html()),
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
        window.location.href = "#artigo/" + this.model.id;
    },
    deletar: function () {
        console.log('deletar: ', this.model.id);
        var self = this;
        this.model.destroy({
            success: function (_model) {
                console.log("delete: ok!");
                self.remove();
            },
            error: function (model, xhr, options) {
                console.log("delete falhou!");
            }
        });
    }
});

//
// Formulário
//
App.ArtigoFormView = Backbone.View.extend({
    template: _.template($('#tpl-form').html()),
    render: function (model) {
        this.model = model;
        return this.$el.html(this.template(model.attributes));
    },
    events: {
        "change form":          "change",
        "click  #btn-salvar":   "salvar",
        "click  #btn-cancelar": "cancelar"
    },
    change: function(event) {
        var target = event.target;
        var ctrl = {
            name:  target.name,
            value: target.value
        };
        // console.log(ctrl);
        this.model.set(ctrl.name, ctrl.value);
        // console.log(this.model.attributes);
    },
    salvar: function () {
        console.log('salvar: ', this.model.id);
        //console.log(this.model.attributes);
        this.model.save({}, {
            success: function (_model) {
                console.log("create(save): ok!");
                alert("Registro salvo com sucesso");
            },
            error: function (model, xhr, options) {
                console.log("create(save): falhou!");
            }
        });        
    },
    cancelar: function () {
        console.log('cancelar: ', this.model.id);
        window.location.href = "#";
    }
});