    <!-- TABLEAU RECAPITULATIF VEHICULES -->
    <div id="tableauVehicule">
        <h2>Liste des vehicules</h2>
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr class="table-primary">
                        <th scope="col">ID</th>
                        <th scope="col">Marque</th>
                        <th scope="col">Annee de mise en circulation</th>
                        <th scope="col">Immatriculation</th>
                        <th scope="col">Site d'appartenance</th>
                        <th scope="col">Loue (oui - non)</th>
                        <th scope="col">Client locataire</th>
                        <th scope="col">Date de debut de location</th>
                        <th scope="col">Date de fin de location</th>
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
                    </tr>

                    <?php } 
                    } ?>

                </tbody>
            </table>
        </div>
    </div>
    <hr>