<?php 

include "bdd.php";

$idclient = $_GET['id'];

$requete = $bdd->exec("DELETE FROM clients WHERE idclient = $idclient");


if($requete){
    header("location:accueil_admin.php");
}else{
            echo "Le client n'a pas ete supprimer";
}

?>