<?php

if (!empty($_POST) && isset($_POST["login"])) {
    $valid_mail = filter_var($_POST["mail"], FILTER_VALIDATE_EMAIL);
    $passwordsList = json_decode("./assets/json/members.json");
    if (!$passwordsList) {
        $valid_pass = isset($_POST["password"]);
    }

    if ($valid_mail && $valid_pass) {
        session_start(["mail" => $_POST["mail"], "password" => $_POST["password"]]);
        header("Location: ./gallery.php");
    }
}

?>
<!DOCTYPE html>
<html lang="en" class="home">
<head class="home">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link href="./assets/css/style.css" rel="stylesheet">
    <title>Document</title>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>

<div class="container-fluid text-center h-100 align-items-center">

<div class="row justify-content-center h-100 align-items-center">
      <div class="col-sm-3 bg-light border">
        <h1>Connectez-vous à votre compte</h1>

        <label class="form-label mt-4 d-flex justify-content-start" name>Adresse e-mail :</label>
        <input type="email" class="form-control box" name="mail">

        <label class="form-label mt-2 d-flex justify-content-start">Mot de passe :</label>
        <input type="password" class="form-control box" name="password">

        <button type="submit" class="btn text-white bg-primary mt-3">Se connecter</button>

        <div class="mt-4 mb-3">Pas encore membre ? Créez votre compte !</div>

      </div>
    </div>
    </div>




</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</html>
