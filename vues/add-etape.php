<?php
include '../public/header.php';
include '../database/config.php';

if (isset($_POST['eleve']) and isset($_POST['tp']) and isset($_POST['number'])){
    $eleve = $_POST['eleve'];
    $tp = $_POST['tp'];
    $nbr_etape = $_POST['number'];
?>
<form action="../classes/add_etape.php" method="POST">
    <?php 
        for ($i=0 ; $i<=$nbr_etape ; $i++){
    ?>
    <div class="form-group">
        <a>Saisisser la description de l'étape n°<?php echo $i ;?> </a>
        <input type="text" name="etape<?php echo $i ;?>"class="form-control" placeholder="étape <?php echo $i ;?>">
    </div>
    <div class="form-group">
            <a>Saisisser la durée de l'étape n°<?php echo $i ;?></a>
            <input type="number" name="duree<?php echo $i ;?>"class="form-control" placeholder="durée étape <?php echo $i ;?>">
    </div>
     <br><br>
    <?php 
        }
    ?>
    <div class="form-group">
        <input type = "hidden" name="tp" value="<?php echo $tp ;?>">
        <input type = "hidden" name="eleve" value="<?php echo $eleve ;?>">
        <input type = "hidden" name="number" value="<?php echo $nbr_etape ;?>">
        <button style=" display: block; margin : auto; " type="submit" class="btn btn-primary">Terminer</button>
    </div>
</form>

<?php
}else {
    header('Location: /gestion-tp-asi/vues/promotion.php');
}
include '../public/footer.php'
?>