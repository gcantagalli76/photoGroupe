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
<div class="container-fluid mt-5">
    <div class="row justify-content-center">
        <div class="col-sm-10 backUser border userBox">
            <h1 class="text-center figcaption text-white">Bienvenue sur votre espace personnel <?=$firstname?></h1>
            <div class="text-center figcaption2 text-white">Vous trouverez ci-dessous les données relatives à votre compte personnel</div>
            <div class="row justify-content-around police mt-4">
                <div class="col-sm-3 backUser">
                    <label class="form-label mt-2 d-flex justify-content-start fw-bold text-white"> Nom :</label>
                    <div class="bg-white"><?=$lastname?></div>
                </div>
                <div class="col-sm-3 backUser">
                    <label class="form-label mt-2 d-flex justify-content-start fw-bold text-white"> Prénom :</label>
                    <div class="bg-white"><?=$firstname?></div>
                </div>
                <div class="col-sm-3 backUser">
                    <label class="form-label mt-2 d-flex justify-content-start fw-bold text-white"> Adresse email :</label>
                    <div class="bg-white text-break"><?=$mail?></div>
                </div>
            </div>
            <div class="row justify-content-center mt-3 police mb-3">
                <div class="col-sm-3 backUser">
                    <label class="form-label mt-2 d-flex justify-content-start fw-bold text-white"> Formule choisie :</label>
                    <div class="bg-white"><?=$formula?></div>
                </div>
                <div class="col-sm-3 backUser">
                    <label class="form-label mt-2 d-flex justify-content-start fw-bold text-white"> Status attribué :</label>
                    <div class="bg-white"><?=$status?></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center text-center">
        <div class="col-sm-3d-flex justify-content-center">
        <form action="./user.php" method="POST">
            <button type="submit" name="logout" class="btn text-white bg-secondary mt-3 mb-3 policeButton">Déconnexion</button>
        </form>
    </div>
    </div>
    </div>
<?php
require "./navbar.php";
require "./footer.php";
?>









