<?php
$DB_serveur = '172.20.1.183'; // Nom du serveur
$DB_utilisateur = 'groupe'; // Nom de l'utilisateur de la base
$DB_motdepasse = 'groupe'; // Mot de passe pour accèder à la base
$DB_base = 'BDD_TP_ELEVE'; // Nom de la base

//$connection = mysqli_connect($DB_serveur, $DB_utilisateur, $DB_motdepasse, $DB_base) // On se connecte au serveur
//or die (mysql_error().' sur la ligne '.__LINE__);
 
//mysql_select_db($DB_base, $connection) // On se connecte à la BDD
//or die (mysql_error().' sur la ligne '.__LINE__);
//$connection = new PDO('mysql:host=172.20.1.183;dbname=BDD_TP_ELEVE;charset=utf8','groupe','groupe');
$connection = new PDO('mysql:host=192.168.43.226;dbname=BDD_TP_ELEVE;charset=utf8','groupe','groupe');
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>