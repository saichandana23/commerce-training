<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Slim\App;
$app=new App();

$app->get('/customers', callable: function (Request $request, Response $response){
    $sql='select * from customer';
    try{
        $db=new database();
        $conn= $db->connect();

        $stmt=$conn->query($sql);
        $pract=$stmt->fetchAll(PDO::FETCH_OBJ);

        $db=null;
        $response->getBody()->write(json_encode($pract));
        return $response
            ->withHeader('content-type','application/json')
            ->withStatus(200);
    }catch (PDOException $e){
        $error=array(
            "message"=>$e->getMessage()
        );
        $response->getBody()->write(json_encode($error));
        return $response
            ->withHeader('content-type', 'application/json')
            ->withStatus(500);
    }
});