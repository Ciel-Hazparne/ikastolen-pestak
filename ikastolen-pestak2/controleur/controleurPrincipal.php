<?php

function controleurPrincipal($action){
    $lesActions = array();
    $lesActions["defaut"] = "listeFetes.php";
    $lesActions["liste"] = "listeFetes.php";
    $lesActions["recherche"] = "rechercheFete.php";
    $lesActions["connexion"] = "connexion.php";
    $lesActions["deconnexion"] = "deconnexion.php";
    
    if (array_key_exists ( $action , $lesActions )){
        return $lesActions[$action];
    }
    else{
        return $lesActions["defaut"];
    }

}