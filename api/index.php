<?php

require __DIR__  . '/../vendor/autoload.php';
require __DIR__  . "/includes/Db.php";
require __DIR__  . "/class/Artigo.php";

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;

$config = [
    'settings' => [
        'displayErrorDetails' => true,
    ],
];

$app = new \Slim\App($config);


#
# Collections
#
$app->get('/artigos/', function (ServerRequestInterface $request, ResponseInterface $response) {

    //
    // Implementar o filtro
    //
    // $parsedBody = (object)$request->getQueryParams();
    // var_dump($parsedBody);

    $artigo = new Artigo();
    return $response->withJson($artigo->all());
});


#
# Create
#
$app->post('/artigo', function (ServerRequestInterface $request, ResponseInterface $response) {
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
$app->get('/artigo/{id:\d+}', function (ServerRequestInterface $request, ResponseInterface $response, $args) {
    $artigo = new Artigo($args['id']);
    $artigo->read();
    return $response->withJson($artigo);
});

#
# Update
#
$app->put('/artigo/{id:\d+}', function (ServerRequestInterface $request, ResponseInterface $response, $args) {
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
$app->delete('/artigo/{id:\d+}', function (ServerRequestInterface $request, ResponseInterface $response, $args) {
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