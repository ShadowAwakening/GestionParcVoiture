<?php 

include "bdd.php";

        $idclient = $_GET['id'];
        $nomclient = htmlspecialchars($_POST['nomclient']);
        $prenomclient = htmlspecialchars($_POST['prenomclient']);
        $datenaissanceclient = htmlspecialchars($_POST['datenaissanceclient']);


        $requete = $bdd->prepare("UPDATE clients SET nomclient = :nomclient, prenomclient = :prenomclient, datenaissance = :datenaissanceclient WHERE idclient = :idclient");

        $requete->execute(array(

            'nomclient' => $nomclient,
            'prenomclient' => $prenomclient,
            'datenaissanceclient' => $datenaissanceclient,
            'idclient' => $idclient
        ));

        if ($requete){

        $requete->closeCursor();
        
        header("location:accueil_admin.php");
        }else{
            echo "Le client n'a pas ete modifier correctement";
        }


?>