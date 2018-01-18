<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
	if(!isset($_SESSION['id'])){	/*Verifie que la session n'existe pas*/
		header("Location:index.php");	/*si elle n'existe pas il redige vers la page index.html */
		exit();	/*termine le script courant*/
	}
  if($_SESSION['id'] != $_GET['id']){
     header("Location:index.php");
  }
?>
