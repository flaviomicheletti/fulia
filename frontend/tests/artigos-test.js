//
// Artigo Crud
//
QUnit.module("artigo");
QUnit.test("crud", function (assert) {
    var artigo = new Artigo();
    artigo.url            = 'foo/';
    artigo.titulo         = 'Foo';
    artigo.resumo         = 'Apenas um foo';
    artigo.keywords       = 'foodie';
    artigo.nivel          = 'intermediario';
    artigo.secao          = 'php';
    artigo.autor          = 'euzinho';
    artigo.dt_atualizacao = '2013-04-10';
    artigo.dt_criacao     = '2013-04-10';
    artigo.ordem          = 9;

    //
    // Create
    //
    artigo.create(function () {
        
        //
        // Read
        //
        artigo.read(artigo.id, function () {
            artigo.titulo = "Foo die";
            artigo.resumo = "Mais um foo";
            artigo.nivel = 'basico';
            
            //
            // Update
            //
            artigo.update(function () {
                
                //
                // Delete
                //
                artigo.delete(artigo.id, function () {
                    // done
                    assert.async();
                });
            });
        });
    });
    assert.ok(true);
});