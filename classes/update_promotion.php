<?php
require('../database/config.php');

$libelle_promo = $_POST['libelle_promo'];
$id_promotion = $_POST['id_promotion'];

    if(isset($_POST['id_promotion']))
    {
        $sql = "UPDATE Promotion SET libelle_promo = '".$libelle_promo."' WHERE id_promotion = '".$id_promotion."'";
        if ($connection->query($sql) == TRUE)
        {
          $message = "La modification a été prit en compte";
        }
        else
        {
            $message = "Erreur lors de la modification de promotion";
        }
    }

   header('location: ../vues/promotion.php');
?>
