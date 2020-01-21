<?php 

include "bdd.php";



if($_POST['loue'] == 'non'){
            


        $idvehicule = $_GET['id'];
        $marque = htmlspecialchars($_POST['marque']);
        $anneemisecirculation = htmlspecialchars($_POST['anneemisecirculation']);
        $immatriculation = htmlspecialchars($_POST['immatriculation']);
        $steappartenance = htmlspecialchars($_POST['steappartenance']);
        $loue = htmlspecialchars($_POST['loue']);
        $idclient = htmlspecialchars($_POST['idclient']);
        $datedeblocation = htmlspecialchars($_POST['datedeblocation']);
        $datefinlocation = htmlspecialchars($_POST['datefinlocation']);


        $requete = $bdd->prepare("UPDATE vehicules SET marque = :marque, anneemisecirculation = :anneemisecirculation, immatriculation = :immatriculation, steappartenance = :steappartenance, loue = :loue, idclient = :idclient, datedeblocation = :datedeblocation, datefinlocation = :datefinlocation WHERE idvehicule = :idvehicule");

        $requete->execute(array(

            'marque' => $marque,
            'anneemisecirculation' => $anneemisecirculation,
            'immatriculation' => $immatriculation,
            'steappartenance' => $steappartenance,
            'loue' => $loue,
            'idclient' => NULL,
            'datedeblocation' => NULL,
            'datefinlocation' => NULL,
            'idvehicule' => $idvehicule

        ));

        if ($requete){

        $requete->closeCursor();
        
        header("location:accueil_admin.php");
        }else{
            echo "Le vehicule n'a pas ete ajouter correctement";
        }
    }else{

        $idvehicule = $_GET['id'];
        $marque = htmlspecialchars($_POST['marque']);
        $anneemisecirculation = htmlspecialchars($_POST['anneemisecirculation']);
        $immatriculation = htmlspecialchars($_POST['immatriculation']);
        $steappartenance = htmlspecialchars($_POST['steappartenance']);
        $loue = htmlspecialchars($_POST['loue']);
        $idclient = htmlspecialchars($_POST['idclient']);
        $datedeblocation = htmlspecialchars($_POST['datedeblocation']);
        $datefinlocation = htmlspecialchars($_POST['datefinlocation']);


        $requete = $bdd->prepare("UPDATE vehicules SET marque = :marque, anneemisecirculation = :anneemisecirculation, immatriculation = :immatriculation, steappartenance = :steappartenance, loue = :loue, idclient = :idclient, datedeblocation = :datedeblocation, datefinlocation = :datefinlocation WHERE idvehicule = :idvehicule");

        $requete->execute(array(

            'marque' => $marque,
            'anneemisecirculation' => $anneemisecirculation,
            'immatriculation' => $immatriculation,
            'steappartenance' => $steappartenance,
            'loue' => $loue,
            'idclient' => $idclient,
            'datedeblocation' => $datedeblocation,
            'datefinlocation' => $datefinlocation,
            'idvehicule' => $idvehicule

        ));

        if ($requete){

        $requete->closeCursor();
        
        header("location:accueil_admin.php");
        }else{
            echo "Le vehicule n'a pas ete ajouter correctement";
        }
    }
?>