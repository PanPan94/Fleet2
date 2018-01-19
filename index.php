<?php
  $bdd = new PDO('mysql:host=127.0.0.1;dbname=bdfleet', 'root', '');
  include_once("php/inscription.php");
  include_once("php/connexion.php");
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600,700" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/angelique.css">
</head>
<body>
    <!-- NAVBAR -->
        <header class="header">
            <div class="nav">
                <div class="nav-items"><a href="#" data-toggle="modal" data-target="#modal-inscription">Inscription</a></div>
                <div class="nav-items"><a href="#" data-toggle="modal" data-target="#modal-connexion">Connexion</a></div>
            </div>
        </header>
    <!-- SEARCHBAR -->
        <div class="main-caption">
            <div class="form-field">
                <div class="field-caption">
                    <h3>Fleet</h3>
                    <h2>Vos idées aux yeux du monde entier.</h2>
                </div>
                <div class="field">
                	<form >
                    <input  id="search" type="text" class="field-input" placeholder="Rechercher un projet" name="input">
                    <input type="hidden" value="Chercher" class="field-search">
                </div>
              </form>
            </div>
        </div>
    <!-- LATEST POSTS -->
    <div class="h--posts" >
        <div class="h--posts-item projet">
            <a class="h--post-link" href="#"></a>
            <div class="h--post-item-img">
                <img src="img/projets/wylido.jpg" alt="project_image">
            </div>
            <div class="h--post-desc">
                <h2 class="titre">Wylido</h2>
                <p>Site de rencontre pour chiens</p>
                <span class="h--post-subdesc">
                     Besoin d'un développeur d'application.
                </span>
            </div>
        </div>

        <div class="h--posts-item projet" id="projet-2">
            <a class="h--post-link" href="#"></a>
            <div class="h--post-item-img">
              <img src="img/projets/bhind.jpg" alt="project_image">
            </div>
            <div class="h--post-desc">
                <h2 class="titre">Bhind</h2>
                <p>Site pour visiter les banlieues</p>
            </div>
        </div>

        <div class="h--posts-item projet" id"projet-3">
            <div class="h--post-item-img">
              <img src="img/projets/fictio.jpg" alt="project_image">
            </div>
            <div class="h--post-desc">
                <h2 class="titre">Fictio</h2>
                <p>Jeu sur mobile</p>
            </div>
        </div>
    </div>

    <!-- MODAL CONNEXION-->
    <div class="modal fade" id="modal-connexion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Connexion</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form action="" method="POST">
                    <table cellpadding="5px">
                        <tr>
                            <td class="label"><label><b>Email</b></label></td>
                            <td><input type="email" name="mailconnect" required></td>
                        </tr>
                        <tr>
                            <td><label><b>Mot de pass</b></label></td>
                            <td><input type="password" name="mdpconnect" required></td>
                        </tr>
                    </table>
                    <input class="btn-connexion" type="submit" value="Je me connecte" name="formconnexion" >
                </form>
                <?php
                if (isset($erreurs)){
                  echo '<font color="red">'.$erreurs."</font>";
                }
                ?>
                </div>
                </div>
            </div>
        </div>
         <!-- MODAL INSCRIPTION -->
    <div class="modal fade" id="modal-inscription" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Inscription</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                  <form action="" method="POST">
                    <table cellpadding="5px">
                      <tr>
                        <td class="label">
                          <label for="prenom">Prénom </label>
                        </td>
                        <td>
                          <input required type="text" placeholder="Prénom"  id="prenom"  name="prenom" value="<?php if(isset($prenom)) {echo $prenom;}?>" >
                        </td>
                      </tr>
                      <tr>
                        <td class="label">
                          <label for="nom">Nom </label>
                        </td>
                        <td>
                          <input required type="text" placeholder="Nom" id="nom" name="nom" value="<?php if(isset($nom)) {echo $nom;}?>">
                        </td>
                      </tr>
                      <tr>
                        <td class="label">
                          <label for="mail">Mail </label>
                        </td>
                        <td>
                          <input required type="email" placeholder="@" id="mail" name="mail" value="<?php if(isset($mail)) {echo $mail;}?>">
                        </td>
                      </tr>
                      <tr>
                        <td></td>
                        <td>
                          <input required type="email" placeholder="Confirmer email" id="mail2"  name="mail2" value="<?php if(isset($mail2)) {echo $mail2;}?>">
                        </td>
                      </tr>
                      <tr>
                        <td class="label">
                          <label for="mdp"> Mot de passe </label>
                        </td>
                        <td>
                          <input required type="password" placeholder="Mot de passe" id="mdp" name="mdp">
                        </td>
                      </tr>
                      <tr>
                        <td></td>
                        <td>
                          <input required type="password" placeholder="Confirmer MDP" id="mdp2" name="mdp2">
                        </td>
                      </tr>
                    </table>
                    <input class="btn-connexion" type="submit" value="Je m'inscris" name="forminsciption">
               	</form>
                <?php
                if (isset($erreur)){
                  echo '<font color="red">'.$erreur."</font>";
                }
                ?>
            	</div>
            </div>
        </div>
    </div>
    <!-- SCRIPTS -->

    <script src="js/app.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js"  crossorigin="anonymous"></script>
    <script>
        var list = new Array();

        $("#search").on("keyup", function (e) {
            var letter = ($(this).val().toLowerCase());

            $('.projet').each(function () {
                var projet = $(this).find(".titre").text().replace(/ /g, '').replace(/\n/g, '').toLowerCase();
            console.log(projet);
                if (projet.indexOf(letter) != -1) {
                  $(this).show();
                } else {
                    //hide
                    var select=$(this);
                    select.fadeOut("slow", "swing");
                }
            })
        });
    </script>

</body>
</html>
