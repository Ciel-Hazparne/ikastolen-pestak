<?php

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
include_once "$racine/modele/bd.fete.inc.php";
include_once "$racine/modele/bd.typeGastronomie.inc.php";
include_once "$racine/modele/bd.photo.inc.php";
include_once "$racine/modele/bd.critiquer.inc.php";
include_once "$racine/modele/bd.aimer.inc.php";
include_once "$racine/modele/authentification.inc.php";

// creation du menu recherche
$menuRecherche = array();
$menuRecherche[] = Array("url"=>"#top","label"=>"La fête");
$menuRecherche[] = Array("url"=>"#adresse","label"=>"Adresse");
$menuRecherche[] = Array("url"=>"#photos","label"=>"Photos");
$menuRecherche[] = Array("url"=>"#horaires","label"=>"Horaires");
$menuRecherche[] = Array("url"=>"#crit","label"=>"Critiques");

// recuperation des donnees GET, POST, et SESSION
$idF = $_GET["idF"];

// appel des fonctions permettant de recuperer les donnees utiles a l'affichage 
$unFete = getFeteByidF($idF);

$lesTypesGastronomie = getTypesGastronomieByidF($idF);
$lesPhotos = getPhotosByidF($idF);
$noteMoy = round(getNoteMoyenneByidF($idF), 0);
$mailU = getMailULoggedOn();
$aimer = getAimerById($mailU, $idF);
$critiques = getCritiquerByidF($idF);


// appel du script de vue qui permet de gerer l'affichage des donnees
$titre = "detail d'un fête";
include "$racine/vue/entete.html.php";
include "$racine/vue/vueDetailFete.php";
include "$racine/vue/pied.html.php";