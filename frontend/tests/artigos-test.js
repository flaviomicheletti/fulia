//
// Post Crud
//

QUnit.module("artigo");

var temp = {};

//
// Create
//
QUnit.test("crud", function (assert) {
    var done = function () {
        assert.async();
    }
  
    //
    // Create
    //
    var artigo = new Artigo();
    artigo.url = 'foo/';
    artigo.titulo = 'Foo';
    artigo.resumo = 'Apenas um foo';
    artigo.keywords = 'foodie';
    artigo.nivel = 'intermediario';
    artigo.secao = 'php';
    artigo.autor = 'euzinho';
    artigo.dt_atualizacao = '2013-04-10';
    artigo.dt_criacao = '2013-04-10';
    artigo.ordem = 9;
    artigo.create(done);
    assert.ok(true);
    //assert.async('artigo criado com sucesso!', resp.msg);
  
//  var artigo = {
//    url: 'foo/',
//    titulo: 'Foo',
//    resumo: 'Apenas um foo',
//    keywords: 'foodie',
//    nivel: 'intermediario',
//    secao: 'php',
//    autor: 'euzinho',
//    dt_atualizacao: '2013-04-10',
//    dt_criacao: '2013-04-10',
//    ordem: 9
//  };
//
//  $.post("/fulia/backend/artigos/create.php", "artigo=" + JSON.stringify(artigo), function( data, temp ) {
//    var resp = JSON.parse(data);
//    temp.id =  resp.artigo_id;
//    console.log(resp, temp);
//    assert.equal('artigo criado com sucesso!', resp.msg);
//    done();
//  })
//    .fail(function(request, status, error) {
//      throw "artigo.create()=" + request.responseText;
//    });
});

//
// Read
//
QUnit.skip("read", function( assert, temp ) {

  console.log(temp);

  var done = function(resp) {
    assert.async();
    assert.equal('artigo carregado com sucesso!', resp.msg);
  }
  artigo_read(done, temp);

//   if (!temp.id) throw "artigo.create():" + "como ler o artigo sem o id ?";
//
//   $.post("/fulia/backend/artigos/read.php", "id=" + temp.id, function( data ) {
//     var resp = JSON.parse(data);
//     console.log(resp, temp);
//     assert.equal('artigo carregado com sucesso!', resp.msg);
//     done();
//   })
//     .fail(function(request, status, error) {
//       throw "artigo.create():" + request.responseText;
//     });
});

//
// Update
//
QUnit.skip("update", function( assert ) {
  var done = assert.async();

  if (!temp.id) throw "artigo.update():" + "como atualizar o artigo sem o id ?";

  var artigo = {
    id: temp.id,
    url: 'new-foo/',
    titulo: 'new Foo',
    resumo: 'Um outro foo',
    keywords: 'foolish',
    nivel: 'intermediario',
    secao: 'js',
    autor: 'euzinho',
    dt_atualizacao: '2013-04-10',
    dt_criacao: '2013-04-10',
    ordem: 9
  };
  $.post("/fulia/backend/artigos/update.php", "artigo=" + JSON.stringify(artigo), function( data ) {
    var resp = JSON.parse(data);
    console.log(resp, temp);
    assert.equal('artigo atualizado com sucesso!', resp.msg);
    done();
  })
    .fail(function(request, status, error) {
      throw "artigo.create()=" + request.responseText;
    });
});

//
// Delete
//
QUnit.skip("delete", function( assert ) {
  var done = assert.async();
  $.post("/fulia/backend/artigos/delete.php", "id=" + temp.id, function( data ) {
    var resp = JSON.parse(data);
    console.log(resp, temp);
    assert.equal('artigo deletado com sucesso!', resp.msg);
    done();
  })
    .fail(function(request, status, error) {
      throw "artigo.create()=" + request.responseText;
    });
});