<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
include_once("php/authorise.php");
include_once("php/bd.php");
include_once("php/userinfo.php");

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
      <div class="global" id="global">
        <div class="menu-toggler" id="menu-toggler"></div>
    <!-- SIDEBAR -->
        <div class="menu" id="menu">
            <div class="menu-header">
                <div class="profile-pic">
                  <?php if(!empty($userinfo['avatar'])){ ?>
                    <img src="membres/avatars/<?php echo $userinfo['avatar']; ?>" width="150px" />
                    <?php
                    }
                    ?>
                </div>
                <div class="profile-name">
                    <h2><?php echo $userinfo['prenom']; ?><span class="fname"><?php echo $userinfo['nom']; ?></span></h2>
                </div>
            </div>

            <div class="menu-items">

                <div class="menu-item">
                    <i class="menu-item-logo-profile"></i> <a href="profil.php?id=<?php echo $_SESSION['id']; ?>">Voir mon profil</a>
                </div>
                <!-- <div class="menu-item">
                    <i class="menu-item-logo-help"></i> <a href="#">Voir mon profil</a>
                </div> -->
            </div>

            <div class="menu-btns">
                <div id="web" class="menu-btn"><a  href="#">Web</a></div>
                <div id="opinion" class="menu-btn"><a href="#">Opinions</a></div>
                <div id="startup" class="menu-btn"><a href="#">Start-ups</a></div>
                <div id="lifestyle" class="menu-btn"><a href="#">LifeStyle</a></div>
                <div id="all" class="menu-btn"><a href="#">All</a></div>
            </div>
        </div>
    <!-- NAVBAR -->
        <header class="header">
            <div class="nav">
                <div class="nav-items"><a href="php/deconnexion.php">Déconnexion</a></div>
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
                	<form>
                    <input id="search" type="text" class="field-input" placeholder="Rechercher un projet" name="input">
                    <input type="hidden" value="Chercher" class="field-search">
                </div>
              </form>
            </div>
        </div>
        <div class="menu-btns">
            <div class="proposition"><a href="redaction.php?id=<?php echo $_SESSION['id']; ?>">Poster mon projet</a></div>
        </div>
    <!-- LATEST POSTS -->
        <div class="h--posts" >
            <div class="h--posts-item projet_lifestyle projet">
                <a class="h--post-link" href="projets/projetdemo.php?id=<?php echo $_SESSION['id']; ?>"></a>
                <div class="h--post-item-img">
                    <img src="img/projets/wylido.jpg" alt="project_image">
                </div>
                <div class="h--post-desc">
                    <h2 class="titre">Wylido</h2>
                    <p>Site de rencontre pour chiens</p>
                    <span class="h--post-subdesc">
                         Decouvrez et apportez vos idées.
                    </span>
                </div>
            </div>
            <div class="h--posts-item projet_opinion projet">
                <a class="h--post-link" href="projets/projet.php?id=<?php echo $_SESSION['id']; ?>"></a>
                <div class="h--post-item-img">
                  <img src="img/projets/fleet.jpg" alt="project_image">
                </div>
                <div class="h--post-desc">
                    <h2 class="titre">Fleet</h2>
                    <p>Site d'entraide et de développement de projets</p>
                    <span class="h--post-subdesc">
                       Besoin de conseils pour notre site.
                    </span>
                </div>
            </div>

            <div class="h--posts-item projet">
                            <a class="h--post-link" href="projets/projetdemo.php?id=<?php echo $_SESSION['id']; ?>"></a>
                <div class="h--post-item-img">
                  <img src="img/projets/fictio.jpg" alt="project_image">
                </div>
                <div class="h--post-desc">
                    <h2 class="titre">Fictio</h2>
                    <p>Application mobile</p>
                </div>
            </div>
        </div>
        <div class="h--posts">
          <div class="h--posts-item projet_web projet">
              <a class="h--post-link" href="projets/projetdemo.php?id=<?php echo $_SESSION['id']; ?>"></a>
              <div class="h--post-item-img">
                <img src="img/projets/bhind.jpg" alt="project_image">
              </div>
              <div class="h--post-desc">
                  <h2 class="titre">Bhind</h2>
                  <p>Site pour visiter les banlieues</p>
              </div>
          </div>

            <div class="h--posts-item projet_opinion projet">
                <a class="h--post-link" href="projets/projetdemo.php?id=<?php echo $_SESSION['id']; ?>"></a>
                <div class="h--post-item-img">
                  <img src="img/projets/investigames.jpg" alt="project_image">
                </div>
                <div class="h--post-desc">
                    <h2 class="titre">Investigames</h2>
                    <p>Jeu d'enquête</p>
                    <span class="h--post-subdesc">
                      Cherche des idées d'enquetes.
                    </span>
                </div>
            </div>

            <div class="h--posts-item projet_startup projet">
                            <a class="h--post-link" href="projets/projetdemo.php?id=<?php echo $_SESSION['id']; ?>"></a>
                <div class="h--post-item-img">
                  <img src="img/projets/7art.jpg" alt="project_image">
                </div>
                <div class="h--post-desc">
                    <h2 class="titre">7art</h2>
                    <p>Les secrets du cinéma</p>
                    <span class="h--post-subdesc">
                        Besoin de professionnels du cinéma.
                    </span>
                </div>
            </div>
        </div>
    <!-- SCRIPTS -->
    <script src="js/app.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
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
    <script>
              $("#web").on("click", function (e){
                $(".h--posts-item").hide();
                $(".projet_web").show();
              })
              $("#all").on("click", function (e){
                $(".h--posts-item").show();
              })
              $("#opinion").on("click", function (e){
                $(".h--posts-item").hide();
                $(".projet_opinion").show();
              })
              $("#startup").on("click", function (e){
                $(".h--posts-item").hide();
                $(".projet_startup").show();
              })
              $("#lifestyle").on("click", function (e){
                $(".h--posts-item").hide();
                $(".projet_lifestyle").show();
              })
    </script>
</body>
</html>
