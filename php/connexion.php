<?php
 if(isset($_POST['formconnexion'])){

   $mailconnect = htmlspecialchars($_POST['mailconnect']);
   $mdpconnect = sha1($_POST['mdpconnect']);

   if(!empty($mailconnect) AND !empty($mdpconnect)){
     $requser=$bdd->prepare("SELECT * FROM membres WHERE mail = ? AND motdepasse = ?");
     $requser->execute(array($mailconnect, $mdpconnect));
     $userexist = $requser -> rowCount();
     if($userexist==1){
       if (session_status() == PHP_SESSION_NONE) {
          session_start();
      }
       $_userinfo = $requser->fetch();
       $_SESSION['id']=$_userinfo['id'];
       $_SESSION['prenom']=$_userinfo['prenom'];
       $_SESSION['nom']=$_userinfo['nom'];
       $_SESSION['mail']= $_userinfo['mail'];
       header("Location:main.php?id=".$_SESSION['id']);
     }
     else{
       $erreurs="Email ou mot de passe incorrect";
     }
   }else{
     $erreurs="Tout les champs doivent être complétés";
   }
 }
 ?>
