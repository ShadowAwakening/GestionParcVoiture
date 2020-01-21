<?php 

include "bdd.php";

// VERIFIE QUE LES CHAMPS SONT ENVOYES
if (isset($_POST['marque']) && isset($_POST['immatriculation']) && isset($_POST['steappartenance'])) {

    // VERIFIE QUE LES CHAMPS SONT REMPLIS
    if (!empty($_POST['marque']) && !empty($_POST['immatriculation']) && !empty($_POST['steappartenance'])) {
        
        $marque = htmlspecialchars($_POST['marque']);
        $anneemisecirculation = htmlspecialchars($_POST['anneemisecirculation']);
        $immatriculation = htmlspecialchars($_POST['immatriculation']);
        $steappartenance = htmlspecialchars($_POST['steappartenance']);
        $loue = htmlspecialchars($_POST['loue']);
        $idclient = htmlspecialchars($_POST['idclient']);
        $datedeblocation = htmlspecialchars($_POST['datedeblocation']);
        $datefinlocation = htmlspecialchars($_POST['datefinlocation']);

        if($loue == 'oui'){
            
            if (isset($_POST['idclient']) && isset($_POST['datedeblocation']) && isset($_POST['datefinlocation'])) {

                if (!empty($_POST['idclient']) && !empty($_POST['datedeblocation']) && !empty($_POST['datefinlocation'])) {


        $requete = $bdd->prepare("INSERT INTO vehicules (marque, anneemisecirculation, immatriculation, steappartenance, loue, idclient, datedeblocation, datefinlocation) VALUE (:marque, :anneemisecirculation, :immatriculation, :steappartenance, :loue, :idclient, :datedeblocation, :datefinlocation)");

        $requete->execute(array(

            'marque' => $marque,
            'anneemisecirculation' => $anneemisecirculation,
            'immatriculation' => $immatriculation,
            'steappartenance' => $steappartenance,
            'loue' => $loue,
            'idclient' => $idclient,
            'datedeblocation' => $datedeblocation,
            'datefinlocation' => $datefinlocation

        ));

        // var_dump($requete);die;

        if ($requete){

        $requete->closeCursor();
        
        header("location:accueil_admin.php");
        }else{
            echo "Le vehicule n'a pas ete ajouter correctement";
        }
    }else{
        echo "Veuillez remplir tout les champs SVP";
    }
    }else{
        echo "Veuillez preciser un non de client, une date de debut de location et une date de fin de location SVP";
    }
    }elseif ($loue == 'non'){
        $requete = $bdd->prepare("INSERT INTO vehicules (marque, anneemisecirculation, immatriculation, steappartenance, loue) VALUE (:marque, :anneemisecirculation, :immatriculation, :steappartenance, :loue)");

        $requete->execute(array(

            'marque' => $marque,
            'anneemisecirculation' => $anneemisecirculation,
            'immatriculation' => $immatriculation,
            'steappartenance' => $steappartenance,
            'loue' => $loue

        ));

        // var_dump($requete);die;

        if ($requete){

        $requete->closeCursor();
        
        header("location:accueil_admin.php");
        }else{
            echo "Le vehicule n'a pas ete ajouter correctement";
        }
    }else{
        echo "Le vehicule est-il loue?";
    }
    }else{
        echo "Veuillez remplir tout les champs";
    }
 }else{
    echo "Les informations ne sont pas envoyer correctement";
 }

?>