<?php
require('../database/config.php');

    if(isset($_POST['id_promotion']))
    {
        $sql = 'DELETE FROM Promotion WHERE id_promotion = '.$_POST['id_promotion'].';';
        if ($connection->query($sql) == TRUE)
        {
          $message = "La promotion a été supprimer !!";
        }
        else
        {
            $message = "Erreur lors de la supression de promotion";
        }
    }

    header('location: ../vues/promotion.php');
?>
