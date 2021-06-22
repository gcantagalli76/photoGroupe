<?php
session_start();

if ((!empty($_POST) && isset($_POST["logout"]) && !empty($_SESSION)) || empty($_SESSION)) {
    session_destroy();
    header("Location: ./index.php");
    exit();
}

$lastname = $_SESSION["lastname"];
$firstname = $_SESSION["firstname"];
$mail = $_SESSION["mail"];
$status = $_SESSION["status"];
$formula = $_SESSION["formula"];


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    
<div class="container-fluid text-center">

<div class="row justify-content-center">
  <div class="col-sm-10 bg-light border">
    <h1 class="text-center">Bienvenue sur votre espace personnel</h1>
    <div class="d-flex justify-content-start">Vous trouverez ci-dessous toutes les données relatives à votre compte personnel :</div>

    <div class="row justify-content-around">
<div class="col-sm-3 bg-light">
<label class="form-label mt-2 d-flex justify-content-start"> Nom :</label>
<div class="bg-white"><?=$lastname?></div>
</div>

<div class="col-sm-3 bg-light">
<label class="form-label mt-2 d-flex justify-content-start"> Prénom :</label>
<div class="bg-white"><?=$firstname?></div>
</div>

<div class="col-sm-3 bg-light">
<label class="form-label mt-2 d-flex justify-content-start"> Adresse email :</label>
<div class="bg-white"><?=$mail?></div>
</div>
</div>


<div class="row justify-content-center">
<div class="col-sm-3 bg-light">
    <label class="form-label mt-2 d-flex justify-content-start"> Formule choisie :</label>
    <div class="bg-white"><?=$formula?></div>
</div>

<div class="col-sm-3 bg-light">
    <label class="form-label mt-2 d-flex justify-content-start"> Status attribué :</label>
    <div class="bg-white"><?=$status?></div>
</div>

</div>


    <div class="row justify-content-center">
        <div class="col-sm-3d-flex justify-content-center">
        <form action="./user.php" method="POST">
    <button type="submit" name="logout" class="btn text-white bg-primary mt-3 mb-3">Déconnexion</button>
    </form>
</div>
</div>



  </div>
</div>
</div>




</body>
</html>









