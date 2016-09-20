<?php

#
# Update
#

require __DIR__ . "/../boot.php";

if ($_SERVER['REQUEST_METHOD'] === 'GET') die();

$_post = isset($_POST['post']) ? $_POST['post'] : null ;
$_post = stripslashes($_post);
$_post = json_decode($_post);

$post = new Posts($_post->id);
$post->id             = $_post->id;
$post->url            = $_post->url;
$post->titulo         = $_post->titulo;
$post->resumo         = $_post->resumo;
$post->keywords       = $_post->keywords;
$post->nivel          = $_post->nivel;
$post->secao          = $_post->secao;
$post->autor          = $_post->autor;
$post->dt_atualizacao = $_post->dt_atualizacao;
$post->dt_criacao     = $_post->dt_criacao;
$post->ordem          = $_post->ordem;
$post->update();

$resp = new stdClass();
$resp->msg = "post atualizado com sucesso!";
$resp->post_id = $post->id;

echo json_encode($resp);