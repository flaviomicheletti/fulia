<?php

//var_dump('foi'); die();



require 'vendor/autoload.php';

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;

$app = new \Slim\App;

$app->get('/{id}', function (ServerRequestInterface $request, ResponseInterface $response, $args) {
    return $response->withJson($args);
//    var_dump("get", $args);
//    return $response;
});

$app->post('/', function (ServerRequestInterface $request, ResponseInterface $response) {
    return $response->withJson(array('create' => true));
//    var_dump("post", $args);
//    return $response;
});

$app->put('/{id}', function (ServerRequestInterface $request, ResponseInterface $response, $args) {
    return $response->withJson($args);
//    var_dump("put", $args);
//    return $response;
});

$app->delete('/{id}', function (ServerRequestInterface $request, ResponseInterface $response, $args) {
    return $response->withJson($args);
//    var_dump("delete", $args);
//    return $response;
});

$app->run();