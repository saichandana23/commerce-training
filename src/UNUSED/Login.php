<?php
?>
<html>

<head>

    <title>LOGIN</title>

    <link rel="stylesheet" type="text/css" href="style.css">

</head>

<body>

<form action="../view/customers.php" method="get">

    <h2>LOGIN</h2>

    <?php if (isset($_GET['error'])) { ?>

        <p class="error"><?php echo $_GET['error']; ?></p>

    <?php } ?>

    <label>User Name</label>

    <input type="text" name="uname" placeholder="User Name"><br>

    <label>Password</label>

    <input type="password" name="password" placeholder="Password"><br>

    <button type="submit">Login</button>

</form>

</body>

</html>
