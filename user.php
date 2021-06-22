<?php
session_start();

if ((!empty($_POST) && isset($_POST["logout"]) && !empty($_SESSION)) || empty($_SESSION)) {
    session_destroy();
    header("Location: ./index.php");
    exit();
}
?>
<form action="./user.php" method="POST">
    <button type="submit" name="logout">Déconnexion</button>
</form>
