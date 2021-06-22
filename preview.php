<?php
session_start();

require "helper.php";

function getImageAndInfos()
{

}

function getParamImage()
{
    $sub_folders = getImgPicturesSubFolders();

    if (!empty($_SESSION)) {
        if ($_SESSION["status"] == "admin") {
            foreach ($sub_folders as $sub_folder) {
                $sub_folder_scan = scandir("./assets/img/" . $sub_folder);
                array_splice($sub_folder_scan, 0, 2);
                foreach ($sub_folder_scan as $sub_folder_image) {
                    $filename = pathinfo($sub_folder_image)["filename"];
                    if ($filename == $_GET["q"]) {
                        $img_url = "./assets/img/" . $sub_folder . "/" . $sub_folder_image;
                        $exif = exif_read_data($img_url);
                        var_dump($exif);
                        $exif_fileDateTime = date("Y-m-d H:i:s", $exif["FileDateTime"]);
                        $exif_fileSize_array = explode(".", strval($exif["FileSize"] / (1024 * 1024)));
                        $exif_fileSize = $exif_fileSize_array[0] . "," . substr($exif_fileSize_array[count($exif_fileSize_array) - 1], 0, 2);
                        $exif_mime = explode("/", $exif["MimeType"])[1];
                        $exif_width = $exif["COMPUTED"]["Width"];
                        $exif_height = $exif["COMPUTED"]["Height"];
                        echo <<<IMG
                        <img width="100%" src="$img_url">
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
                }
            }
        } else {

        }

        // $pictureFolder_scan = scandir("./assets/img/" . $_SESSION["id"] . "/");
        // array_splice($pictureFolder_scan, 0, 2);
    }
}

include "header.php";
?>
<div class="container-fluid">
    <div class="row picture-preview">
        <?=getParamImage()?>
    </div>
</div>
<?php
include "footer.php";
