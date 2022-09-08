<html>
<head>
    <title>Basic Application</title>
    <style>
        header{
            text-align: center;
            padding: 2em;
            background-color: dimgrey;
        }
    </style>
</head>
<body>
<header>
    <ul>
    <?php include "app.php"; ?>
      <?php foreach ($person as $feature=>$val): ?>
<!--          echo "<li>".$feature."</li>"; ?>-->
        <?php endforeach;?>
    </ul>
</header>
</body>
</html>