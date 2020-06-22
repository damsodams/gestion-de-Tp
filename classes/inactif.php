<?php

require('../database/config.php');

$id = $_POST['id'];

$sql = 'UPDATE TP SET actif = FALSE WHERE id_tp ='.$id;

if ($connection->query($sql) == TRUE)
{
    $message = "Le TP id= ".$id." est passer en inactif";
}
else
{
    $message = "Erreur lors de la mise à jour du champ";
}

echo $message;

require('Location: /gestion-tp-asi/vues/tp.php');
?>

