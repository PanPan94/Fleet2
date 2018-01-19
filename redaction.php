<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
  include_once("php/bd.php");
  include_once("php/authorise.php");
  include_once("php/userinfo.php");
   if(isset($_POST['article_titre'], $_POST['article_categorie'], $_POST['article_contenu']) ){
     if(!empty($_POST['article_titre']) AND !empty($_POST['article_categorie']) AND !empty($_POST['article_contenu'])){
       $article_titre= htmlspecialchars($_POST['article_titre']);
       $article_categorie= htmlspecialchars($_POST['article_categorie']);
       $article_contenu= htmlspecialchars($_POST['article_contenu']);
       $ins = $bdd->prepare('INSERT INTO articles (titre, categorie, contenu, date_time_publication) VALUES (?, ?,?, NOW())');
       $ins->execute(array($article_titre, $article_categorie, $article_contenu));
      $message="Votre article à bien été poster";

      }else{
       $message= "Veuillez remplir tout les champs";
     }
   }
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
    <link rel="stylesheet" href="css/projet.css">

</head>
<body>
  <!-- NAVBAR -->
  <header class="header">
    <div class="nav">
      <div class="nav-items"><a href="main.php?id=<?php echo $_SESSION['id']; ?>">Accueil</a></div>
      <div class="nav-items"><a href="profil.php?id=<?php echo $_SESSION['id']; ?>">Profil</a></div>
      <div class="nav-items"><a href="php/deconnexion.php">Déconnexion</a></div>
    </div>
  </header>
  <div class="form-projet">
    <form method="post" action="" id="article">
        <label><b>Titre</b></label>
            <input class="proj-f" type="text" name="article_titre"/><br/>
            <label><b>Catégorie</b></label>
            <select class="proj-f"  form="article"  name="article_categorie">
                <option value="web">web</option>
                <option value="opinion">opinion</option>
                <option value="startup">startup</option>
                <option value="lifestyle">lifestyle</option>
            </select>
            <br/>
            <label><b>Cibles</b></label>
            <input class="proj-f"  type="text"/>
            <label><b>Support</b></label>
            <input class="proj-f"  type="text"/>
            <label><b>Objectifs</b></label>
            <input class="proj-f" type="text"/>
      <textarea class="comments" name="article_contenu"></textarea><br/>
      <input placeholder="Expliquez votre idée et ce dont vous avez besoin" class="comments-btn" type="submit" value="Poster un projet"/>
    </form>
    <?php if(isset($message)){
      echo $message;
    }
    ?>
    </div>

    <!-- SCRIPTS -->
    <script src="js/app.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
</body>
</html>
