<?php
require('../database/config.php');

$titre = $_POST['titre'];
echo $titre;
$description = $_POST['description'];
$date_debut = $_POST['startdate'];
$date_fin = $_POST['enddate'];
$actif = $_POST['actif'];
echo $actif;
$promo = $_POST['promo'];

if (isset($actif)){$actif_inactif = 1;}else{$actif_inactif = 0;}

if (empty($titre) OR empty($description) OR empty($date_debut) OR empty($date_fin))
{
    $message = "Erreur de saisie ! Un des champs est vide";
}
else   
{
    $sql = 'INSERT INTO TP (titre, description, date_debut, date_fin, actif, FK_idPromotion)
    VALUES ("'.$titre.'", "'.$description.'", "'.$date_debut.'", "'.$date_fin.'", "'.$actif_inactif.'", "'.$promo.'");';

    if ($connection->query($sql) === TRUE) 
    {
        $message = "Nouveau TP Créer !!";
    }
    else 
    {
        $message = "Erreur lors de la création du TP !";
    }
}
    
header('location: ../vues/tp.php');


?>