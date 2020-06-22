<?php 
require '../database/config.php';
include '../public/header.php';
?>
<div class="card card-nav-tabs text-center">
    <div class="card-header card-header-primary">
            Modification élèves
        </div>
        <?php
            require ('../database/config.php');

            $ID = $_GET['ID'];
            $sql = "SELECT * FROM Apprenti WHERE id_apprenti='". $ID."'";    
            $response=$connection->query($sql);
            $result=$response->fetchAll();
            foreach($result as $row) {
                $idpromo = $row['FK_idPromotion'];
                $sql2 = 'SELECT * FROM Promotion WHERE id_promotion = '. $idpromo;
                $response1=$connection->query($sql2);
                $result1=$response1->fetch();
        ?>
  <form action="../classes/edit_apprenti.php" method="post">
       <a>Prenom</a>
      <div class="form-group">
        <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prénom" value="<?= $row['prenom']; ?>" required="required">
      </div>
      <a>Nom</a>
      <div class="form-group">
        <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom" value="<?= $row['nom']; ?>" required="required">
      </div>
      <a>Identifiant</a>
      <div class="form-group">
        <input type="text" class="form-control" id="identifiant" name="identifiant" placeholder="identifiant" value="<?= $row['identifiant']; ?>" required="required">
      </div>
      <a>Email</a>
    <div class="form-group">
      <input type="email" class="form-control" id="Email" name="Email" placeholder="Entrer Email" value="<?= $row['Email']; ?>" required="required">
    </div>
    <div class="form-group">
        <a>Promotion</a>
            <select class="form-control selectpicker" style="height: 36px;" data-style="btn btn-link" id="exampleFormControlSelect1" name="promo">
                    <option value="<?= $row['FK_idPromotion']; ?>"><?= $result1['libelle_promo'];?></option>
                    <?php
                    $sql3 = 'SELECT * FROM Promotion';
                    $response=$connection->query($sql3);
                    $resulta1=$response->fetchAll();
                    foreach($resulta1 as $row2) {
                    ?>
                    <option value="<?= $row2['id_promotion']; ?>"><?= $row2['libelle_promo']; ?></option>
                    <?php
                    }
                    ?>
            </select>              
    </div>
    <button type="submit" class="btn btn-primary"  name="ID" value="<?= $ID; ?>">Valider</button>
  </form>
</div>
            <?php }?>
<?php
include '../public/footer.php';
?>