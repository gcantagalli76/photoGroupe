<?php
session_start();

if (empty($_SESSION)) {
    header("Location: ./index.php");
    exit();
}

require "helper.php";

redirectIfNotLogged();
$document_title = "Preview";

function getImageAndInfos($img_url)
{
    $exif = exif_read_data($img_url);
    $exif_fileDateTime = date("Y-m-d H:i:s", $exif["FileDateTime"]);
    $exif_fileSize_array = explode(".", strval($exif["FileSize"] / (1024 * 1024)));
    $exif_fileSize = $exif_fileSize_array[0] . "," . substr($exif_fileSize_array[count($exif_fileSize_array) - 1], 0, 2);
    $exif_mime = explode("/", $exif["MimeType"])[1];
    $exif_width = $exif["COMPUTED"]["Width"];
    $exif_height = $exif["COMPUTED"]["Height"];
    echo <<<IMG
    <img src="$img_url">
    <div class="col-3">
        <h1>Date d'upload</h1>
        <caption>$exif_fileDateTime</caption>
        </div>
    <div class="col-3">
        <h1>Taille de l'image</h1>
        <caption>$exif_width x $exif_height</caption>
    </div>
    <div class="col-3">
        <h1>Poids de l'image</h1>
        <caption>$exif_fileSize Mo</caption>
        </div>
        <div class="col-3">
        <h1>Type d'image</h1>
        <caption>$exif_mime</caption>
    </div>
    IMG;
}

function getParamImage()
{
    $sub_folders = getImgPicturesSubFolders();

    $fileFound = false;

    if (!empty($_SESSION)) {
        if ($_SESSION["status"] == "admin") {
            foreach ($sub_folders as $sub_folder) {
                $sub_folder_scan = scandir("./assets/img/" . $sub_folder);
                array_splice($sub_folder_scan, 0, 2);
                foreach ($sub_folder_scan as $sub_folder_image) {
                    $filename = pathinfo($sub_folder_image)["filename"];
                    if ($filename == $_GET["q"]) {
                        $img_url = "./assets/img/" . $sub_folder . "/" . $sub_folder_image;
                        $fileFound = true;
                        getImageAndInfos($img_url);
                    }
                }
            }
        } else {
            $sub_folder_scan = scandir("./assets/img/" . $_SESSION["id"]);
            array_splice($sub_folder_scan, 0, 2);
            foreach ($sub_folder_scan as $sub_folder_image) {
                if (pathinfo($sub_folder_image)["filename"] == $_GET["q"]) {
                    $fileFound = true;
                    getImageAndInfos("./assets/img/" . $_SESSION["id"] . "/" . $sub_folder_image);
                }
            }
        }
    }

    if (!$fileFound) {
        echo "<div class='pt-4 text-center'>Fichier introuvable merci de recommencer avec une autre adresse.</div>";
    }

}

include "header.php";
?>
<div class="container-fluid gallery-preview">
    <div class="row picture-preview mx-auto">
        <a href="./gallery.php">Retour vers la galerie</a>
        <?=getParamImage()?>
    </div>
</div>
<?php
include "navbar.php";
include "footer.php";
