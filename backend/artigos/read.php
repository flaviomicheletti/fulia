<?php

#
# Read
#

require __DIR__ . "/../boot.php";

if ($_SERVER['REQUEST_METHOD'] === 'GET') die();

$id = isset($_POST['id']) ? $_POST['id'] : null ;

$artigo = new Artigo($id);
$artigo->read();

$resp = new stdClass();
$resp->msg = "artigo carregado com sucesso!";
$resp->artigo_id = $artigo->id;

echo json_encode($resp);