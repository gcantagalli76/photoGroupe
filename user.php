<?php
session_start();

if (!empty($_POST) && isset($_POST["logout"]) && !empty($_SESSION)) {
    session_destroy();
    header("Location: ./index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    



<form action="./user.php" method="POST">
    <button type="submit" name="logout">Déconnexion</button>
</form>

</body>
</html>









