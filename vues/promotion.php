<?php
include '../public/header.php';
?>
<body>
<a href="creation-promotion.php"><button class="btn btn-primary btn-round">Créer une Promotion</button></a>    <br><br>
    <div class="card card-nav-tabs text-center">
        <div class="card-header card-header-primary">
            Gestion Promotion
        </div>
        <?php
            require ('../database/config.php');

              //RÉCUPÉRATION DES PROMOTIONS (TABLEAU)
              $sql1 = 'SELECT * FROM Promotion';
              $response=$connection->query($sql1);
              $lesPromotions=$response->fetchAll();
          ?>

<table class="table table-sm" id="table">
            <thead>
              <tr>
                  <th scope="col">Libelle</th>
                  <th scope="col" class="text-right">Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <?php foreach($lesPromotions as $promotion) { ?>
                <td><?php echo $promotion['libelle_promo']; ?> </td>
                <td class="td-actions text-right">
                    <div style="display: inline-flex;">
                <form action="../vues/modifier-promotion.php" method="POST">
                    <input type="hidden" name="id_promotion" value="<?php echo $promotion['id_promotion'];?>">
                  <button type="submit" rel="tooltip" class="btn btn-success btn-round">
                      <i class="material-icons">edit</i>
                  </button>
                </form>
                    <form action="../classes/delete_promotion.php" method="POST">
                      <input type="hidden" name="id_promotion" value="<?php echo $promotion['id_promotion'];?>">
                  <button type="submit" rel="tooltip" class="btn btn-danger btn-round">
                      <i class="material-icons">cancel</i>
                  </button>
                    </form>
                  </div>
                </td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
    </div>
    </div>
  </div>
<?php
include '../public/footer.php';
?>
</body>
</html>
