<?php

function getImgPicturesSubFolders()
{
    $img_folder = scandir("./assets/img/");
    $res = [];

    foreach ($img_folder as $folder) {
        if (preg_match("/^\d+$/", $folder)) {
            $res[] = $folder;
        }
    }

    return $res;
}

function redirectIfNotLogged() {
    if (empty($_SESSION)) {
        header("Location: ./index.php");
        exit();
    }
}
