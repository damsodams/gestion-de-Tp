<?php
require '../database/config.php';
include '../public/header.php';

?>
    <div class="card card-nav-tabs text-center">
        <div class="card-header card-header-primary">
            Créer une Etape
        </div>
            <form action="add-etape.php" method="POST">
                <div class="form-group">
                 <a>Attribuer à : 
                <select class="form-control selectpicker"  style="height: 36px;" data-style="btn btn-link" id="exampleFormControlSelect1" name="eleve" id="eleve">
                <option> - Sélectionner une Promotion -</option>
                <?php 
                    $rsql = "SELECT * FROM Promotion";
                    $exec = $connection->query($rsql);
                    $result = $exec->fetchAll();
                
                    foreach ($result as $row){
                ?>
                <option value="<?= $row['id_promotion'] ?>"><?= $row['libelle_promo'];} ?></option>
                </select>
                </div>
                <div class="form-group">
                <a>TP<a>
                 <select class="form-control selectpicker" name="tp" style="height: 36px;" name  data-style="btn btn-link" id="exampleFormControlSelect1">
                 <option >- Slectionner un TP -</option> 
                 <?php
                    $rsql1 = "SELECT * FROM TP ";
                    $exec = $connection->query($rsql1);
                    $result1 = $exec->fetchAll();

                    foreach ($result1 as $row){
                 ?>
                 <option value="<?= $row['id_tp'];?>"><?= $row['titre']; }?></option>
                </select>
                </div>
<br>
                <div class="form-group">
                <a> Nombre d'etape à ajouter</a>
                <select class="form-control selectpicker" name="number" style="height: 36px;" name  data-style="btn btn-link" id="exampleFormControlSelect1">
                 <option >- nbr étape -</option> 
                 <?php
                    for ($i=0;$i<=15;$i++){
                 ?>
                 <option value="<?php echo $i ;?>"><?php echo  $i + 1; }?></option>
                </select>
                </div>
                <div class="form-group">
                <button style=" display: block; margin : auto; " type="submit" class="btn btn-primary">Suivant</button>
              </div>
            </form>
<?php
include '../public/footer-apprenti.php';
?>
