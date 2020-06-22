<?php
require '../database/config.php';
include '../public/header.php';
?>
<div class="card card-nav-tabs text-center">
    <div class="card-header card-header-primary">
            Modification Promotion
        </div>
<?php
require ('../database/config.php');
$ID = $_POST['id_promotion'];
$sql = 'SELECT * FROM Promotion WHERE id_promotion=' . $ID;
$response=$connection->query($sql);
$lesPromotions=$response->fetchAll();
foreach ($lesPromotions as $promo) {
?>

            <form action="../classes/update_promotion.php" method="POST">
                <div class="form-group">
                  <a>Libellé<a>
                  <input type="text" class="form-control" name="libelle_promo" id="libelle_promo" aria-describedby="title"  placeholder=" - Saisir un nouveau libellé - " value="<?= $promo['libelle_promo']; ?>">
                </div>
<div class="form-group">
                <button style=" display: block; margin : auto; " type="submit" name="id_promotion" id="id_promotion" value="<?= $promo['id_promotion']; ?>" class="btn btn-primary">Valider</button>
</div>
            </form>
            <?php } ?>
<?php
include '../public/footer.php';
?>
