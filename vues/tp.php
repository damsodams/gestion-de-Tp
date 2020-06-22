<?php
include '../public/header.php';
?>
<body>
<?php
if(isset($message))
{
echo '<script type="text/javascript">
  <!--
    alert("'.$message.'");
  //-->
  </script> </p>';
}
?>
<a href="creation-tp.php"><button class="btn btn-primary btn-round">Créer un TP</button><a>    <br><br>
    <div class="card card-nav-tabs text-center">
        <div class="card-header card-header-primary">
            TP
        </div>
        <?php
            require ('../database/config.php');

            $sql = 'SELECT * FROM TP';
            $response=$connection->query($sql);
            $result=$response->fetchAll();
            //$req = mysqli_query($connection, $sql);
            //$result = $req->fetch_all();

        ?>
        <table class="table" id="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titre</th>
                    <th>Description</th>
                    <th>Date de début</th>
                    <th>Date de fin</th>
                    <th>Actif/inactif</th>
                    <th>Promotion</th>
                    <th class="text-right">Action</th>
                </tr>
            </thead>
            <tbody>
                    <tr>
                            <?php foreach($result as $row) { ?>

                                <td><?= $row['id_tp']; ?> </td>
                                <td><?= $row['titre']; ?> </td>
                                <td><?= $row['description']; ?> </td>
                                <td><?= $row['date_debut']; ?> </td>
                                <td><?= $row['date_fin']; ?> </td>
                                <td><?php if($row['actif'] == 0){echo "inactif";}else{echo "actif";}?></td>
                                <?php
                                $sql1 = 'SELECT libelle_promo FROM Promotion WHERE id_promotion ='. $row['FK_idPromotion'];
                                $response1=$connection->query($sql1);
                                $result1=$response1->fetch();
                                ?>
                                <td><?= $result1['libelle_promo'] ;?></td>
                                <td class="td-actions text-right">
                                    <div style="display: inline-flex;">
                                        <form action="dupliquer-tp.php" method="POST">
                                            <button type="submit" rel="tooltip" name="id" value="<?php echo $row['id_tp'];?>" class="btn btn-round">
                                                <i class="material-icons">filter_none</i>
                                            </button>
                                        </form>
                                        <form action="modif-tp.php" method="get">
                                            <button type="submit" rel="tooltip" name="ID" value="<?php echo $row['id_tp'];?>" class="btn btn-info btn-round">
                                                <i class="material-icons">edit</i>
                                            </button>
                                        </form>
                                        <form action="../classes/actif.php" method="POST">
                                            <button type="submit" rel="tooltip" name="id" name="id" value="<?php echo $row['id_tp']; ?>" class="btn btn-success btn-round">
                                                <i class="material-icons">check_circle</i>
                                            </button>
                                        </form>
                                    <form action="../classes/inactif.php" method="get">
                                        <button type="submit" rel="tooltip" class="btn btn-danger btn-round" onclick="return confirm('Voulez-vous vraiment supprimer ce message?');" name="id" value="<?php echo $row['id_tp']; ?>" >
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

<?php
    include '../public/footer.php';
?>