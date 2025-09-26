<?php

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
include_once "$racine/modele/bd.aimer.inc.php";


// recuperation des donnees GET, POST, et SESSION
$idF = $_GET["idF"];

// appel des fonctions permettant de recuperer les donnees utiles a l'affichage 

$mailU = getMailULoggedOn();
if ($mailU != "") {
    $aimer = getAimerById($mailU, $idF);

// traitement si necessaire des donnees recuperees
    ;
    if ($aimer == false) {
        addAimer($mailU, $idF);
    } else {
        delAimer($mailU, $idF);
    }
}

// redirection vers le referer
header('Location: ' . $_SERVER['HTTP_REFERER']);
//echo($_SERVER['HTTP_REFERER']);