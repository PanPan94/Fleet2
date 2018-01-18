<?php
if(isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name'])){
  $taillemax = 2097152;
  $extensionValide = array('jpg','jpeg', 'gif', 'png');
  if($_FILES['avatar']['size'] <= $taillemax){
    $extentionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'],'.'), 1));
    if(in_array($extentionUpload, $extensionValide)){
      $chemin = getcwd().DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."membres".DIRECTORY_SEPARATOR."avatars".DIRECTORY_SEPARATOR.$_SESSION['id'].".".$extentionUpload;
      $resultat = move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin);
      if($resultat){
        $updateavatar= $bdd->prepare('UPDATE membres SET avatar = :avatar WHERE id = :id ');
        $updateavatar->execute(array(
          'avatar' => $_SESSION['id'].".".$extentionUpload,
          'id' => $_SESSION['id']
        ));
        header("Location:../profil.php?id=".$_SESSION['id']);
      }else{
        $msg="Erreur durant l'importation du fichier";
      }
    }else{
      $msg="Votre photo doit être au format GIF, JPG, ou PNG";
    }
  }else{
    $msg="Votre photo de profil ne dois pas dépasser 2Mo";
  }
}
?>
