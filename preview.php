<?php
session_start();

require "helper.php";

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
                        $exif_fileSize = $exif["FileSize"] / (1024 * 1024);
                        echo <<<IMG
                        <img width="100%" src="$img_url">
                        <div col-6>
                            <caption>Date d'upload: $exif_fileDateTime</caption>
                        </div>
                        <div col-6>
                            <caption>Poids de l'image: $exif_fileSize Mo</caption>
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

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?=getParamImage()?>
</body>
</html>