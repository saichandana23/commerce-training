<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

//require '../controller/enrollment.php';
//$app=new App();

$obj=new enrollment();

//Enroll user to workout
$app->post(pattern: '/customer/{cid}/enroll',callable: function(Request $request, Response $response, array $args) use ($obj) {
return $obj->enroll($request,$response,$args);
});

//Get Enrollments
$app->get('/customer/{cid}/enroll', callable: function (Request $request, Response $response, array $args) use ($obj) {
return $obj->getEnrollment($request,$response,$args);
});

//Delete Enrollments
$app->delete(pattern: '/customer/{cid}/enroll',callable: function(Request $request, Response $response, array $args) use ($obj) {
return $obj->deleteEnrollment($request,$response,$args);
});


