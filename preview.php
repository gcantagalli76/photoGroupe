<?php
session_start();

require "helper.php";

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
                    $exif_fileDateTime = date("Y-m-d H:i:s", $exif["FileDateTime"]);
                    echo <<<IMG
                    <img width="100%" src="$img_url">
                    <caption>$exif_fileDateTime</caption>
                    IMG;
                }
            }
        }
    } else {

    }

    // $pictureFolder_scan = scandir("./assets/img/" . $_SESSION["id"] . "/");
    // array_splice($pictureFolder_scan, 0, 2);
}
