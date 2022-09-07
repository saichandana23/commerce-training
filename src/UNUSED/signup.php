<?php

//require '../model/customers.php';
//if isset($_POST["submit"]){
//
//}
?>
<!DOCTYPE html>

<html>


<h2>Signup Form</h2>

<form action="../view/customers.php" method="POST">

    <fieldset>

        <legend>Personal information:</legend>

        Name:<br>

        <input type="text" name="name">

        <br>

        Ph No:<br>

        <input type="text" name="phno">

        <br>

        Email:<br>

        <input type="email" name="email">

        <br>

        Username:<br>

        <input type="text" name="username">

        <br>

        Password:<br>


        <input type="password" name="password">

        <br>

        <br>

        <input type="submit" name="submit" value="submit">

    </fieldset>

</form>
    <br>
<text>ALREADY A USER </text>
<a href="Login.php">CLICK HERE</a>

</body>

</html>

