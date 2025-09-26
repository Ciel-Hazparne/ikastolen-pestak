<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
include_once "$racine/modele/bd.fete.inc.php";
include_once "$racine/modele/bd.typeGastronomie.inc.php";
include_once "$racine/modele/bd.photo.inc.php";

// creation du menu de recherche
$menuRecherche = array();
$menuRecherche[] = Array("url"=>"./?action=recherche&critere=nom","label"=>"Recherche par nom");
$menuRecherche[] = Array("url"=>"./?action=recherche&critere=adresse","label"=>"Recherche par adresse");
$menuRecherche[] = Array("url"=>"./?action=recherche&critere=type","label"=>"Recherche par type de gastronomie");
$menuRecherche[] = Array("url"=>"./?action=recherche&critere=multi","label"=>"Recherche multicritère");


// recuperation des donnees GET, POST, et SESSION
;

// appel des fonctions permettant de recuperer les donnees utiles a l'affichage 
$listeFetes = getTop4Fetes();

// traitement si necessaire des donnees recuperees
;

// appel du script de vue qui permet de gerer l'affichage des donnees

$mailU = getMailULoggedOn();
$utilAdmin = getAdmin();
$mailAdmin = $utilAdmin["mailU"];

if ($mailAdmin == $mailU) {
    $titre = "Accueil - ikastolen-pestak.eus";
    include "$racine/vue/enteteAdmin.html.php";
    include "$racine/vue/vueAccueil.php";
    include "$racine/vue/pied.html.php";
}
else{
    // appel du script de vue qui permet de gerer l'affichage des donnees
    $titre = "Accueil - ikastolen-pestak.eus";
    include "$racine/vue/entete.html.php";
    include "$racine/vue/vueAccueil.php";
    include "$racine/vue/pied.html.php";
}