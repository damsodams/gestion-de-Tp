<?php
require('../database/config.php');

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$identifiant = $_POST['id'];
$email = $_POST['Email'];
$motdepasse = $_POST['motdepasse'];
$motDePasseHash = password_hash($motdepasse, PASSWORD_DEFAULT);
$confmotdepasse = $_POST['confmotdepasse'];
$promotion = $_POST['promo'];
    if ($motdepasse == $confmotdepasse)
    {
<<<<<<< HEAD
    $sql = 'INSERT INTO Apprenti (nom, prenom, Email, mot_de_passe, identifiant, FK_idPromotion)
    VALUES ("'.$nom.'", "'.$prenom.'", "'.$email.'", "'.$motDePasseHash.'", "'.$identifiant.'","'.$promotion.'")';
=======
    $motdepasse=password_hash($motdepasse, PASSWORD_DEFAULT);
    $sql = 'INSERT INTO Apprenti (nom, prenom, Email, mot_de_passe, identifiant)
    VALUES ("'.$nom.'", "'.$prenom.'", "'.$email.'", "'.$motdepasse.'", "'.$identifiant.'");';
>>>>>>> master

    if ($connection->query($sql) == TRUE) {
    $message = "un nouvel utilisateur créer !!";
    } else {
    $message = "Erreur lors de la création de l'apprenti";
    }

    require('../vues/gestion-apprenti.php');

    
} else{
    $message = "Les mots de passe ne correspondent pas";
    require('../vues/gestion-apprenti.php');
}
?>

