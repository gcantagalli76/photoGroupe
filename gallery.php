<?php

$json = file_get_contents("./assets/json/members.json");
$myJson = json_decode($json);





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

<H1 class="text-center mt-3 mb-5">Bonjour , bienvenue sur votre page</H1>

<div class="row" data-masonry='{"percentPosition": true }'>
    
    <div class="col-sm-6 col-lg-4 mb-4">
    <div class="card">
        <img src="https://geo.img.pmdstatic.net/fit/https.3A.2F.2Fi.2Epmdstatic.2Enet.2Fgeo.2F2021.2F03.2F15.2Fb7e513c6-4445-4cd9-876c-ec012b5b0936.2Ejpeg/1200x630/cr/wqkgR2V0dHkgSW1hZ2VzIC8gR0VP/mouette-et-goeland-comment-les-differencier.jpg" class="card-img-top" width="100%" role="img" aria-label="Placeholder: Image cap" preserveAspectRatio="xMidYMid slice" focusable="false">
      </div>
    </div>

    <div class="col-sm-6 col-lg-4 mb-4">
    <div class="card">
        <img src="https://www.jardindesplantesdeparis.fr/sites/jardindesplantes.fr/files/styles/1600x576/public/thumbnails/image/seagullbansin2_web.jpg?itok=bs8XflwM&c=5513a6098ad1ebf711bf7968cbf585fd" class="card-img-top" width="100%" role="img" aria-label="Placeholder: Image cap" preserveAspectRatio="xMidYMid slice" focusable="false">
      </div>
    </div>

    <div class="col-sm-6 col-lg-4 mb-4">
    <div class="card">
        <img src="https://geo.img.pmdstatic.net/fit/https.3A.2F.2Fi.2Epmdstatic.2Enet.2Fgeo.2F2021.2F03.2F15.2Fb7e513c6-4445-4cd9-876c-ec012b5b0936.2Ejpeg/1200x630/cr/wqkgR2V0dHkgSW1hZ2VzIC8gR0VP/mouette-et-goeland-comment-les-differencier.jpg" class="card-img-top" width="100%" role="img" aria-label="Placeholder: Image cap" preserveAspectRatio="xMidYMid slice" focusable="false">
      </div>
    </div>

    <div class="col-sm-6 col-lg-4 mb-4">
    <div class="card">
        <img src="https://i.pinimg.com/originals/ac/45/b6/ac45b6a2d638406c2a7dbb2af4c29881.jpg" class="card-img-top" width="100%" role="img" aria-label="Placeholder: Image cap" preserveAspectRatio="xMidYMid slice" focusable="false">
      </div>
    </div>

    <div class="col-sm-6 col-lg-4 mb-4">
    <div class="card">
        <img src="https://geo.img.pmdstatic.net/fit/https.3A.2F.2Fprd-cam-website-statics.2Es3.2Eeu-west-1.2Eamazonaws.2Ecom.2Fcontent.2Fuploads.2F2019.2F07.2Fseagull-4143142640.2Ejpg/750x422/quality/80/background-color/ffffff/background-alpha/100/focus-point/320%2C213/crop-zone/0%2C0-640x426/seagull-4143142-640.jpg" class="card-img-top" width="100%" role="img" aria-label="Placeholder: Image cap" preserveAspectRatio="xMidYMid slice" focusable="false">
      </div>
    </div>
  </div>
  

  <form action="index.php" method="post" enctype="multipart/form-data">
                <img id="imgPreview">
                <input type="file" name="fileToUpload" id="fileToUpload" class= "mt-3"><br>
                <button type="submit" class="mt-3">Upload</button>
            </form>



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