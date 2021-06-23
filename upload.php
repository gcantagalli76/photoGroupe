<?php

session_start();

require "helper.php";
redirectIfNotLogged();
$document_title = "Formulaire image";

if (isset($_FILES['fileToUpload'])) {

    $tmpName = $_FILES['fileToUpload']['tmp_name'];
    $name = $_FILES['fileToUpload']['name'];
    $size = $_FILES['fileToUpload']['size'];
    $histoSize = $_SESSION["size"];
    $error = $_FILES['fileToUpload']['error'];
    $tabExtension = explode('.', $name); // .JPG .Jpg
    $extension = strtolower(end($tabExtension)); //jpg gif
    $extensions = ['jpg', 'png', 'jpeg', 'gif'];
    $uniqueName = uniqid('', true); // 5945499515195
    $concatName = $uniqueName . '.' . $extension; // 654951965159.jpg

    if ($_SESSION["formula"] == "mouette") {
        $maxSize = 5000000;
        $limitSize = "5Mo";
    } elseif ($_SESSION["formula"] == "goeland") {
        $maxSize = 10000000;
        $limitSize = "10Mo";
    } elseif ($_SESSION["formula"] == "albatros") {
        $maxSize = 20000000;
        $limitSize = "20Mo";
    } elseif ($_SESSION["formula"] == "all") {
        $maxSize = 20000000000;
        $limitSize = "illimitée";
    }

    if (in_array($extension, $extensions) && $size + $histoSize <= $maxSize) {
        $_SESSION['size'] += $size;
        move_uploaded_file($tmpName, './assets/img/' . $_SESSION["id"] . '/' . $concatName);
        $answerPositive = "Votre fichier $concatName est bien uploadé";
    } elseif ($size + $histoSize > $maxSize) {
        $answerNegative = "Désolé vous avez dépassé la taille maximale autorisée de " . $limitSize;
    } elseif ($error == 4) {
        $answerNegative = "Veuillez sélectionner un fichier";
    } elseif (!in_array($extension, $extensions)) {
        $answerNegative = "Votre fichier nest pas une image";
    }
}

if ($_SESSION["formula"] == "mouette") {
    $maxSize = 5000000;
    $limitSize = "5Mo";
} elseif ($_SESSION["formula"] == "goeland") {
    $maxSize = 10000000;
    $limitSize = "10Mo";
} elseif ($_SESSION["formula"] == "albatros") {
    $maxSize = 20000000;
    $limitSize = "20Mo";
} elseif ($_SESSION["formula"] == "all") {
    $maxSize = 20000000000;
    $limitSize = "illimitée";
}

$sizeRest = round($maxSize/(1024*1024),2) - round($_SESSION["size"]/(1024*1024),2);

require "header.php";
?>
    <div class="container-fluid upload">
        <div class="row">
            <a href="./gallery.php">Retour vers la galerie</a>
            <div class="col-sm-12">
                <h1 class="figcaption text-center">Page d'upload des nouvelles images</h1>
                <p class="police">Il vous reste actuellement <?=$sizeRest?> Mo d'espace libre sur vos <?=round($maxSize/(1024*1024))?> Mo</p>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-6 police">
                <P id="bienvenue">Veuillez  choisir une image</P>
                <form action="upload.php" method="post" enctype="multipart/form-data">
                    <input type="file" name="fileToUpload" id="fileToUpload" class= "mt-3"><br>
                    <button type="submit" class="mt-3">Upload</button>
                    <div class= "text-success mt-3"><?=$answerPositive ?? ''?></div>
                    <div class= "text-danger mt-3"><?=$answerNegative ?? ''?></div>
                </form>
            </div>
            <div class="col-6">
                <img class="mx-auto d-block" width="70%" id="imgPreview">
            </div>
        </div>
    </div>
    <?php include "navbar.php"?>
    <script src="./assets/js/uploadPreview.js"></script>
<?php require "footer.php"?>