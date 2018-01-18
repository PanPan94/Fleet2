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
    <link rel="stylesheet" href="css/profil.css">
</head>
<body>
    <!-- NAVBAR -->
    <header class="header">
      <div class="nav">
        <div class="nav-items"><a href="main.php?id=<?php echo $_SESSION['id']; ?>">Accueil</a></div>
        <div class="nav-items"><a href="php/deconnexion.php">Déconnexion</a></div>
      </div>
    </header>
    <!-- HEADER -->
    <div class="brand">
      <div class="container">
        <div class="profile-name">
          <h2><span class="fname"><?php echo $userinfo['prenom']."</span>"; ?><?php echo $userinfo['nom']; ?></h2>
        </div>
      </div>
    </div>
    <div class="avatar-container">
      <?php if(!empty($userinfo['avatar'])){ ?>
        <img class="avatar-image" src="membres/avatars/<?php echo $userinfo['avatar']; ?>" width="150px" />
      <?php
        }
      ?>
    </div>
    <div class="profil-global">
    <div>
      <?php if(isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id']){ ?>
        <a class="mdp-change" href="php/editionprofil.php">Editer votre profil </a>
      <?php
    }
    ?>
    </div>
      <div class="description-container">
        <div>
        <h5>Qui suis je?</h5>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      </div>
      </div>
      <div class="projet-container">
          <div><h5>Projets proposés</h5></div>
          <div>
            <div class="projet">
            </div>
            <div class="projet">
            </div>
            <div class="projet">
            </div>
          </div>
      </div>
      <div class="projet-container">
          <h5>Interêts</h5>
          <div class="interets">
          </div>
          <div class="interets">
          </div>
          <div class="interets">
          </div>
      </div>
      <div class="projet-container">
          <div><h5>Intervenu sur le projet</h5></div>
          <div>
            <div class="projet">
            </div>
            <div class="projet">
            </div>
            <div class="projet">
            </div>
          </div>
      </div>
    </div>
    <!-- SCRIPTS -->
    <script src="js/app.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
</body>
</html>
