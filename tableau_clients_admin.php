    <!-- TABLEAU RECAPITULATIF CLIENTS -->
    <div id="tableauClient">
        <h2>Liste des clients</h2>
        <p><a href="ajouter_client.php"><button type="button" class="btn btn-success">Ajouter un client</button></a></p>
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr class="table-primary">
                        <th scope="col">ID</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Prenom</th>
                        <th scope="col">Date de Naissance</th>
                        <th scope="col">Modification</th>
                        <th scope="col">Suppression</th>
                    </tr>
                </thead>
                <tbody>
<?php 

    include "bdd.php";

    $requete = $bdd->query("SELECT idclient, nomclient, prenomclient, datenaissance FROM clients");

    while ($donnees = $requete->fetch()){ 
?>
                    <tr>
                        <th scope="row"><?php echo $donnees['idclient'] ?></th>
                        <td><?php echo $donnees['nomclient'] ?></td>
                        <td><?php echo $donnees['prenomclient'] ?></td>
                        <td><?php echo $donnees['datenaissance'] ?></td>
                        <td><a href="modifier_client.php?id= <?php echo $donnees['idclient']?>"><button type="button"
                                    class="btn btn-warning">Modifier</button></a></td>
                        <td><a href="supprimer_client.php?id= <?php echo $donnees['idclient']?>"><button type="button"
                                    class="btn btn-danger">Supprimer</button></a></td>
                    </tr>
<?php

} 

?>
            </table>
        </div>
    </div>
    <hr>