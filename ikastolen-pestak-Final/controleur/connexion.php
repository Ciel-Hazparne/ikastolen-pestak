<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
include_once "$racine/modele/authentification.inc.php";

// creation du menu de recherche
$menuRecherche = array();
$menuRecherche[] = Array("url"=>"./?action=connexion","label"=>"Connexion");
$menuRecherche[] = Array("url"=>"./?action=inscription","label"=>"Inscription");

// recuperation des donnees GET, POST, et SESSION
if (!isset($_POST["mailU"]) || !isset($_POST["mdpU"])){
    // on affiche le formulaire de connexion
    $titre = "authentification";
    include "$racine/vue/entete.html.php";
    include "$racine/vue/vueAuthentification.php";
    include "$racine/vue/pied.html.php";
}
else
{
    $mailU=$_POST["mailU"];
    $mdpU=$_POST["mdpU"];
    $util = getAdmin();
    $mailAdmin = $util["mailU"];
    $mailUadmin = getMailULoggedOn();
    
    login($mailU,$mdpU);

    if (isLoggedOn()){ // si l'utilisateur est connecté on redirige vers le controleur monProfil
        if ($mailU == $mailUadmin) { // si l'utilisateur est admin on affiche la nav bar admin
            include "$racine/vue/enteteAdmin.html.php";
            include "$racine/controleur/monProfil.php";
            include "$racine/vue/pied.html.php";
        }else{
        include "$racine/controleur/monProfil.php";
        }
    }
    else{
        // l'utilisateur n'est pas connecté, on affiche le formulaire de connexion
        $titre = "authentification";
        include "$racine/vue/entete.html.php";
        include "$racine/vue/vueAuthentification.php";
        include "$racine/vue/pied.html.php";
    }
}