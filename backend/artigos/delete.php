<?php

#
# Delete
#

require __DIR__ . "/../boot.php";

if ($_SERVER['REQUEST_METHOD'] === 'GET') die();

$id = isset($_POST['id']) ? $_POST['id'] : null ;

$artigo = new Artigo($id);
$artigo->delete();

$resp = new stdClass();
$resp->msg = "artigo deletado com sucesso!";
$resp->artigo_id = $artigo->id;

echo json_encode($resp);