<?php
include '../public/header.php';
?>
<body>
<div>
  <a href="creation-etape.php"><button class="btn btn-primary btn-round">Crée une étape</button></a>
  <a href=""><button class="btn btn-primary btn-round">Gestion des étape</button></a>
</div>
<br>
    <div class="card card-nav-tabs text-center">
        <div class="card-header card-header-primary">
            Suivi de l'avancement des TP :
        </div>
        <?php
            require ('../database/config.php');


          ?>
<table class="table table-sm" id="table">
            <thead>
              <tr>
                  <th scope="col">Nom</th>
                  <th scope="col">Prénom</th>
                  <th scope="col">TP</th>
                  <th scope="col">Promotion</th>
                  <th scope="col">Pourcentage</th>
                  <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
              <?php 

              // recuperation des TP et Boucle Principal
              $sql = 'SELECT * FROM TP';
              $exec = $connection->query($sql);
              $result = $exec->fetchAll();
              foreach ($result as $lesresults){
              // recuperation des Promotion
              $rsql = 'SELECT libelle_promo FROM Promotion WHERE id_promotion = '.$lesresults['FK_idPromotion'];
              $exec2 = $connection->query($rsql);
              $result2 = $exec2->fetch();
              // recuperation des Apprenti et Boicl secondaire
              $sql1 = 'SELECT * FROM Apprenti WHERE FK_idPromotion =' . $lesresults['FK_idPromotion'];
              $exec1 = $connection->query($sql1);
              $result1 = $exec1->fetchAll();
              foreach ($result1 as $lesresults1){
                // calcule du pourcentage 
                  //calcule nbr total étape
                  $sql6 = 'SELECT FK_id_Etape FROM Apprenti_Etape WHERE FK_id_Apprenti ='. $lesresults1['id_apprenti'];
                  $exec6 = $connection->query($sql6);
                  $result6 = $exec6->fetchAll();
                  $total = 0;
                  foreach ($result6 as $row){
                    $total = $total + 1;
                  }
                  //calcule nb étape valider
                  $sql7 = 'SELECT FK_id_Etape FROM Apprenti_Etape WHERE FK_id_Apprenti ='. $lesresults1['id_apprenti'].' AND actif = 0 ';
                  $exec7 = $connection->query($sql7);
                  $result7 = $exec7->fetchAll();
                  $iencli = 0;
                  foreach ($result7 as $row){
                    $iencli = $iencli + 1;
                  }
                $nombre_client = $iencli;
                $total_client = $total;
                $valeur_p = 100;
                $resultat = ($nombre_client/$total_client) * $valeur_p;
                // Fin calcule 
              ?>
                <td><?=$lesresults1['nom'];?></td>
                <td><?=$lesresults1['prenom'];?></td>
                <td><?=$lesresults['titre'];?></td>
                <td><?=$result2['libelle_promo'];?></td>
                <td><?php echo $resultat . "%";?></td>
                <td class="td-actions text-right">
                    <div style="display: inline-flex;">
                        <form action="etape-view.php" method="POST">
                          <button type="submit" rel="tooltip" name="id" value="" class="btn btn-round">
                             <i class="material-icons">remove_red_eye</i>
                            </button>
                          </form>
                    </div>
                    
              </tr>   <?php }
              } ?>    
            </tbody>
          </table>
    </div>

    <?php
      include '../public/footer.php'
    ?>
</body>
</html>
