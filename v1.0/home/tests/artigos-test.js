QUnit.module("artigo");

//
// Artigo Crud
//
QUnit.test("crud", function (assert) {

    //
    // create
    //
    var artigo = new App.Artigo({
        _url:           'foo/',
        titulo:         'Foo',
        resumo:         'Apenas um foo',
        keywords:       'foodie',
        nivel:          'intermediario',
        secao:          'php',
        autor:          'euzinho',
        dt_atualizacao: '2013-04-10',
        dt_criacao:     '2013-04-10',
        ordem:           9
    });
    artigo.urlRoot = "../../../api/artigo";
    artigo.save({}, {
        success: function (_model) {
            console.log("create(save): ok!");
            // console.log(artigo.attributes);
            // console.log(artigo.id);

            //
            // read
            //
            artigo.fetch({
                success: function (_model) {
                    console.log("read(fetch): ok!");
                    // console.log(artigo.attributes);

                    //
                    // update
                    //
                    artigo.set('titulo', "mudei o titulo");
                    artigo.save({}, {
                        success: function (_model) {
                            console.log("update(save): ok!");
                            // console.log(artigo.attributes);

                            //
                            // delete
                            //
                            artigo.destroy({
                                success: function (_model) {
                                    console.log("delete: ok!");
                                    // console.log(artigo.attributes);
                                },
                                error: function (model, xhr, options) {
                                    console.log("delete falhou!");
                                }
                            });

                        },
                        error: function (model, xhr, options) {
                            console.log("update(save): falhou!");
                        }
                    });
                },
                error: function (model, xhr, options) {
                    console.log("read(fetch): falhou!");
                }
            });
        },
        error: function (model, xhr, options) {
            console.log("create(save): falhou!");
        }
    });

    assert.ok(true);
});


//
// Artigo Collection
//
QUnit.test("collection", function (assert) {
    var artigos = new App.Artigos();
    artigos.url = "../../../api/artigos/";
    // artigos.fetch({
    //    data: artigos.query.attributes,
    artigos.fetch({
        success: function (collection, response) {
            console.log('OK');
            console.log(JSON.stringify(artigos.toJSON()));
        },
        error: function (collection, response) {
            console.log('NEG');
            console.log(artigos.options);
            console.log(JSON.stringify(artigos.toJSON()));
        },
    });

    assert.ok(true);
});