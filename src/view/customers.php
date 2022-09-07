<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

//require '../controller/customer.php';

//$app=new App();
$obj=new customer();

//add customer
$app->post('/customer', callable: function (Request $request, Response $response,$args) use ($obj) {
    //$cid=$request->getParam('cid');
    return $obj->addCustomer($request,$response,$args);
});


//get customer details
$app->get('/customer', callable: function (Request $request, Response $response,$args) use ($obj) {
    return $obj->getCustomers($request,$response,$args);
});


//get specified customer details
$app->get('/customer/{cid}', callable: function (Request $request, Response $response, array $args) use ($obj) {
   return $obj->getSpecifiedCustomer($request,$response,$args);
});


//Delete specified customer
$app->delete('/customer/{cid}',function (Request $request, Response $response, array $args) use ($obj) {
    return $obj->deleteCustomer($request,$response,$args);
});


//update Customer Username
$app->put('/customer/{cid}',function (Request $request,Response $response, array $args) use ($obj) {
    return $obj->updateCustomer($request,$response,$args);
});