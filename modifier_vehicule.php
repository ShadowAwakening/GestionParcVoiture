<!doctype html>
<html lang="fr">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="login.css">

  <title>Ajouter client</title>
</head>

<body>
      <!-- HEADER -->
  <?php 
    include "header.php";
    $id = $_GET['id'];
    include "bdd.php"; 
  
    $id = $_GET['id'];
  
    $requete = $bdd->query("SELECT * FROM vehicules WHERE idvehicule = $id");
    $donnees = $requete->fetch();
  ?>
  <hr>

  <!-- CORP DE PAGE -->
  <div class="container">
    <h2>Modifier un vehicule</h2>
    <form action="traitement_modification_vehicule.php?id= <?php echo $id ?>" method="POST">
      <div class="form-group">
        <label>Marque du vehicule</label>
        <input type="text" class="form-control" name="marque" value="<?php echo $donnees['marque']?>">
      </div>
      <div class="form-group">
        <label>Annee de mise en circulation</label>
        <input type="number" class="form-control" name="anneemisecirculation"
          value="<?php echo $donnees['anneemisecirculation']?>">
      </div>
      <div class="form-group">
        <label>immatriculation</label>
        <input type="text" class="form-control" name="immatriculation" value="<?php echo $donnees['immatriculation']?>">
      </div>
      <div class="form-group">
        <label>Societe d'appartenance</label>
        <input type="text" class="form-control" name="steappartenance"
          value="<?php echo $donnees['steappartenance'] ?>">
      </div>
      <div class="form-group">
        <label>Loue (oui / non)</label>
        <input type="text" class="form-control" name="loue" value="<?php echo $donnees['loue'] ?>">
      </div>
      <div class="form-group">
        <label>Identifiant du client locataire (Voir tableau client)</label>
        <input type="int" class="form-control" name="idclient" value="<?php echo $donnees['idclient'] ?>">
      </div>
      <div class="form-group">
        <label>Date de debut de location</label>
        <input type="date" class="form-control" name="datedeblocation"
          value="<?php echo $donnees['datedeblocation'] ?>">
      </div>
      <div class="form-group">
        <label>Date de fin de location</label>
        <input type="date" class="form-control" name="datefinlocation"
          value="<?php echo $donnees['datefinlocation'] ?>">
      </div>
      <button type="submit" class="btn btn-primary">Modifier</button>
    </form>
  </div>
  <hr>

  <!-- FOOTER -->
  <?php include "footer.php" ?>
  </body>
</html>