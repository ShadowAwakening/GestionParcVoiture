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
  include "bdd.php"; 
  
  $id = $_GET['id'];

  $requete = $bdd->query("SELECT * FROM clients WHERE idclient = $id");
  $donnees = $requete->fetch();
  ?>
  <hr>

  <!-- CORP DE PAGE -->
  <div class="container">
    <h2>Modifier un client</h2>
    <form action="traitement_modification_client.php?id= <?php echo $id ?>" method="POST">
      <div class="form-group">
        <label>Nom</label>
        <input type="text" class="form-control" name="nomclient" value="<?php echo $donnees['nomclient']?>">
      </div>
      <div class="form-group">
        <label>Prenom</label>
        <input type="text" class="form-control" name="prenomclient" value="<?php echo $donnees['prenomclient']?>">
      </div>
      <div class="form-group">
        <label>Date de naissance</label>
        <input type="date" class="form-control" name="datenaissanceclient"
          value="<?php echo $donnees['datenaissance']?>">
      </div>
      <button type="submit" class="btn btn-primary">Modifier</button>
    </form>
  </div>
  <hr>

  <!-- FOOTER -->
  <?php include "footer.php" ?>
  </body>
</html>