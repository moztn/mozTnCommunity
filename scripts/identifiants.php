<?php
//identifiants
$adresse = 'localhost';
$nom = 'root';
$motdepasse = '';
$database = 'reps';
mysql_connect($adresse, $nom, $motdepasse);
mysql_select_db($database);
?>
