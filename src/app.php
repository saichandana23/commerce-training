<html>
<?php


try{
    $pdo= new PDO('mysql:host=localhost;dbname=abcde','chandu','Chandu@23');
}catch(PDOException $e){
    die("sry");
}
//$pdo= new PDO('mysql:host=localhost;dbname=abcde','chandu','Chandu@23');
$stmt=$pdo->prepare('select * from faculty');
$stmt->execute();
?>
<!--<pre>-->
<!--    --><?php //var_dump($stmt->fetchAll(PDO::FETCH_OBJ)); ?>
<!--</pre>-->
<?php $res=($stmt->fetchAll(PDO::FETCH_OBJ)); ?>
<?php var_dump($res[0]->fname)?>;

</html>

