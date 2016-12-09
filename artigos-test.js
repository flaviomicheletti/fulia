//
// Artigo Crud
//
QUnit.module("artigo");
QUnit.test("crud", function (assert) {

    //
    // create
    //
    var obj = {
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
    }
    
    var artigo = new Artigo(obj);
    
    
    artigo.save({}, {
        success: function (_model) {
            console.log("create(save): ok!");
//            console.log(artigo.attributes);
            console.log(artigo.id);

            //
            // read
            //
            artigo.fetch({
                success: function (_model) {
                    console.log("read(fetch): ok!");
//                    console.log(artigo.attributes);

                    //
                    // update
                    //
                    artigo.set('titulo', "mudei o titulo");
                    artigo.save({}, {
                        success: function (_model) {
                            console.log("update(save): ok!");
//                            console.log(artigo.attributes);

                            //
                            // delete
                            //
                            artigo.destroy();

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