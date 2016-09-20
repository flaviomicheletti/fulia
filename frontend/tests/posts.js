//
// Post Crud
//

QUnit.module("post");

var temp = {};

//
// Create
//
QUnit.test("create", function( assert ) {
  var done = assert.async();
  var post = {
    url: 'foo/',
    titulo: 'Foo',
    resumo: 'Apenas um foo',
    keywords: 'foodie',
    nivel: 'intermediario',
    secao: 'php',
    autor: 'euzinho',
    dt_atualizacao: '2013-04-10',
    dt_criacao: '2013-04-10',
    ordem: 9
  };
  $.post("/fulia/backend/posts/create.php", "post=" + JSON.stringify(post), function( data ) {
    var resp = JSON.parse(data);
    temp.id =  resp.post_id;
    console.log(resp, temp);
    assert.equal('post criado com sucesso!', resp.msg);
    done();
  })
    .fail(function(jqXHR, textStatus) {
      throw "Post Create=" + textStatus;
    });
});

//
// Read
//
QUnit.test("read", function( assert ) {
  var done = assert.async();
  $.post("/fulia/backend/posts/read.php", "id=" + temp.id, function( data ) {
    var resp = JSON.parse(data);
    assert.equal('post carregado com sucesso!', resp.msg);
    done();
  })
    .fail(function(jqXHR, textStatus) {
      throw "Post Read=" + textStatus;
    });
});

//
// Update
//
QUnit.test("update", function( assert ) {
  var done = assert.async();
  var post = {
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
  $.post("/fulia/backend/posts/update.php", "post=" + JSON.stringify(post), function( data ) {
    var resp = JSON.parse(data);
    assert.equal('post atualizado com sucesso!', resp.msg);
    done();
  })
    .fail(function(jqXHR, textStatus) {
      throw "Post update=" + textStatus;
    });
});

//
// Delete
//
QUnit.test("delete", function( assert ) {
  var done = assert.async();
  $.post("/fulia/backend/posts/delete.php", "id=" + temp.id, function( data ) {
    var resp = JSON.parse(data);
    assert.equal('post deletado com sucesso!', resp.msg);
    done();
  })
    .fail(function(jqXHR, textStatus) {
      throw "Post Delete=" + textStatus;
    });
});