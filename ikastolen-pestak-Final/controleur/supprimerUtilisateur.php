<?php

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
include_once "$racine/modele/bd.utilisateur.inc.php";
include_once "$racine/modele/authentification.inc.php";


// recuperation des donnees GET, POST, et SESSION
$mailU= $_GET["mailU"];

// appel des fonctions permettant de recuperer les donnees utiles a l'affichage

$util = getAdmin();
$mailAdmin = $util["mailU"];
$mailUlogged = getMailULoggedOn();

if ($mailAdmin == $mailUlogged) {
    delUtilisateurByMailU($mailU);

}

// redirection vers le referer
header('Location: ' . $_SERVER['HTTP_REFERER']);