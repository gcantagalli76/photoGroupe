<?php
session_start();

$document_title = "User";

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

require "header.php";
?>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-sm-10 bg-light border">
            <h1 class="text-center">Bienvenue sur votre espace personnel</h1>
            <div class="d-flex justify-content-start">Vous trouverez ci-dessous toutes les données relatives à votre compte personnel :</div>
            <div class="row justify-content-around">
                <div class="col-sm-3 bg-light">
                    <label class="form-label mt-2 d-flex justify-content-start fw-bold"> Nom :</label>
                    <div class="bg-white"><?=$lastname?></div>
                </div>
                <div class="col-sm-3 bg-light">
                    <label class="form-label mt-2 d-flex justify-content-start fw-bold"> Prénom :</label>
                    <div class="bg-white"><?=$firstname?></div>
                </div>
                <div class="col-sm-3 bg-light">
                    <label class="form-label mt-2 d-flex justify-content-start fw-bold"> Adresse email :</label>
                    <div class="bg-white text-break"><?=$mail?></div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-sm-3 bg-light">
                    <label class="form-label mt-2 d-flex justify-content-start fw-bold"> Formule choisie :</label>
                    <div class="bg-white"><?=$formula?></div>
                </div>
                <div class="col-sm-3 bg-light">
                    <label class="form-label mt-2 d-flex justify-content-start fw-bold"> Status attribué :</label>
                    <div class="bg-white"><?=$status?></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center text-center">
        <div class="col-sm-3d-flex justify-content-center">
        <form action="./user.php" method="POST">
            <button type="submit" name="logout" class="btn text-white bg-secondary mt-3 mb-3">Déconnexion</button>
        </form>
    </div>
<?php
require "./navbar.php";
require "./footer.php";
?>









