<?php 
require '../database/config.php';
include '../public/header.php';
$sql = 'SELECT * FROM Promotion';
$response=$connection->query($sql);
$result=$response->fetchAll();
?>
    <div class="card card-nav-tabs text-center">
        <div class="card-header card-header-primary">
            Créer un TP
        </div>
            <form action="../classes/tp.php" method="POST">
            <div class="form-row">
                <div class="form-group col-md-6">
                  <a>Titre<a>
                  <input type="text" class="form-control" name="titre" id="titre" aria-describedby="titre" placeholder="Saisisser un Titre">
                </div>                
                <div class="form-group col-md-6">
                    <a>Promotion</a>
                    <select class="form-control selectpicker" style="height: 36px;" data-style="btn btn-link" id="exampleFormControlSelect1" name="promo">
                      <?php 
                      foreach($result as $row)
                      {
                      ?>
                        <option value="<?= $row['id_promotion'];?>" ><?= $row['libelle_promo'];?></option>
                      <?php
                      }
                      ?>
                    </select>
                </div>
            </div>
                <div class="form-group">
                 <a>Déscription du TP<a>
                  <input type="text" class="form-control" name="description" id="description" placeholder="Saisisser une description" > 
        
                </div>

                <div class="form-row">
                  <div class="form-group col-md-6">
                    <a>Date de début<a>
                    <input type="date" class="form-control" name="startdate" id="datedeb" placeholder="Saisisser une Date de début DD/MM/YYYY">
                  </div>
                  <div class="form-group col-md-6">
                    <a>Date de fin<a>
                    <input type="date" class="form-control" name="enddate"  id="datefin" placeholder="Saisisser une Date de fin DD/MM/YYYY">
                  </div>
                </div>
                <br>
                <div class="form-check">
                  <label class="form-check-label">
                  <input class="form-check-input" type="checkbox" name="actif" id="actif" value="" >
                  Actif
                  <span class="form-check-sign">
                  <span class="check"></span>
                  </span> 
                  </label>
                </div>
                <br>
                <button style=" display: block; margin : auto; " type="submit" class="btn btn-primary">Créer</button>
            </form>
<?php
include '../public/footer.php';
?>