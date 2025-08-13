<?php

require __DIR__.'/vendor/autoload.php';

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use App\Aluno;
use App\DBConnection;

$app = AppFactory::create();

$app->get('/', function(Request $request, Response $response, $args){
    $response->getBody()->write('<a href="/hello/world">Tente /hello/world</a>');
    return $response;
});

$app->get('/hello/{nome}', function(Request $request, Response $response, $args){
    $nome = $args['nome'];
    $response->getBody()->write("Olá, $nome");
    return $response;
});

$app->get('/aluno', function(Request $request, Response $response, $args){
    $db = new DBConnection();
    $alunoModel = new Aluno($db);
    $alunos = $alunoModel->getAlunoAll();
    $response->getBody()->write(json_encode($alunos));
    return $response;
});
$app->run();