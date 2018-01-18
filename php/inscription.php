<?php
if(isset($_POST["forminsciption"]))
  {
    $prenom = htmlspecialchars($_POST["prenom"]);
    $nom = htmlspecialchars($_POST["nom"]);
    $mail = htmlspecialchars($_POST["mail"]);
    $mail2 = htmlspecialchars($_POST["mail2"]);
    $mdp = sha1($_POST["mdp"]);
    $mdp2 = sha1($_POST["mdp2"]);

    if(!empty($_POST["prenom"]) AND !empty($_POST["nom"]) AND !empty($_POST["mail"]) AND !empty($_POST["mail2"]) AND !empty($_POST["mdp"]) AND !empty($_POST["mdp2"]))
    {
      $prenomlenght= strlen($prenom);
      if($prenomlenght <= 255)
      {
        if($mail == $mail2)
        {
          if(filter_var($mail, FILTER_VALIDATE_EMAIL))
          {
            $reqmail=$bdd->prepare("SELECT * FROM membres WHERE mail= ?");
            $reqmail->execute(array($mail));
            $mailexist = $reqmail->rowCount();
            if($mailexist == 0){
              if($mdp==$mdp2)
              {
                  $insertmbr = $bdd->prepare("INSERT INTO membres(prenom, nom, mail, motdepasse) VALUES (?, ? , ? , ?)");
                  $insertmbr->execute(array($prenom, $nom, $mail, $mdp));
                  $erreur="Votre Compte à bien été créer";
              }
              else{
                $erreur="Vos mots de passes ne correspondent pas";
              }
            }else{
              $erreur ="Adresse mail déjà utilisée";

            }
          }
          else{
            $erreur="Votre adresse mail n'est pas valide";
          }
        }
        else{
          $erreur="Vos adresse ne correspondent pas";
        }
      }
      else{
        $erreur="Votre prenom ne doit pas dépasser 255 caractères";
      }
    }
    else{
      $erreur="Tout les champs doivent être complétés";
    }
  }
  ?>
