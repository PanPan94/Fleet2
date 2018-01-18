<?php
  include_once("php/bd.php");
var_dump($_POST);
   if(isset($_POST['article_titre'], $_POST['article_categorie'], $_POST['article_contenu']) ){
     if(!empty($_POST['article_titre']) AND !empty($_POST['article_categorie']) AND !empty($_POST['article_contenu'])){
       $article_titre= htmlspecialchars($_POST['article_titre']);
       $article_categorie= htmlspecialchars($_POST['article_categorie']);
       $article_contenu= htmlspecialchars($_POST['article_contenu']);
       var_dump($article_titre);
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
</head>
<body>

  <form method="post" action="" id="article">
    <table>
      <tr>
        <td><label>Titre</label>
        <td><input type="text" name="article_titre"/></td>
      </tr>
      <tr><td><label>Catégorie</label></td>
        <td>
          <select  form="article"  name="article_categorie">
              <option value="web">web</option>
              <option value="opinion">opinion</option>
              <option value="startup">startup</option>
              <option value="lifestyle">lifestyle</option>
          </select></td>
      </tr>
    </table>
    <textarea name="article_contenu"></textarea><br/>
    <input type="submit" value="Poster un projet"/>
  </form>
  <br/>
  <?php if(isset($message)){
    echo $message;
  }
  ?>



    <!-- SCRIPTS -->
    <script src="js/app.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
</body>
</html>
