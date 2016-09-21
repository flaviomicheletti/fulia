<?php

#
# Update
#

require __DIR__ . "/../boot.php";

if ($_SERVER['REQUEST_METHOD'] === 'GET') die();

$_artigo = isset($_POST['artigo']) ? $_POST['artigo'] : null ;
$_artigo = stripslashes($_artigo);
$_artigo = json_decode($_artigo);

$artigo = new Artigo($_artigo->id);
$artigo->id             = $_artigo->id;
$artigo->url            = $_artigo->url;
$artigo->titulo         = $_artigo->titulo;
$artigo->resumo         = $_artigo->resumo;
$artigo->keywords       = $_artigo->keywords;
$artigo->nivel          = $_artigo->nivel;
$artigo->secao          = $_artigo->secao;
$artigo->autor          = $_artigo->autor;
$artigo->dt_atualizacao = $_artigo->dt_atualizacao;
$artigo->dt_criacao     = $_artigo->dt_criacao;
$artigo->ordem          = $_artigo->ordem;
$artigo->update();

$resp = new stdClass();
$resp->msg = "artigo atualizado com sucesso!";
$resp->artigo_id = $artigo->id;

echo json_encode($resp);