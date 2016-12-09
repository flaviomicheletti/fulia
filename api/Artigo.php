<?php

/**
 * Representa um artigo
 */
 class Artigo {

    private $_table_name = "artigos";
    private $dbh;

    function __construct($id=null) {
        $this->id  = $id;
        $this->dbh = Db::getConexao();
    }

    function create() {
        $sql = "INSERT INTO " . $this->_table_name 
             . " (id, url, titulo, resumo, keywords, nivel, secao, autor, dt_atualizacao, dt_criacao, ordem) "
             . "VALUES (:_id, :_url, :_titulo, :_resumo, :_keywords, :_nivel, :_secao, :_autor, :_dt_atualizacao, :_dt_criacao, :_ordem)";
        $sth = $this->dbh->prepare($sql);
        $sth->bindParam(":_id",             $this->id);
        $sth->bindParam(":_url",            $this->url);
        $sth->bindParam(":_titulo",         $this->titulo);
        $sth->bindParam(":_resumo",         $this->resumo);
        $sth->bindParam(":_keywords",       $this->keywords);
        $sth->bindParam(":_nivel",          $this->nivel);
        $sth->bindParam(":_secao",          $this->secao);
        $sth->bindParam(":_autor",          $this->autor);
        $sth->bindParam(":_dt_atualizacao", $this->dt_atualizacao);
        $sth->bindParam(":_dt_criacao",     $this->dt_criacao);
        $sth->bindParam(":_ordem",          $this->ordem);
        $sth->execute();

        $this->id = $this->dbh->lastInsertId('id');
        return true;
    }

    function read() {
        $sql = "SELECT * FROM " . $this->_table_name . " WHERE id = :id";
        $sth = $this->dbh->prepare($sql);
        $sth->bindParam(":id", $this->id);
        $sth->execute();
        $_obj = $sth->fetch(PDO::FETCH_OBJ);

        if(!$_obj) {
            throw new Exception("resultado de artigo->read(" . $this->id . ") he igual a 'null'", 1);
        }

        $this->_url           = $_obj->url;
        $this->titulo         = $_obj->titulo;
        $this->resumo         = $_obj->resumo;
        $this->keywords       = $_obj->keywords;
        $this->nivel          = $_obj->nivel;
        $this->secao          = $_obj->secao;
        $this->autor          = $_obj->autor;
        $this->dt_atualizacao = $_obj->dt_atualizacao;
        $this->dt_criacao     = $_obj->dt_criacao;
        $this->ordem          = $_obj->ordem;
        return true;
    }

    function update() {
        $sql = "UPDATE " . $this->_table_name . " SET "
             . "id = :_id, url = :_url, titulo = :_titulo, resumo = :_resumo, keywords = :_keywords, nivel = :_nivel, "
             . "secao = :_secao, autor = :_autor, dt_atualizacao = :_dt_atualizacao, dt_criacao = :_dt_criacao, ordem = :_ordem "
             . "WHERE id = :_id";
        $sth = $this->dbh->prepare($sql);
        $sth->bindParam(":_id",             $this->id);
        $sth->bindParam(":_url",            $this->url);
        $sth->bindParam(":_titulo",         $this->titulo);
        $sth->bindParam(":_resumo",         $this->resumo);
        $sth->bindParam(":_keywords",       $this->keywords);
        $sth->bindParam(":_nivel",          $this->nivel);
        $sth->bindParam(":_secao",          $this->secao);
        $sth->bindParam(":_autor",          $this->autor);
        $sth->bindParam(":_dt_atualizacao", $this->dt_atualizacao);
        $sth->bindParam(":_dt_criacao",     $this->dt_criacao);
        $sth->bindParam(":_ordem",          $this->ordem);

        return $sth->execute();
    }

    function delete() {
        $sql = "DELETE FROM " . $this->_table_name . " WHERE id = :id";
        $sth = $this->dbh->prepare($sql);
        $sth->bindParam(":id", $this->id);
        return $sth->execute();
    }

}