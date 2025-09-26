<?php
if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
include_once "$racine/modele/authentification.inc.php";

// creation du menu de recherche
$menuRecherche = array();
$menuRecherche[] = Array("url" => "./?action=connexion", "label" => "Connexion");
$menuRecherche[] = Array("url" => "./?action=inscription", "label" => "Inscription");

// recuperation des donnees GET, POST, et SESSION
if (!isset($_POST["mailU"]) || !isset($_POST["mdpU"])) {
    // on affiche le formulaire de connexion
    $titre = "authentification";
    include "$racine/vue/entete.html.php";
    include "$racine/vue/vueAuthentification.php";
    include "$racine/vue/pied.html.php";
} else {
// à compléter
}