<?php 

include "bdd.php";

$idvehicule = $_GET['id'];

$requete = $bdd->exec("DELETE FROM vehicules WHERE idvehicule = $idvehicule");


if($requete){
    header("location:accueil_admin.php");
}else{
            echo "Le vehicule n'a pas ete supprimer";
}

?>