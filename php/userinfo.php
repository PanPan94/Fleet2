<?php

$getid=intval($_GET['id']);
$requser=$bdd->prepare('SELECT * FROM membres WHERE id = ?');
$requser->execute(array($_SESSION['id']));
$userinfo=$requser->fetch();

?>
