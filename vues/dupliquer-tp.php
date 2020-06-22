<?php
    include '../public/header.php';
    require '../database/config.php';
    $sql = 'SELECT * FROM Promotion';
    $response=$connection->query($sql);
    $result=$response->fetchAll();
    $ID=$_POST['id'];
?>
<div class="card card-nav-tabs text-center">
        <div class="card-header card-header-primary">
            Dupliquer un TP
        </div>
        <form action="../classes/dupliquer-tp.php" method="POST">
            <div class="form-group">
                <a>Slectionner une promotion</a>
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
                <br>
                <?php?>
                <input type="hidden" name="test" value="<?php echo  $ID ;?>">
                <button style=" display: block; margin : auto; " name="idtp" value="<?php echo $ID ;?>" type="submit" class="btn btn-primary">Créer</button>
            </div>
        </form>
</div>












<?php
    include('../public/footer.php');
?>
