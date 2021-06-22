<?php

session_start();

var_dump($_POST);

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
        $answerPositive = "Votre fichier $concatName est bien uploader";
    } elseif ($size + $histoSize > $maxSize) {
        $answerNegative = "Désolé vous avez dépassé la taille maximale autorisée de " . $limitSize;
    } elseif ($error == 4) {
        $answerNegative = "Veuillez sélectionner un fichier";
    } elseif (!in_array($extension, $extensions)) {
        $answerNegative = "Votre fichier nest pas une image";
    }
}
;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>Formulaire image</title>

</head>
<body>


<div class="container fluid ">
<div class="row ">
<div class="col-sm-12 bg-secondary">
<h1>Module d'enregistrement d'images</h1>
<p>Mise en pratique PHP : Upload d'images.</p>
</div>
</div>

<div class="row preview">
    <div class="col-sm-5 mt-5">
        <P id="bienvenue">Veuillez  choisir une image</P>
            <form action="upload.php" method="post" enctype="multipart/form-data">
                <img width="100%" id="imgPreview">
                <input type="file" name="fileToUpload" id="fileToUpload" class= "mt-3"><br>
                <button type="submit" class="mt-3">Upload</button>
                <div class= "text-success mt-3"><?=$answerPositive ?? ''?></div>
                <div class= "text-danger mt-3"><?=$answerNegative ?? ''?></div>
            </form>
    </div>
    <div class="col-sm-9">
        <img src="" class="">
    </div>
    </div>
    </div>

    <?php include "navbar.php"?>

<script src="./assets/js/uploadPreview.js"></script>

</body>
</html>