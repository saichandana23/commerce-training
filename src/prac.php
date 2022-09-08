<html>
<title>form</title>
<body>
<form method="get" action="/names">
    <input name="name">
    <button type="submit">submit</button>
    <?php var_dump($_GET(['name'])); ?>
</form>
</body>
</html>