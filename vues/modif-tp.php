<?php 
require '../database/config.php';
include '../public/header.php';
?>
    <div class="card card-nav-tabs text-center">
        <div class="card-header card-header-primary">
            Modification TP
        </div>
        <?php
            require ('../database/config.php');

            
            $ID = $_GET['ID'];
            $sql = 'SELECT * FROM TP WHERE id_tp=' . $ID;
            $response=$connection->query($sql);
            $result=$response->fetchAll();
            foreach($result as $row) {
                $sql2 = 'SELECT * FROM Promotion WHERE id_promotion ='. $row['FK_idPromotion'];
                $response=$connection->query($sql2);
                $resulta=$response->fetchAll();
                foreach($resulta as $row1) {
        ?>
            <form action="../classes/edit_tp.php" method="GET">
            <div class="form-row">
                <div class="form-group col-md-6">
                  <a>Titre<a>
                  <input type="text" class="form-control" name="titre" id="titre" aria-describedby="title" placeholder="Saisisser un Titre" value="<?= $row['titre']; ?>">
                </div>                
                <div class="form-group col-md-6">
                    <a>Promotion</a>
                    <select class="form-control selectpicker" name="promo" style="height: 36px;" name  data-style="btn btn-link" id="exampleFormControlSelect1">
                        <option value="<?= $row1['id_promotion'];?>"><?= $row1['libelle_promo']; } ?></option>
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
            </div>
                <div class="form-group">
                    <div class="form-group purple-border">
                        <a for="exampleFormControlTextarea4">Description du TP</a>
                        <textarea class="form-control" name="description"placeholder="Ajouter une description" id="exampleFormControlTextarea4" rows="3"><?= $row['description']; ?></textarea>
                    </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <a>Date de début<a>
                    <input type="text" class="form-control" name="startdate" id="startdate" placeholder="Saisisser une Date de début DD/MM/YYYY" value="<?= $row['date_debut']; ?> ">
                  </div>
                  <div class="form-group col-md-6">
                    <a>Date de fin<a>
                    <input type="text" class="form-control" name="enddate"  id="enddate" placeholder="Saisisser une Date de fin DD/MM/YYYY"  value="<?= $row['date_fin']; ?> ">
                  </div>
                </div>
                <br>
                <div class="form-check">
                  <label class="form-check-label">
                  <?php 
                  if ($row['actif']== 0){
                    echo '<input class="form-check-input" type="checkbox" name="actif" id="actif" value="1">';
                  }else {
                    echo '<input class="form-check-input" type="checkbox" name="actif" id="actif" value="1" checked="checked">';
                  }
                  ?>
                  Actif
                  <span class="form-check-sign">
                  <span class="check"></span>
                  </span>
                  </label>
                </div>
                <br>
                <button style=" display: block; margin : auto; " type="submit" name="ID" value="<?php echo $row['id_tp']; ?>" class="btn btn-primary">Valider</button>
            <?php } ?>
            </form>
<?php
include '../public/footer.php';
?>