<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
include_once("../php/authorise.php");
include_once("../php/bd.php");
include_once("../php/userinfo.php");

$prenom=$_SESSION['prenom'];
$bdd = new PDO('mysql:host=127.0.0.1;dbname=bdfleet;charset=utf8','root','');

   if(isset($_POST['submit_commentaire'])) {
      if(isset($_POST['commentaire']) AND !empty($_POST['commentaire'])) {
         $commentaire = htmlspecialchars($_POST['commentaire']);
            $ins = $bdd->prepare('INSERT INTO commentaires (commentaire, id_article) VALUES (?,?)');
            $ins->execute(array($commentaire,$prenom));
            $c_msg = "<span style='color:green'>Votre commentaire a bien été posté</span>";

      } else {
         $c_msg = "Erreur: Tous les champs doivent être complétés";
      }
   }
   $commentaires = $bdd->prepare('SELECT * FROM commentaires WHERE id_article = ? ORDER BY id DESC');
   $commentaires->execute(array($prenom));
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
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/angelique.css">
    <link rel="stylesheet" href="../css/projet.css">
</head>
<body>
  <!-- NAVBAR -->
  <header class="header">
    <div class="nav">
      <div class="nav-items"><a href="../main.php?id=<?php echo $_SESSION['id']; ?>">Accueil</a></div>
      <div class="nav-items"><a href="../profil.php?id=<?php echo $_SESSION['id']; ?>">Profil</a></div>
      <div class="nav-items"><a href="php/deconnexion.php">Déconnexion</a></div>
    </div>
  </header>
  <!-- BRAND-->
      <div class="brand-projet">
    </div>
    <div class="global" id="global">
      <div class="info">
        <?php if(!empty($userinfo['avatar'])){ ?>
          <img class="profile-pic" src="../membres/avatars/3.png" width="150px" />
          <?php
          }
          ?>
          <h6> Projet fleet de <span> Utilisateur </span>
          </h6>
      </div>
      <div class="info-projet">
        <h4>Le projet</h4>
          <p class="subtitle">Lorem ipsum dolor sit amet, consectetur</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      </div>
    <div class="info-projet">
        <h4>Support</h4>
          <p class="subtitle">Lorem ipsum dolor sit amet, consectetur</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      </div>
    <div class="info-projet">
      <h4>Objectifs</h4>
        <p class="subtitle">Lorem ipsum dolor sit amet, consectetur</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    </div>
    <div class="info-projet">
      <h4>Cibles</h4>
        <p class="subtitle">Lorem ipsum dolor sit amet, consectetur</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    </div>
    <div class="info-projet">
      <h4>Ce dont j'ai besoin</h4>
      <p> Ressources humaines </p>
    </div>
    <div class="i-conteneur">
      <div class="interet-container">
          <div class="interets i">
              <p>Développeur front</p>
            </div>
            <div class="interets i">
              <p>Développeur back</p>
            </div>
            <div class="interets i">
              <p>Designer</p>
            </div>
        </div>
        <div class="interet-container">
            <div class="interets int">
              <p>Comment mieux m'organiser ?</p>
            </div>
            <div class="interets int">
              <p>Juridiction ?</p>
            </div>
            <div class="interets int">
              <p>Qui contacter ?</p>
            </div>
        </div>
      </div>
      <div class="info-projet">
        <h4>Remarques et améliorations</h4>
      </div>
      <form method="POST">
       <textarea name="commentaire" placeholder="Commentaire" class="comments"></textarea><br/>
       <input type="submit" value="Poster mon commentaire" name="submit_commentaire" class="comments-btn"/>
      </form>
      <?php if(isset($c_msg)) { echo $c_msg; } ?>
      <br /><br />

      <?php while($c = $commentaires->fetch()) { ?>
         <div class="reponse"><b><?= $c['id_article'] ?>:</b> <?= $c['commentaire'] ?><br /></div>
      <?php } ?>

    </div>
<!-- SCRIPTS -->
    <script src="../js/app.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
</body>
</html>
