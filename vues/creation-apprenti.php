<?php 
  include '../public/header.php';
?>

<div class="card card-nav-tabs text-center">
  <div class="card-header card-header-primary">
    Création d'un élèves
</div>
  <form action="../classes/utilisateurs.php" method="post">
      <div class="form-group">
        <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prénom" required="required">
      </div>
      <div class="form-group">
        <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom" required="required">
      </div>
    <div class="form-group">
      <input type="text" class="form-control" id="id" name="id" placeholder="Identifiant" required="required">
    </div>
    <div class="form-group">
      <input type="email" class="form-control" id="Email" name="Email" placeholder="Entrer Email" required="required">
    </div>
    <div class="form-group">
      <input type="password" class="form-control" id="motdepasse" name="motdepasse" placeholder="Mot de passe" required="required">
    </div>
    <div class="form-group">
      <input type="password" class="form-control" id="confmotdepasse" name= "confmotdepasse" placeholder="confirmer Mot de passe" required="required">
    </div>
    <div class="form-group">
            <select class="form-control selectpicker" style="height: 36px;" data-style="btn btn-link" placeholder="Sélectionner une promotion" id="exampleFormControlSelect1" name="promo">
                <?php
                  require ('../database/config.php');
                  $sql = 'SELECT * FROM Promotion';
                  $response=$connection->query($sql);
                  $resulta=$response->fetchAll();
                  foreach($resulta as $row) {
                    echo $row['id_promotion'];
                    echo $row['libelle_promo'];
                ?>
                <option value="<?= $row['id_promotion']; ?>"><?= $row['libelle_promo']; ?></option>
                <?php
                  }
                ?>
            </select>              
    </div>
    <button type="submit" class="btn btn-primary" value="creer">Créer</button>
  </form>
</div>

<?php
include '../public/header.php';
?>

</head>
