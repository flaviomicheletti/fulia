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
    $parsedBody = (object)$request->getParsedBody();
    $artigo = new Artigo;
    $artigo->url            = $parsedBody->_url;
    $artigo->titulo         = $parsedBody->titulo;
    $artigo->resumo         = $parsedBody->resumo;
    $artigo->keywords       = $parsedBody->keywords;
    $artigo->nivel          = $parsedBody->nivel ;
    $artigo->secao          = $parsedBody->secao;
    $artigo->autor          = $parsedBody->autor ;
    $artigo->dt_atualizacao = $parsedBody->dt_atualizacao;
    $artigo->dt_criacao     = $parsedBody->dt_criacao;
    $artigo->ordem          = $parsedBody->ordem ;
    if ($artigo->create()) {
        return $response->withJson($artigo);
    } else {
        return $response->withJson(array('erro' => "falha ao inserir artigo"), 501);
    }
    
});

#
# Read
#
$app->get('/{id:\d+}', function (ServerRequestInterface $request, ResponseInterface $response, $args) {
    $artigo = new Artigo($args['id']);
    $artigo->read();    
    return $response->withJson($artigo);
});

#
# Update
#
$app->put('/{id:\d+}', function (ServerRequestInterface $request, ResponseInterface $response, $args) {
    $parsedBody = (object)$request->getParsedBody();
    $artigo = new Artigo();
    $artigo->id             = $parsedBody->id;
    $artigo->_url           = $parsedBody->_url;
    $artigo->titulo         = $parsedBody->titulo;
    $artigo->resumo         = $parsedBody->resumo;
    $artigo->keywords       = $parsedBody->keywords;
    $artigo->nivel          = $parsedBody->nivel ;
    $artigo->secao          = $parsedBody->secao;
    $artigo->autor          = $parsedBody->autor ;
    $artigo->dt_atualizacao = $parsedBody->dt_atualizacao;
    $artigo->dt_criacao     = $parsedBody->dt_criacao;
    $artigo->ordem          = $parsedBody->ordem ;
    if ($artigo->update()) {
        return $response->withJson($artigo);
    } else {
        return $response->withJson(array('erro' => "falha ao atualizar artigo"), 501);
    }
});

#
# Delete
#
$app->delete('/{id:\d+}', function (ServerRequestInterface $request, ResponseInterface $response, $args) {
    $artigo = new Artigo($args['id']);
    $artigo->delete();
    if ($artigo->update()) {
        return $response->withJson(array(
            "msg" => "Artigo({$artigo->id}) deletado com sucesso!")
        );
    } else {
        return $response->withJson(array('erro' => "falha ao deletar artigo ({$artigo->id})"), 501);
    }
});

$app->run();