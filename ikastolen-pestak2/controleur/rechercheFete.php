<?php
if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
include_once "$racine/modele/bd.fete.inc.php";
include_once "$racine/modele/bd.typeGastronomie.inc.php";
include_once "$racine/modele/bd.photo.inc.php";

// creation du menu de recherche
$menuRecherche = array();
$menuRecherche[] = Array("url" => "./?action=recherche&critere=nom", "label" => "Recherche par nom");
$menuRecherche[] = Array("url" => "./?action=recherche&critere=adresse", "label" => "Recherche par adresse");
$menuRecherche[] = Array("url" => "./?action=recherche&critere=type", "label" => "Recherche par type de gastronomie");
$menuRecherche[] = Array("url" => "./?action=recherche&critere=multi", "label" => "Recherche multicritère");

// critere de recherche par defaut
$critere = "nom";
if (isset($_GET["critere"])) {
    $critere = $_GET["critere"];
}

// recuperation des donnees GET, POST, et SESSION
// recherche par nom à compléter
$nomF = "";

// recherche par adresse à compléter
$voieAdrF = "";

$cpF = "";

$villeF = "";


// appel des fonctions permettant de recuperer les donnees utiles a l'affichage
// Si on provient du formulaire de recherche : $critere indique le type de recherche à effectuer
if (!empty($_POST)) {
    switch ($critere) {
        case 'nom':
            // recherche par nom à compléter

        case 'adresse':
            // recherche par adresse à compléter

    }
}
// traitement si necessaire des donnees recuperees
;

// appel du script de vue qui permet de gerer l'affichage des donnees
$titre = "Recherche d'une fête";
include "$racine/vue/entete.html.php";
include "$racine/vue/vueRechercheFete.php";
include "$racine/vue/pied.html.php";