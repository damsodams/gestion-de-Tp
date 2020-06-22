<?php 
include '../public/header-apprenti.php';
include '../database/session.php';
?>
<body>
    <div class="card card-nav-tabs text-center">
        <div class="card-header card-header-primary">
            TP en cours
        </div>
        <?php
            require ('../database/config.php');

            $sql = 'SELECT * FROM TP where FK_idPromotion='.$_SESSION['fk_idPromo'];
            $response=$connection->query($sql);
            $result=$response->fetchAll();
            //$req = mysqli_query($connection, $sql);
            //$result = $req->fetch_all();
           
        ?>
        <table class="table" id="table">
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Description</th>
                    <th>Date de début</th>
                    <th>Date de fin</th>
                </tr>
            </thead>
            <tbody>
                    <tr>
                            <?php foreach($result as $row) {
                                    if ($row['actif'] == 1)
                                    {
                                ?>
                                <td><?= $row['titre']; ?> </td>
                                <td><?= $row['description']; ?> </td>
                                <td><?= $row['date_debut']; ?> </td>
                                <td><?= $row['date_fin']; ?> </td>

                     </tr>
                            <?php }} ?>
            </tbody>
        </table>


    </div>
    <?php
    include '../public/footer-apprenti.php';
    ?>
</body>
