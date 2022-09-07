<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class customer{
     function addCustomer(Request $request,Response $response,$args){
         $name=$request->getParam('name');
         $phno=$request->getParam('phno');
         $mailid=$request->getParam('mailid');
         $username=$request->getParam('username');
         $password=$request->getParam('password');

         $sql="Insert into customer (name,phno,mailid,username,password) value(:name,:phno,:mailid,:username,:password)";

         try{
             $db=new database();
             $conn=$db->connect();

             $stmt=$conn->prepare($sql);
             $stmt->bindParam(':name',$name);
             $stmt->bindParam(':phno',$phno);
             $stmt->bindParam(':mailid',$mailid);
             $stmt->bindParam(':username',$password);
             $stmt->bindParam(':password',$password);

             $result=$stmt->execute();
             $db=null;

             $response->getBody()->write(json_encode($result));
             return $response
                 ->withHeader('content-type','application/json')
                 ->withStatus(200);
         }
         catch (PDOException $e){
             $error=array(
                 "message"=>$e->getMessage()
             );
             $response->getBody()->write(json_encode($error));
             return $response
                 ->withHeader('content-type', 'application/json')
                 ->withStatus(500);
         }
     }
     function getCustomers(Request $request,Response $response,$args){

         $sql="select cid,name,phno,mailid,username from customer";
         try{
             $db=new database();
             $conn= $db->connect();

             $stmt=$conn->query($sql);
             $stmt->execute();
             $practice=$stmt->fetchAll(PDO::FETCH_OBJ);
           // echo $practice;
             $db=null;
            // $response->getBody()->write($practice);
             return $response->withJson(['data'=>$practice]);
         }catch (PDOException $e){
             $error=array(
                 "message"=>$e->getMessage()
             );
             $response->getBody()->write(json_encode($error));
             return $response;
         }
     }
     function getSpecifiedCustomer(Request $request,Response $response,array $args){
         $cid=$args['cid'];
         $sql="select name,phno,mailid,username from customer where cid='$cid'";
         try{
             $db=new database();
             $conn= $db->connect();

             $stmt=$conn->query($sql);
             $stmt->execute();
             $practice=$stmt->fetch(PDO::FETCH_OBJ);

             $db=null;
             //$response->getBody()->write('abc');
             return $response->withJson([
                 'data'=>$practice
             ]);
//             return $response
//                 ->withHeader('content-type','application/json')
//                 ->withStatus(200);
         }catch (PDOException $e){
             $error=array(
                 "message"=>$e->getMessage()
             );
             $response->getBody()->write(json_encode($error));
             return $response;
         }
     }
     function deleteCustomer(Request $request,Response $response,array $args)
     {
         $cid = $args['cid'];
         $sql1="Delete from enrollment where customerid=$cid";
         $sql2= "Delete from customer where cid=$cid";
         try{
             $db = new database();
             $conn = $db->connect();
             $stmt = $conn->prepare($sql1);
             $stmt->execute();

             $stmt = $conn->prepare($sql2);
             $result=$stmt->execute();
             $db=null;

             $response->getBody()->write(json_encode($result));
             return $response
                 ->withHeader('content-type','application/json')
                 ->withStatus(200);
         } catch (PDOException $e) {
             $error = array(
                 "message" => $e->getMessage()
             );
             $response->getBody()->write(json_encode($error));
             return $response;
         }
     }
     function updateCustomer(Request $request,Response $response,array $args){
         $cid=$args['cid'];
         $username=$request->getParam('username');
         $sql= "update customer set username='$username' where cid='$cid'";
         try {
             $db = new database();
             $conn = $db->connect();
             $stmt = $conn->prepare($sql);
             $result = $stmt->execute();

             $db = null;
             $response->getBody()->write(json_encode($result));
             return $response
                 ->withHeader('content-type', 'application/json')
                 ->withStatus(200);
         } catch (PDOException $e) {
             $error = array(
                 "message" => $e->getMessage()
             );
             $response->getBody()->write(json_encode($error));
             return $response;
         }
     }
 }