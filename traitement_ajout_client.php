<?php 

include "bdd.php";

// VERIFIE QUE LES CHAMPS SONT ENVOYES
if (isset($_POST['nomclient']) && isset($_POST['prenomclient']) && isset($_POST['datenaissanceclient'])) {

    // VERIFIE QUE LES CHAMPS SONT REMPLIS
    if (!empty($_POST['nomclient']) && !empty($_POST['prenomclient']) && !empty($_POST['datenaissanceclient'])) {
        
        $nomclient = htmlspecialchars($_POST['nomclient']);
        $prenomclient = htmlspecialchars($_POST['prenomclient']);
        $datenaissanceclient = htmlspecialchars($_POST['datenaissanceclient']);


        $requete = $bdd->prepare("INSERT INTO clients (nomclient, prenomclient, datenaissance) VALUE (:nomclient, :prenomclient, :datenaissanceclient)");

        $requete->execute(array(

            'nomclient' => $nomclient,
            'prenomclient' => $prenomclient,
            'datenaissanceclient' => $datenaissanceclient
        ));

        if ($requete){

        $requete->closeCursor();
        
        header("location:accueil_admin.php");
        }else{
            echo "Le client n'a pas ete ajouter correctement";
        }
    }else{
        echo "Veuillez remplir tout les champs";
    }
 }else{
    echo "Les informations ne sont pas envoyer correctement";
 }

?>