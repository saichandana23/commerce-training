<?php

$config = ['settings' => ['displayErrorDetails' => true]];


use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Slim\App;

require '../vendor/autoload.php';
require '../config/db.php';

$app = new App($config);
$app->get('/', function (Request $request, Response $response, array $args) {
    $response->getBody()->write("Hello");

    return $response;
});
require '../routes/practice.php';
$app->run();
