<?php 
include '../public/header.php';
?>
<body>
<a href="creation-apprenti.php"><button class="btn btn-primary btn-round">Ajouter un élèves</button><a>    <br><br>
    <div class="card card-nav-tabs text-center">
        <div class="card-header card-header-primary">
            Elèves
        </div>
        <?php
            require ('../database/config.php');

            $sql = 'SELECT * FROM Apprenti';
            $response=$connection->query($sql);
            $result=$response->fetchAll();

            if(isset($message))
            {
            echo '<script type="text/javascript">
            <!--
                alert("'.$message.'");
            //-->
            </script> </p>';
}
        ?>
        <table class="table" id="table">
            <thead>
                <tr>
                    <th class="text-center">ID</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Identifiant</th>
                    <th>Email</th>
                    <th>Promotion</th>
                    <th class="text-right">Action</th>
                </tr>
            </thead>
            <tbody>
                    <tr>
                            <?php foreach($result as $row) { 

                                $idpromo = $row['FK_idPromotion'];
                                $sql2 = 'SELECT libelle_promo FROM Promotion WHERE id_promotion = '. $idpromo;
                                $response1=$connection->query($sql2);
                                $result1=$response1->fetchAll();
                                foreach($result1 as $row1){
                                ?>
                                <td><?= $row['id_apprenti']; ?> </td>
                                <td><?= $row['nom']; ?> </td>
                                <td><?= $row['prenom']; ?> </td>
                                <td><?= $row['identifiant']; ?> </td>
                                <td><?= $row['Email']; ?> </td>
                                <td><?= $row1['libelle_promo'];}?></td>
                                <td class="td-actions text-right">
                                    <div style="display: inline-flex;">
                                        <form action="modif-apprenti.php" method="get">
                                            <button type="submit" rel="tooltip" name="ID" value="<?php echo $row['id_apprenti'];?>" class="btn btn-success btn-round">
                                                <i class="material-icons">edit</i>
                                            </button>
                                        </form>
                                    <form action="../classes/delete_apprenti.php" method="post">
                                        <button type="submit" rel="tooltip" class="btn btn-danger btn-round" name="id" value="<?php echo $row['id_apprenti']; ?>" >
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

</body>
