window.artigo = new Artigo({id: 1});
artigo.fetch({
    success: function (_model) {
        console.log("read(fetch): ok!");
        //console.log(artigo.attributes);

        var frm = new FormularioView();
        $('#content').html(frm.render(_model));
    },
    error: function (model, xhr, options) {
        console.log("read(fetch): falhou!");
    }
});

var FormularioView = Backbone.View.extend({
    template: _.template($('#form-template').html()),
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
        console.log(this.model.attributes);
    },
    cancelar: function () {
        console.log('cancelar: ', this.model.id);
    }
});