<?php 

include "bdd.php";

// VERIFIE QUE LES CHAMPS SONT ENVOYES
if (isset($_POST['username']) && isset($_POST['mp'])) {

        // VERIFIE QUE LES CHAMPS SONT REMPLIS
        if (!empty($_POST['username']) && !empty($_POST['mp'])) {

            // STOCK
            $username = htmlspecialchars($_POST['username']);
            $mp = htmlspecialchars($_POST['mp']);

            // REQUETE PREPARE : PREPARATION ($req n'est pas une variable mais un objet ...)
            $req = $bdd->prepare("SELECT username, mp FROM users WHERE username = :username && mp = :mp");

            // EXECUTION
            $req->execute(array(
                'username' => $username,
                'mp' => $mp
            ));

            $resultat = $req->fetch();

            if(!$resultat){
                echo "Mauvais nom d'utilisateur ou mauvais mot de passe";
            }else{
                if ($username == 'admin'){
                    header('Location: accueil_admin.php');
                }else{
                    header('Location: accueil.php');
                }
            }
        }else{
            echo "Veuillez remplir tout les champs";
        }
}else{
    echo "Erreur de connexion";
}







?>