<?php
require('../database/config.php');
$ID = $_GET['ID'];
$titre = $_GET['titre'];
$promotion = $_GET['promo'];
$description = $_GET['description'];
$date_debut = $_GET['startdate'];
$date_fin = $_GET['enddate'];
$actif = $_GET['actif'];
if (!isset($_GET['actif'])== true){
    $actif = "0";
}
echo $titre ." ". $promotion ." ". $description ." ". $date_debut ." ". $date_fin ." ". $actif ." ". $ID;
if (empty($titre) OR empty($description) OR empty($date_debut) OR empty($date_fin))
    {
        $message = "Erreur de saisie ! Un des champs est vide";
    }
    else   
    {
        $sql1 = "UPDATE TP SET titre = '".$titre."',description='".$description."',date_debut='".$date_debut."',date_fin='".$date_fin."',actif='".$actif."',FK_idPromotion='".$promotion."'WHERE id_tp = '".$ID."'";
        if ($connection->query($sql1) == TRUE) 
        {
            $message = "Nouvelles données inscrites avec succès";
        }
        else 
        {
            $message = "Erreur lors de la création de l'apprenti";
        }
    }
   
    
    header('Location: ../vues/tp.php');
?>