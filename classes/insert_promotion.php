<?php
require('../database/config.php');

$libelle_promo = $_POST['libelle_promo'];

    if (empty($libelle_promo))
    {
        $message = "Erreur de saisie ! Un des champs est vide";
    }
    else
    {
        $sql = 'INSERT INTO Promotion (libelle_promo) VALUES ("'.$libelle_promo.'");';

        if ($connection->query($sql) == TRUE)
        {
            $message = "Nouvelle promotion créer !!";
        }
        else
        {
            $message = "Erreur lors de la création de promotion";
        }
    }

   header('location: ../vues/promotion.php');
?>
