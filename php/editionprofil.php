<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
  include_once("bd.php");
  if(isset($_SESSION['id'])){
    $requser=$bdd->prepare('SELECT * FROM membres WHERE id = ?');
    $requser->execute(array($_SESSION['id']));
    $user=$requser->fetch();

    if(isset($_POST['newmdp1']) AND !empty($_POST['newmdp1']) AND isset($_POST['newmdp2']) AND !empty($_POST['newmdp2'])){
      $mdp1= sha1($_POST['newmdp1']);
      $mdp2= sha1($_POST['newmdp2']);

      if($mdp1 == $mdp2){
        $insertmdp=$bdd->prepare("UPDATE membres SET motdepasse = ? WHERE id = ?");
        $insertmdp->execute(array($mdp1, $_SESSION['id']));
        header("Location:../profil.php?id=".$_SESSION['id']);
      }else{
        $msg="Vos deux mots de passe ne correspondent pas";
      }
    }
    include_once("putavatar.php");
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
</head>
<body>
    <!-- NAVBAR -->
        <header class="header">
            <div class="nav">
                <div class="nav-items"><a href="php/deconnexion.php">Déconnexion</a></div>
            </div>
        </header>
    <!-- HEADER -->
    <div class="profile-name">
      <h2> Edition de mon profil</h2>
      <form method="post" action="">
        <table>
          <tr>
            <td><label> Nouveau mot de passe</label></td>
            <td><input type="password" name="newmdp1" /> <br/></td>
          </tr>
          <tr>
            <td><label> Comfirmez votre nouveau mot de passe</label></td>
            <td><input type="password" name="newmdp2" /> <br/></td>
          </tr>
        </table>
        <input type="submit" value="Mettre à jour"/>
      </form>
      <?php  if(isset($msg)){echo $msg;} ?>
    </div>
    <form method="post" action="" enctype="multipart/form-data">
          <label> Changer mon avatar</label> <br/>
          <input class="btn file-btn" type="file" name="avatar"/>
      <input class="btn avatar-btn" type="submit" value="Mettre à jour"/>
    </form>
    <!-- SCRIPTS -->
    <script src="../js/app.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
</body>
</html>
<?php
}else {
  header("Location:../index.php");
}
?>
