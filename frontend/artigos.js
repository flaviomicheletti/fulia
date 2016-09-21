var Artigo = function(){

    this.create = function(callback){
        $.post("/fulia/backend/artigos/create.php", "artigo=" + JSON.stringify(this), function( data ) {
          var resp = JSON.parse(data);
          console.log("dentro da funcao create - ", resp);
          callback();
        })
          .fail(function(request, status, error) {
            throw "artigo.create()=" + request.responseText;
          });    
      };
    
};



function artigo_read(callback, id) {
    if (!id) throw "artigo.read():" + "uhuhu  como ler o artigo sem o id ?";

    $.post("/fulia/backend/artigos/read.php", "id=" + id, function (data) {
        var resp = JSON.parse(data);
        console.log(resp, id);
        callback(resp);
    }).fail(function (request, status, error) {
        throw "artigo.create():" + request.responseText;
    });
}

