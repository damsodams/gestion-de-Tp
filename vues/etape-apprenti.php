<?php 
include '../public/header-apprenti.php';
require ('../database/config.php');
include '../database/session.php';         
?>

<body>
    <div class="card card-nav-tabs text-center">
        <div class="card-header card-header-primary">
            Gestion des Etapes
        </div>
<table class="table table-sm" id="table">
            <thead>
              <tr>
                  <th scope="col">Etape</th>
                  <th scope="col">TP</th>
                  <th scope="col">Etat</th> 
                  <th scope="col" class="text-right">Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <?php
                // recupere les id etape de l'apprenti et boucle principale 
                $sql1 = 'SELECT * FROM Apprenti_Etape WHERE FK_id_Apprenti = '. $_SESSION['id'];
                $response=$connection->query($sql1);
                $lesEtapes=$response->fetchAll();
                foreach($lesEtapes as $etape) { 
                  // recupere les info de mon etape en cours
                  $sql2 = "SELECT * FROM Etape WHERE id_etape =" . $etape['FK_id_Etape'];
                  $exec2 = $connection->query($sql2);
                  $result2 = $exec2->fetch();
                  echo $result2['libelle_etape'];
                  echo $result2['id_etape'];
                  // recupere le titre des tp
                  $rsql = 'SELECT titre FROM TP WHERE id_tp = '. $result2['FK_idTP'];
                  $exec = $connection->query($rsql);
                  $result = $exec->fetch();
                ?>

                <td><?php echo $result2['libelle_etape']; ?> </td>
                <td><?php echo $result['titre']; ?> </td>
                <td><?php if ($etape['actif']== 1 ){echo "En Cours";}else {echo "Terminer";} ?> </td>
                <td class="td-actions text-right">
                <?php 
                if ($etape['actif']==1){
                ?>
                <div style="display: inline-flex;">
                <form action="../classes/validate_etape.php" method="POST">
                  <button type="submit"  name="id_etape" value ="<?php echo $result2['id_etape']; ?>" rel="tooltip" class="btn btn-success btn-round">
                      <i class="material-icons">done</i>
                  </button>
                </form>
                </div>
                <?php }else { ?>
                  <div style="display: inline-flex;">
                <form action="../classes/unvalidate_etape.php" method="POST">
                  <button type="submit"  name="id_etape" value ="<?php echo $result2['id_etape']; ?>" rel="tooltip" class="btn btn-danger btn-round">
                      <i class="material-icons">clear</i>
                  </button>
                </form>
                </div>
                <?php } ?>
                </td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
    </div>
    </div>
  </div>
  <?php
    include '../public/footer-apprenti.php';
?>
</body>













<?php

include '../public/header-apprenti.php';

?>