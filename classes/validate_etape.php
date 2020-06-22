<?php
include '../database/config.php';
include '../database/session.php';

$id = $_POST['id_etape'];
echo $id ; 
$rsql = "UPDATE Apprenti_Etape SET actif=0 WHERE FK_id_Etape = ". $id." AND FK_id_Apprenti = " .$_SESSION['id'];
echo $sql;
if ($connection->query($rsql)==true){
    echo "ok";
    header('Location: ../vues/etape-apprenti.php');
}else {
    echo "erreur SQL ";
}
?>