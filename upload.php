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
    <div class="container-fluid">
        <div class="row ">
            <div class="col-sm-5 mt-5">
                <P id="bienvenue">Veuillez choisir une image</P>
                <form action="index.php" method="post" enctype="multipart/form-data">
                    <img id="imgPreview">
                    <input type="file" name="fileToUpload" id="fileToUpload" class="mt-3"><br>
                    <button type="submit" class="mt-3">Upload</button>
                    <div class="text-success mt-3"><?= $answerPositive ?? '' ?></div>
                    <div class="text-danger mt-3"><?= $answerNegative ?? '' ?></div>
                </form>
            </div>
        </div>

        <div class="row footer-size align-items-center fixed-bottom mt-5">
            <div class="col-md-4 d-flex flex-column align-items-center">
                <div class="text-center">Accueil</div>
                <a href="index.php"><img src="./assets/img/house-door.svg" class="mt-3" alt="heart" width="30px"
                        type="button"></a>
            </div>
            <div class="col-md-4 d-flex flex-column align-items-center">
                <div class="text-center">Nouvel ajout</div>
                <a href="upload.php"><img src="./assets/img/file-plus.svg" class="mt-3" alt="heart" width="30px"></a>
            </div>
            <div class="col-md-4 d-flex flex-column align-items-center">
                <div class="text-center">Profil</div>
                <a href="user.php"><img src="./assets/img/person.svg" class="mt-3" alt="heart" width="30px"></a>
            </div>
        </div>
    </div>




</body>

</html>