<?php
require '../database/config.php';
include '../public/header.php';
?>
    <div class="card card-nav-tabs text-center">
        <div class="card-header card-header-primary">
            Créer une Promotion
        </div>
            <form action="../classes/insert_promotion.php" method="POST">
                <div class="form-group">
                 <a>Libellé<a>
                  <input type="text" class="form-control" name="libelle_promo" id="libelle_promo" placeholder="  - Saisir un libellé - " >
                </div>
                <div class="form-group">
                <button style=" display: block; margin : auto; " type="submit" class="btn btn-primary">Créer</button>
              </div>
            </form>
<?php
include '../public/footer.php';
?>
