<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
include_once "$racine/modele/bd.fete.inc.php";
include_once "$racine/modele/bd.photo.inc.php";

// recuperation des donnees GET, POST, et SESSION
;

// appel des fonctions permettant de recuperer les donnees utiles a l'affichage 
$listeFetes = getFetes();

// traitement si necessaire des donnees recuperees
;

// appel du script de vue qui permet de gerer l'affichage des donnees
$titre = "Liste des fêtes répertoriés";
include "$racine/vue/entete.html.php";
include "$racine/vue/vueListeFetes.php";
include "$racine/vue/pied.html.php";