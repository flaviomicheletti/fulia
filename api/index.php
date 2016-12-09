<?php

require 'vendor/autoload.php';
require __DIR__  . "/Artigo.php";
require __DIR__  . "/Db.php";

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;

$config = [
    'settings' => [
        'displayErrorDetails' => true,
    ],
];

$app = new \Slim\App($config);

#
# Create
#
$app->post('/', function (ServerRequestInterface $request, ResponseInterface $response) {
    $parsedBody = $request->getParsedBody();
    $parsedBody['id'] = 99;
    return $response->withJson($parsedBody);
});

#
# Read
#
$app->get('/{id:\d+}', function (ServerRequestInterface $request, ResponseInterface $response, $args) {
    $artigo = new Artigo(99);
//    $artigo->read();    
    $artigo->id             = 99;
    $artigo->url            = "foo/";
    $artigo->titulo         = "Foo";
    $artigo->resumo         = "Apenas um foo";
    $artigo->keywords       = "foodie";
    $artigo->nivel          = "intermediario";
    $artigo->secao          = "php";
    $artigo->autor          = "euzinho";
    $artigo->dt_atualizacao = "2013-04-10";
    $artigo->dt_criacao     = "2013-04-10";
    $artigo->ordem          = 5;
    return $response->withJson($artigo);
});

#
# Update
#
$app->put('/{id:\d+}', function (ServerRequestInterface $request, ResponseInterface $response, $args) {
    $artigo = new Artigo(99);
    $artigo->url            = "foo/";
    $artigo->titulo         = "Foo";
    $artigo->resumo         = "Apenas um foo";
    $artigo->keywords       = "foodie";
    $artigo->nivel          = "intermediario";
    $artigo->secao          = "php";
    $artigo->autor          = "euzinho";
    $artigo->dt_atualizacao = "2013-04-10";
    $artigo->dt_criacao     = "2013-04-10";
    $artigo->ordem          = 5;
    //$artigo->update();    
    return $response->withJson($artigo);
});

#
# Delete
#
$app->delete('/{id:\d+}', function (ServerRequestInterface $request, ResponseInterface $response, $args) {
    $artigo = new Artigo($args['id']);
    $artigo->delete();
    return $response->withJson(array(
        "msg" => "Artigo({$artigo->id}) deletado com sucesso!")
    );
});

$app->run();