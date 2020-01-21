<?php

// CONNEXION A LA BDD
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=GPV;charset=utf8', 'root', '');
    // PRINT L'ERREUR ET STOP LE PROCESSUS SI ECHEC
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
     
?>