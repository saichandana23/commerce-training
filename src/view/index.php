<?php

$config = ['settings' => ['displayErrorDetails' => true]];


use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Slim\App;

require '../vendor/autoload.php';
require '../model/db.php';

$app = new App($config);

//require '../controller/customer.php';
//require '../controller/enrollment.php';
//require '../controller/workout.php';

//require '../view/customers.php';
//require '../view/Enrollment.php';
//require '../view/workouts.php';

try {
    $app->run();
}
catch (\Slim\Exception\MethodNotAllowedException|\Slim\Exception\NotFoundException|Exception $e) {
}
