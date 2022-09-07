<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class workout
{
    function addWorkout(Request $request, Response $response, $args)
    {
        $workoutname = $request->getParam('workoutname');
        $sqladdworkout = "Insert into workout (workoutname) value (:workoutname)";
        try {
            $db = new database();
            $conn = $db->connect();
            $stmt = $conn->prepare($sqladdworkout);
            $stmt->bindParam(':workoutname', $workoutname);
//            echo $workoutname;
            $result=$stmt->execute();
//            echo $result;
            $db = null;

            $response->getBody()->write(json_encode($result));
//            echo $response;
            return $response
                ->withHeader('content-type', 'application/json')
                ->withStatus(200);
        } catch (Exception $e) {
            $error = [
                $e->getMessage()
            ];
            $response->getBody()->write(json_encode($error));
            return $response
                ->withJson([

                ]);
        }
    }

    function getWorkout(Request $request, Response $response, $args)
    {

        $sqlgetall = "select * from workout";
        try {
            $db = new database();
            $conn = $db->connect();
            $stmt = $conn->query($sqlgetall);
//            $result = $stmt->execute();
//            echo $result;
//            $response->getBody()->write(json_encode($result));
//            echo $response;
            $practice=$stmt->fetchAll(PDO::FETCH_OBJ);

            $db=null;
//            $response->getBody()->write($practice);
            return $response->withJson(['data'=>$practice]);
        } catch (Exception $e) {
            $error = [
                $e->getcode()
                    ->getmesage()
            ];
            $response->getBody()->write(json_encode($error));
            return $response
                ->withJson();
        }

    }
}