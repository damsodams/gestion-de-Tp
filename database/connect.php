<?php
if(!isset($_POST['login']) AND !isset($_POST['motdepasse']))
{
    header('Location: ../public/index.php');
}
else
{
    // On va vérifier les variables
    if(!preg_match('/^[[:alnum:]]+$/', $_POST['login']) or
!preg_match('/^[[:alnum:]]+$/', $_POST['motdepasse']))
    {
        echo 'Vous devez entrer uniquement des lettres ou des chiffres <br/>';
        echo '<a href="/gestion-tp-asi/public/index.php" temp_href="/gestion-tp-asi/public/index.php">Réessayer</a>';
        exit();
    }
    else
    {

        if ($_POST['login'] == "admin")
        {

            if ($_POST['motdepasse'] != "admin")
            {
                echo 'mauvais mot de passe <br/>';
                echo '<a href="/gestion-tp-asi/public/index.php" temp_href="/gestion-tp-asi/public/index.php">Réessayer</a>';
                exit();
            }
            else
            {
                header('Location: ../vues/formateur.php');
            }
        

        }
        else
        {

        
            require('config.php'); // On réclame le fichier

            $login = $_POST['login'];
            $motdepasse = $_POST['motdepasse'];

            $sql = "SELECT * FROM Apprenti WHERE identifiant='".$login."'";

            // On vérifie si ce login existe
            $requete_1 = $connection->query($sql);
            $result = $requete_1->fetchAll();

            if($requete_1->rowCount()==0)
            {
                echo 'Ce login est incorrect ! <br/>';
                echo '<a href="../public/index.php" temp_href="../public/index.php">Réessayer</a>';
                exit();
            }
             else
            {
                 // On vérifie si le login et le mot de passe correspondent au compte utilisateur
                $requete_2 = $connection->query("SELECT mot_de_passe FROM Apprenti WHERE identifiant='".$login."'");
                $result2 = $requete_2->fetch();
                $motdepasseDB= $result2['mot_de_passe'];
                
                if (!password_verify($motdepasse, $motdepasseDB))
                {
                    echo 'Le mot de passe est incorrect ! <br/>';
                    echo '<a href="../public/index.php" temp_href="../public/index.php">Réessayer</a>';
                    exit();
                }
                else
                {
                session_start();
                foreach($result as $row)
                    {
                        $_SESSION['id'] = $row['id_apprenti'];
                        $_SESSION['prenom'] = $row['prenom'];
                        $_SESSION['nom'] = $row['nom'];
                        $_SESSION['fk_idPromo'] = $row['FK_idPromotion'];
                    }
                
                // On redirige vers la partie membre
                header('Location: ../vues/apprenti.php');
                }

            }
        }
 
    }    
}
?>