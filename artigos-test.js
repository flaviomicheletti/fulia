//
// Artigo Crud
//
QUnit.module("artigo");
QUnit.test("crud", function (assert) {

    //
    // create
    //
    var artigo = new Artigo();
    artigo.save({}, {
        success: function (_model) {
            console.log("create(save): ok!");
            // o backend deve retornar um json com id
//            console.log(artigo.attributes);
            artigo.set({id: 2});

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