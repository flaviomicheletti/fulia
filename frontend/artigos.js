var Artigo = function(){

    this.create = function(callback){
        var me = this;
        $.post("/fulia/backend/artigos/create.php", "artigo=" + JSON.stringify(this), function (data) {
            var resp = JSON.parse(data);
            console.log("artigo.create(): ", resp);
            me.id = resp.artigo_id;
            callback(resp);
        })
        .fail(function(request, status, error) {
            throw "artigo.create()=" + request.responseText;
        });    
    };

    this.read = function (id, callback) {
        if (!id) throw "artigo.read(): " + "como ler o artigo sem o id ?";
        $.post("/fulia/backend/artigos/read.php", "id=" + id, function (data) {
            var resp = JSON.parse(data);
            console.log("artigo.read(): ", resp);
            callback(resp);
        })
        .fail(function (request, status, error) {
            throw "artigo.read():" + request.responseText;
        });
    };
    
    this.update = function (callback) {
        if (!this.id) throw "artigo.update(): " + "como atualizar o artigo sem o id ?";
        $.post("/fulia/backend/artigos/update.php", "artigo=" + JSON.stringify(this), function (data) {
            var resp = JSON.parse(data);
            console.log("artigo.update(): ", resp);
            callback(resp);
        })
        .fail(function(request, status, error) {
            throw "artigo.update()=" + request.responseText;
        });        
    };
    
    this.delete = function (id, callback) {
        if (!id) throw "artigo.delete(): " + "como deletar o artigo sem o id ?";
        $.post("/fulia/backend/artigos/delete.php", "id=" + id, function( data ) {
            var resp = JSON.parse(data);
            console.log("artigo.delete(): ", resp);
            callback(resp);
        })
        .fail(function(request, status, error) {
            throw "artigo.delete()=" + request.responseText;
        });        
    };
};