<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

$obj=new workout();

//add workout
$app->post('/workout', function (Request $request, Response $response, $args) use ($obj) {
    return $obj->addWorkout($request,$response,$args);
});

//get workout
$app->get('/workout',function (Request $request,Response $response,$args) use ($obj) {
   return $obj->getWorkout($request,$response,$args);
});
