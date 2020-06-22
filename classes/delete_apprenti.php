<?php
require('../database/config.php');
$ID = $_POST['id'];
$sql = 'DELETE FROM Apprenti WHERE id_apprenti ='.$ID;
$connection->query($sql);
header('Location: ../vues/gestion-apprenti.php');
?>