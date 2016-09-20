<?php

#
# Read
#

require __DIR__ . "/../boot.php";

$id = isset($_POST['id']) ? $_POST['id'] : null ;

$post = new Posts($id);
$post->read();

$resp = new stdClass();
$resp->msg = "post carregado com sucesso!";
$resp->post_id = $post->id;

echo json_encode($resp);