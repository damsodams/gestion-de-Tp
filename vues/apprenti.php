<?php 
include '../database/session.php';
include '../public/header-apprenti.php';


if (!isset($_SESSION['id']))
{
    header('Location: ../public/index.php');
}
else
{
?>


<h1><?= "Bonjour ".$_SESSION['prenom']." ".$_SESSION['nom']; ?></h1>






<?php
}
include '../public/footer-apprenti.php';

?>