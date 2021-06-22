<?php
session_start();

// $scan = scandir("./assets/img");
// array_splice($scan, 0, 2);
// foreach ($scan as $img) {
//     echo "<img src='./assets/img/$img'>";
// }

// die;

if (!empty($_SESSION)) {
    header("Location: ./gallery.php");
    exit();
}

$session = [];

$connection_msg = "";
$connection_error = "Une erreur est survenue, merci de réessayer ultérieurement.";
$connection_noMatch = "Adresse e-mail ou mot de passe incorrect.";

// faut un post et que ce soit un post de login
if (!empty($_POST) && isset($_POST["login"])) {
    $members_json = file_get_contents("./assets/json/members.json");
    $allMembers = json_decode($members_json);

    if (!$members_json || !$allMembers) { # s'il n'y a aucune erreur avec le JSON
    $connection_msg = $connection_error;
    } elseif (empty($_POST["password"]) || empty($_POST["mail"])) { # si le post de password n'existe pas
    $connection_msg = $connection_noMatch;
    } else { # si au moins le mail est valide
    $match = false;
        // members
        foreach ($allMembers->members as $member) {
            if (password_verify($_POST["password"], $member->password) && $_POST["mail"] == $member->mail) {
                $match = true;
                session_start();
                $_SESSION["mail"] = $member->mail;
                $_SESSION["lastname"] = $member->lastname;
                $_SESSION["firstname"] = $member->firstname;
                $_SESSION["id"] = $member->id;
                $_SESSION["status"] = $member->status;
                $_SESSION["formula"] = $member->formula;
                header("Location: ./gallery.php");
                break;
            }
        }

        if (!$match) {
            $connection_msg = $connection_noMatch;
        }

    }
}

include "header.php";
?>
<style>
  html,
  body {
    height: 100%;
  }
</style>
<div class="container-fluid text-center h-100 align-items-center home">

<div class="row justify-content-center h-100 align-items-center">
      <div class="col-sm-3 bg-light border">
        <h1>Connectez-vous à votre compte</h1>
        <form action="./" method="POST">
          <label class="form-label mt-4 d-flex justify-content-start" name>Adresse e-mail :</label>
          <input type="email" class="form-control box" name="mail">

          <label class="form-label mt-2 d-flex justify-content-start">Mot de passe :</label>
          <input type="password" class="form-control box" name="password">

          <button type="submit" name="login" class="btn text-white bg-primary mt-3">Se connecter</button>
        </form>
        <div class="alert alert-danger mt-4 mb-3"><?=$connection_msg?></div>

      </div>
    </div>
    </div>




</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>



</html>
