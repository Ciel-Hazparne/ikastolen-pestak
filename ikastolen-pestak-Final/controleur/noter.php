<?php

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
include_once "$racine/modele/bd.critiquer.inc.php";
include_once "$racine/modele/authentification.inc.php";


// recuperation des donnees GET, POST, et SESSION
$idF = $_GET["idF"];
$note = $_GET["note"];

// appel des fonctions permettant de recuperer les donnees utiles a l'affichage 

$mailU = getMailULoggedOn();
if ($mailU != "") {
    $critiquer = getCritiquerById($idF, $mailU);

// traitement si necessaire des donnees recuperees
    ;
    if ($critiquer == false) {
        
        addCritiquer($idF, $mailU);
        updCritiquerNote($idF, $mailU, $note);
    } else {
        updCritiquerNote($idF, $mailU, $note);
    }
}

// redirection vers le referer
header('Location: ' . $_SERVER['HTTP_REFERER']);