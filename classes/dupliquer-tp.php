<?php
require '../database/config.php';
$promo =  $_POST['promo'];
$ID = $_POST['test'];
echo "id est : " . $ID . " promo est : " . $promo;
$sql = 'SELECT * FROM TP WHERE id_tp ='. $ID;
$response=$connection->query($sql);
$result=$response->fetch();
    $titre = $result['titre'];
    $description = $result['description'];
    $date_dbu= $result['date_debut'];
    $date_fin= $result['date_fin'];
    $actif = $result['actif'];
$sql1 = "INSERT INTO TP(titre, description, date_debut, date_fin, actif, FK_idPromotion) 
VALUES ('".$titre."','".$description."','".$date_dbu."','".$date_fin."','".$actif."','".$promo."')";
echo $sql1;
$connection->query($sql1);

header('Location: ../vues/tp.php');
?>