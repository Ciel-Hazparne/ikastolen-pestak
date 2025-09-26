<?php

function controleurPrincipal($action){
    $lesActions = array();
    $lesActions["defaut"] = "accueil.php";
    $lesActions["cgu"] = "cgu.php";
    $lesActions["liste"] = "listeFetes.php";
    $lesActions["detail"] = "detailFete.php";
    $lesActions["recherche"] = "rechercheFete.php";
    $lesActions["connexion"] = "connexion.php";
    $lesActions["deconnexion"] = "deconnexion.php";
    $lesActions["profil"] = "monProfil.php";
    $lesActions["updtProfil"] = "updtProfil.php";
    $lesActions["inscription"] = "inscription.php";
    $lesActions["aimer"] = "aimer.php";
    $lesActions["noter"] = "noter.php";
    $lesActions["commenter"] = "commenter.php";
    $lesActions["supprimerCritique"] = "supprimerCritique.php";
    $lesActions["supprimerPhoto"] = "supprimerPhoto.php";
    $lesActions["ajouterPhoto"] = "ajouterPhoto.php";
    $lesActions["gererUtilisateurs"] = "gererUtilisateurs.php";
    $lesActions["supprimerUtilisateur"] = "supprimerUtilisateur.php";
    $lesActions["updtUtilisateur"] = "updtUtilisateur.php";
    $lesActions["ajouterUtilisateur"] = "ajouterUtilisateur.php";
    
    if (array_key_exists ( $action , $lesActions )){
        return $lesActions[$action];
    }
    else{
        return $lesActions["defaut"];
    }

}
