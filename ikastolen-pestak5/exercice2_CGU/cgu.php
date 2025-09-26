<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}


// recuperation des donnees GET, POST, et SESSION

// appel des fonctions permettant de recuperer les donnees utiles a l'affichage 

// traitement si necessaire des donnees recuperees
// creation du menu recherche
$menuRecherche = array();
$menuRecherche[] = Array("url"=>"#top","label"=>"Conditions générales");
$menuRecherche[] = Array("url"=>"#accpt","label"=>"Acceptation");
$menuRecherche[] = Array("url"=>"#desc","label"=>"Description");
$menuRecherche[] = Array("url"=>"#fonc","label"=>"Fonctionnalités");
$menuRecherche[] = Array("url"=>"#mode","label"=>"Modération");
$menuRecherche[] = Array("url"=>"#sanc","label"=>"Sanctions");
$menuRecherche[] = Array("url"=>"#moti","label"=>"Motifs");
$menuRecherche[] = Array("url"=>"#foncr","label"=>"Organisateurs");
$menuRecherche[] = Array("url"=>"#gene","label"=>"Généralités");
$menuRecherche[] = Array("url"=>"#prot","label"=>"Données personnelles");
$menuRecherche[] = Array("url"=>"#droi","label"=>"Droits d'accès");
$menuRecherche[] = Array("url"=>"#util","label"=>"Données personnelles");
$menuRecherche[] = Array("url"=>"#bila","label"=>"Bilan des fonctionnalités");



// appel du script de vue qui permet de gerer l'affichage des donnees
$titre = "CGU - ikastolen-pestak.eus";
include "$racine/vue/entete.html.php";
include "$racine/vue/vueCgu.php";
include "$racine/vue/pied.html.php";