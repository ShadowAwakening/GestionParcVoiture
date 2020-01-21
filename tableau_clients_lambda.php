<!-- TABLEAU RECAPITULATIF CLIENTS -->
<div id="tableauClient">
    <h2>Liste des clients</h2>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead>
                <tr class="table-primary">
                    <th scope="col">ID</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prenom</th>
                    <th scope="col">Date de Naissance</th>
                </tr>
            </thead>
            <tbody>
                <?php 

    include "bdd.php";

    $requete = $bdd->query("SELECT idclient, nomclient, prenomclient, datenaissance FROM clients");

    while ($donnees = $requete->fetch()){ ?>
                <tr>
                    <th scope="row"><?php echo $donnees['idclient'] ?></th>
                    <td><?php echo $donnees['nomclient'] ?></td>
                    <td><?php echo $donnees['prenomclient'] ?></td>
                    <td><?php echo $donnees['datenaissance'] ?></td>
                </tr>
                <?php 
    $_SESSION['idclient'] = $donnees['idclient'];
} ?>
        </table>
    </div>
</div>
<hr>
