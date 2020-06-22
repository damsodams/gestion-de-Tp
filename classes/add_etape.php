<?php
    include '../database/config.php';
    $promo = $_POST['eleve'];
    $tp = $_POST['tp'];
    echo $tp;
    echo " promo : " . $promo. " oui ";
    $nbr_etape = $_POST['number'];
    for ($i=0 ; $i<=$nbr_etape;$i++){
        $etape = $_POST['etape'.$i];
        $duree = $_POST['duree'.$i];
        $sql =  "INSERT INTO Etape(libelle_etape, duree, FK_idTP, Valide)
        VALUES ('".$etape."','".$duree."','".$tp."',0)";
        echo $sql;
        if ($connection->query($sql)== true){
            // recupere id de l'étape dans la BDD
            $sql1 = "SELECT id_etape FROM Etape WHERE libelle_etape ='".$etape. "'";
            $exec1 = $connection->query($sql1);
            $result1 = $exec1->fetch();
            //Afectation de l'etape a tout les utilisateur de la promotion
            $sql3 = "SELECT id_apprenti FROM Apprenti WHERE FK_idPromotion = ". $promo;
            echo $sql3;
            $exec3 = $connection->query($sql3);
            $result3 = $exec3->fetchAll();
            foreach ($result3 as $eleves){ 
                $sql2 = "INSERT INTO Apprenti_Etape(FK_id_Apprenti, FK_id_Etape, actif)
                VALUES ('".$eleves['id_apprenti']. "','".$result1['id_etape']."','0')";
                echo $sql2 ;
                if ($connection->query($sql2)== true){
                    echo "ok";
                }else {
                    echo "Erreur SQL";
                }
            }
        }else {
            echo "Erreur SQL";
        }
    }
    header('Location: ../vues/promotion.php');
?>