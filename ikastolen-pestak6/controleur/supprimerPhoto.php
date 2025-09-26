<?php

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
include_once "$racine/modele/bd.photo.inc.php";
include_once "$racine/modele/authentification.inc.php";


// recuperation des donnees GET, POST, et SESSION
$idP = $_GET["idP"];

// appel des fonctions permettant de recuperer les donnees utiles a l'affichage 

$util = getAdmin();
$mailAdmin = $util["mailU"];
$mailU = getMailULoggedOn();

if ($mailAdmin == $mailU) {
    delPhotoById($idP);

}

// redirection vers le referer
header('Location: ' . $_SERVER['HTTP_REFERER']);