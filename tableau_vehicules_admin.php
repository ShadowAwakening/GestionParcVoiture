    <!-- TABLEAU RECAPITULATIF VEHICULES -->
    <div id="tableauVehicule">
    <h2>Liste des vehicules</h2>
    <p><a href="ajouter_vehicule.php"><button type="button" class="btn btn-success">Ajouter un vehicule</button></a></p>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead>
                <tr class="table-primary">
                    <th scope="col">ID</th>
                    <th scope="col">Marque</th>
                    <th scope="col">Annee de mise en circulation</th>
                    <th scope="col">Immatriculation</th>
                    <th scope="col">Ste d'appartenance</th>
                    <th scope="col">Loue (oui - non)</th>
                    <th scope="col">Client locataire</th>
                    <th scope="col">Date de debut de location</th>
                    <th scope="col">Date de fin de location</th>
                    <th scope="col">Modification</th>
                    <th scope="col">Suppresion</th>
                </tr>
            </thead>
            <tbody>
<?php 
    include "bdd.php";

    $requete = $bdd->query("SELECT * FROM vehicules");
    while ($donnees = $requete->fetch()){ 
        if(!empty($donnees['idclient'])){
        $idclient = $donnees['idclient'];
        
        $req = $bdd->prepare("SELECT * FROM clients WHERE idclient = :idclient");
        $req->execute(array(
            'idclient' => $idclient
        ));
        while ($donnees_client = $req->fetch()){
        
        ?>
                <tr>
                    <th scope="row"><?php echo $donnees['idvehicule'] ?></th>
                    <td><?php echo $donnees['marque'] ?></td>
                    <td><?php echo $donnees['anneemisecirculation'] ?></td>
                    <td><?php echo $donnees['immatriculation'] ?></td>
                    <td><?php echo $donnees['steappartenance'] ?></td>
                    <td><?php echo $donnees['loue'] ?></td>
                    <td><?php echo "<p><strong>Nom</strong> : ".$donnees_client['nomclient']."</p>";
                    echo "<p><strong>Prenom</strong> : ".$donnees_client['prenomclient']."</p>";
                    echo "<p><strong>DN</strong> : ".$donnees_client['datenaissance']."</p>"; ?></td>
                    <td><?php echo $donnees['datedeblocation'] ?></td>
                    <td><?php echo $donnees['datefinlocation'] ?></td>
                    <td><a href="modifier_vehicule.php?id= <?php echo $donnees['idvehicule']?>"><button type="button" class="btn btn-warning">Modifier</button></a></td>
                    <td><a href="supprimer_vehicule.php?id= <?php echo $donnees['idvehicule']?>"><button type="button" class="btn btn-danger">Supprimer</button></a></td>
                </tr>
<?php } 
}else{ ?>
        <tr>
        <th scope="row"><?php echo $donnees['idvehicule'] ?></th>
            <td><?php echo $donnees['marque'] ?></td>
            <td><?php echo $donnees['anneemisecirculation'] ?></td>
            <td><?php echo $donnees['immatriculation'] ?></td>
            <td><?php echo $donnees['steappartenance'] ?></td>
            <td><?php echo $donnees['loue'] ?></td>
            <td><?php echo "~" ?></td>
            <td><?php echo "~" ?></td>
            <td><?php echo "~" ?></td>
            <td><a href="modifier_vehicule.php?id= <?php echo $donnees['idvehicule']?>"><button type="button" class="btn btn-warning">Modifier</button></a></td>
            <td><a href="supprimer_vehicule.php?id= <?php echo $donnees['idvehicule']?>"><button type="button" class="btn btn-danger">Supprimer</button></a></td>
        </tr>
 
<?php } 
    } ?>

        </table>
    </div>
</div>
<hr>