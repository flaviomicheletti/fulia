<?php

#
# Delete
#

require __DIR__ . "/../boot.php";

if ($_SERVER['REQUEST_METHOD'] === 'GET') die();

$id = isset($_POST['id']) ? $_POST['id'] : null ;

$post = new Posts($id);
$post->delete();

$resp = new stdClass();
$resp->msg = "post deletado com sucesso!";
$resp->post_id = $post->id;

echo json_encode($resp);