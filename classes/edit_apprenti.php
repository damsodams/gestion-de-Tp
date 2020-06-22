<?php
require('../database/config.php');
$ID = $_POST['ID'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$identifiant = $_POST['identifiant'];
$email = $_POST['Email'];
$promotion = $_POST['promo'];
if (empty($nom) OR empty($prenom) OR empty($identifiant) OR empty($email))
{
        $echo = "Erreur de saisie ! Un des champs est vide";
}else {
        $sql = "UPDATE Apprenti SET nom = '".$nom."',prenom='".$prenom."',identifiant='".$identifiant."',email='".$email."',FK_idPromotion='".$promotion."'WHERE id_apprenti = '".$ID."'";
        if ($connection->query($sql) == TRUE) 
        {
            $message = "Le compte a été modifié";
        }
        else 
        {
            $message = "Erreur lors de la modification du compte";
        }
}
require('../vues/gestion-apprenti.php');
?>