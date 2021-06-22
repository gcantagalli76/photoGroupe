<?php

session_start();

require "helper.php";

function getUserImagesUrl()
{
    $json = file_get_contents("./assets/json/members.json");
    $myJson = json_decode($json)->members;

    $sub_folders = getImgPicturesSubFolders();

    // dans le cas de l'admin
    if ($_SESSION["status"] == "admin") {
        foreach ($sub_folders as $sub_folder) {
            $sub_folder_scan = scandir("./assets/img/" . $sub_folder);
            array_splice($sub_folder_scan, 0, 2);
            foreach ($sub_folder_scan as $sub_folder_image) {
                $src = "./assets/img/" . $sub_folder . "/" . $sub_folder_image . "";
                $filename = pathinfo($sub_folder_image)["filename"];
                echo <<<IMG
                <div class="col-sm-6 col-lg-4 mb-4">
                <div class="card">
                  <a href="./preview.php?q=$filename">
                    <img src='$src'class="card-img-top" width="100%" role="img" aria-label="Placeholder: Image cap" preserveAspectRatio="xMidYMid slice" focusable="false">
                  </a>
                </div>
              </div>
              IMG;
            }
        }

    } else { # dans le cas des membres
    foreach ($myJson->members as $member) {
        // if$_SESSION["id"] == $member->id) {
        //     if(in (_array($_SESSION["id"], $sub_folders)
        // }
    }
    }

}

// $json = file_get_contents("./assets/json/members.json");
// $myJson = json_decode($json);

// $scan = scandir("./assets/img/$_SESSION['id']");
// array_splice($scan, 0, 2);

// foreach ($scan as $img) {
//     echo "<img src='./assets/img/$img'>";
// }
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <link href="./assets/css/style.css" rel="stylesheet">
  <title>Document</title>
</head>

<body>

<div class="container-fluid">

<H1 class="text-center mt-3 mb-5">Bonjour <?=$_SESSION["firstname"]?>, bienvenue sur votre page</H1>

<div class="row" data-masonry='{"percentPosition": true }'>

  <?=getUserImagesUrl()?>

</div>

  <div class="row footer-size align-items-center">
  <div class="col-md-4 d-flex flex-column align-items-center">
        <div class="text-center">Accueil</div>
        <img src="./assets/img/house-door.svg" class="mt-3" alt="heart" width="25px">
      </div>
      <div class="col-md-4 d-flex flex-column align-items-center">
        <div class="text-center">Nouvel ajout</div>
        <img src="./assets/img/file-plus.svg" class="mt-3" alt="heart" width="25px">
      </div>
      <div class="col-md-4 d-flex flex-column align-items-center">
        <div class="text-center">Profil</div>
        <img src="./assets/img/person.svg" class="mt-3" alt="heart" width="25px">
      </div>


  </div>
  </div>


</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>




</html>
