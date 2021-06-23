<?php

session_start();

require "helper.php";

redirectIfNotLogged();
$document_title = "Galerie";

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
            $session_size = 0;
            foreach ($sub_folder_scan as $sub_folder_image) {
                $src = "./assets/img/" . $sub_folder . "/" . $sub_folder_image . "";
                $filename = pathinfo($sub_folder_image)["filename"];
                $session_size += filesize($src);
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
        $_SESSION["size"] = $session_size;

    } else { # dans le cas des membres
    $sub_folder = $_SESSION['id'];
        $sub_folder_scan = scandir("./assets/img/" . $sub_folder);
        array_splice($sub_folder_scan, 0, 2);
        $session_size = 0;
        foreach ($sub_folder_scan as $sub_folder_image) {
            $src = "./assets/img/" . $_SESSION['id'] . "/" . $sub_folder_image . "";
            $filename = pathinfo($sub_folder_image)["filename"];
            $session_size += filesize($src);
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
        $_SESSION["size"] = $session_size;
    }
}

require "header.php";
?>
<div class="container-fluid gallery">
  <H1 class="text-center mt-3 mb-2 figcaption">Bonjour <?=$_SESSION["firstname"]?> !</H1>
  <H2 class="text-center mt-1 mb-5 figcaption2">bienvenue sur votre page personnelle</H2>
  <div class="row gallery-content" data-masonry='{"percentPosition": true }'>
    <?=getUserImagesUrl()?>
  </div>
</div>
<?php include "navbar.php"?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>
<?php require "footer.php"?>