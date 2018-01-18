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
                    <i class="menu-item-logo-fav"></i> <a href="#">Voir mon profil</a>
                </div>
                <div class="menu-item">
                    <i class="menu-item-logo-help"></i> <a href="#">Voir mon profil</a>
                </div> -->
            </div>

            <div class="menu-btns">
                <div class="menu-btn"><a href="#">Web</a></div>
                <div class="menu-btn"><a href="#">Opinions</a></div>
                <div class="menu-btn"><a href="#">Start-ups</a></div>
                <div class="menu-btn"><a href="#">LifeStyle</a></div>
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
                	<form >
                    <input type="text" class="field-input" placeholder="Explorer les projets" name="input">
                    <input type="submit" value="Chercher" class="field-search">
                </div>
              </form>
            </div>
        </div>
    <!-- LATEST POSTS -->
        <div class="h--posts">
            <div class="h--posts-item">
                <a class="h--post-link" href="#"></a>
                <div class="h--post-item-img">
                    <img src="https://images.unsplash.com/photo-1502673530728-f79b4cab31b1?dpr=1&auto=format&fit=crop&w=1000&q=80&cs=tinysrgb" alt="project_image">
                </div>
                <div class="h--post-desc">
                    <h2>Wylido</h2>
                    <p>Site de rencontre pour chiens</p>
                    <span class="h--post-subdesc">
                        Cherche un chien.
                    </span>
                </div>
            </div>

            <div class="h--posts-item">
                <a class="h--post-link" href="#"></a>
                <div class="h--post-item-img">
                    <img src="https://images.unsplash.com/photo-1502673530728-f79b4cab31b1?dpr=1&auto=format&fit=crop&w=1000&q=80&cs=tinysrgb" alt="project_image">
                </div>
                <div class="h--post-desc">
                    <h2>Wylido</h2>
                    <p>Site de rencontre pour chiens</p>
                </div>
            </div>

            <div class="h--posts-item">
                <div class="h--post-item-img">
                    <img src="https://images.unsplash.com/photo-1502673530728-f79b4cab31b1?dpr=1&auto=format&fit=crop&w=1000&q=80&cs=tinysrgb" alt="project_image">
                </div>
                <div class="h--post-desc">
                    <h2>Wylido</h2>
                    <p>Site de rencontre pour chiens</p>
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
