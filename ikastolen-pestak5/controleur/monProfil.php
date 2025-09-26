<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
include_once "$racine/modele/authentification.inc.php";
include_once "$racine/modele/bd.utilisateur.inc.php";
include_once "$racine/modele/bd.typeGastronomie.inc.php";
include_once "$racine/modele/bd.fete.inc.php";

// creation du menu recherche
$menuRecherche = array();
$menuRecherche[] = Array("url"=>"./?action=profil","label"=>"Consulter mon profil");
$menuRecherche[] = Array("url"=>"./?action=updProfil","label"=>"Modifier mon profil");


// recuperation des donnees GET, POST, et SESSION

// appel des fonctions permettant de recuperer les donnees utiles a l'affichage 
if (isLoggedOn()){
    $mailU = getMailULoggedOn();
    $util = getUtilisateurByMailU($mailU);
    
    $mesFetesAimes = getFetesAimesByMailU($mailU);
    
    $mesTypeGastronomieAimes = getTypesGastronomiePrefereesByMailU($mailU);
    // traitement si necessaire des donnees recuperees


    // appel du script de vue qui permet de gerer l'affichage des donnees
    $titre = "Mon profil";
    include "$racine/vue/entete.html.php";
    include "$racine/vue/vueMonProfil.php";
    include "$racine/vue/pied.html.php";
}
else{
    $titre = "Mon profil";
    include "$racine/vue/entete.html.php";
    include "$racine/vue/pied.html.php";
}