<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class enrollment{
    function enroll(Request $request,Response $response, array $args){
        $customerid=$args['cid'];
        $workoutname=$request->getParam('workoutname');
        $sqltofetchwid="select * from workout where workoutname='$workoutname'";
//        $sqltoenroll="Insert into enrollment(customerid,workoutid) value ($customerid,$workoutid)";
        try{
            $db=new database();
            $conn=$db->connect();
            $stmt=$conn->prepare($sqltofetchwid);
            $stmt->execute();

            $workout = $stmt->fetchAll(PDO::FETCH_OBJ)[0];
            //var_dump($workoutid);
//            return $workoutid;
            $w = $workout->wid;
            echo $w;
            $sqltoenroll="Insert into enrollment (customerid,workoutid) values ($customerid,$w)";

            $stmt1=$conn->prepare($sqltoenroll);
            $stmt1->execute();
            $result=$stmt1->fetchAll(PDO::FETCH_OBJ);
//            echo $result;
            $db=null;
//            var_dump($result);
            //$response->getBody()->write(json_encode($result));
            return $response
                ->withJson([
                    'wid'=>$w,
                    "cid"=>$customerid
                ]);
//                ->withHeader('content-type','application/json')
//                ->withStatus(200);
        }catch (PDOException $e){
            $error=array(
                "message"=>$e->getTraceAsString()
            );
            $response->getBody()->write(json_encode($error));
            return $response
                ->withHeader('content-type', 'application/json')
                ->withStatus(500);
        }
    }
    function getEnrollment(Request $request,Response $response,array $args){

        $customerid=$args['cid'];


        $sql="select * from enrollment where customerid='$customerid'";

        try{
            $db=new database();
            $conn=$db->connect();

//            $stmt=$conn->query($sql);
//
//            $result=$stmt->execute();
            $result=$conn->prepare($sql);
            $result->execute();
            $db=null;

//            $response->getBody()->write(json_encode($result));
            return $response
               ->withJson([$result->fetchAll(PDO::FETCH_OBJ)]);
        }catch (PDOException $e){
            $error=array(
                "message"=>$e->getMessage()
            );
            $response->getBody()->write(json_encode($error));
            return $response
                ->withHeader('content-type', 'application/json')
                ->withStatus(500);
        }
    }
    function deleteEnrollment(Request $request,Response $response,array $args){
        $cid=$args['cid'];
        $workout=$request->getParam['workout'];

      $sqlToDeleteEnrollment="Delete from enrollment where cid=$cid and wokoutid=$workoutid";
      // $sql2="Delete from workout where cid=$cid and workouttype=$workout";

        try{
            $db=new database();
            $conn=$db->connect();

            $stmt=$conn->prepare($sql1);

            $result=$stmt->execute();

            $stmt=$conn->prepare($sql2);
            $stmt->bindParam(':workouttype',$workout);

            $result=$stmt->execute();
            $db=null;

            $response->getBody()->write(json_encode($result));
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
    }
}