<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
include_once "$racine/modele/bd.fete.inc.php";
include_once "$racine/modele/bd.typeGastronomie.inc.php";
include_once "$racine/modele/bd.photo.inc.php";

// creation du menu burger
$menuRecherche = array();
$menuRecherche[] = Array("url"=>"./?action=recherche&critere=nom","label"=>"Recherche par nom");
$menuRecherche[] = Array("url"=>"./?action=recherche&critere=adresse","label"=>"Recherche par adresse");

// critere de recherche par defaut
$critere = "nom";
if (isset($_GET["critere"])) {
    $critere = $_GET["critere"];
}

// recuperation des donnees GET, POST, et SESSION
if (isset($_GET["critere"])){
    $critere = $_GET["critere"];
}
$nomF="";
if (isset($_POST["nomF"])){
    $nomF = $_POST["nomF"];
}
$voieAdrF="";
if (isset($_POST["voieAdrF"])){
    $voieAdrF = $_POST["voieAdrF"];
}
$cpF="";
if (isset($_POST["cpF"])){
    $cpF = $_POST["cpF"];
}
$villeF="";
if (isset($_POST["villeF"])){
    $villeF = $_POST["villeF"];
}
$tabIdTG = array();
if(isset($_POST["tabIdTG"])){
    $tabIdTG = $_POST["tabIdTG"];
}


// appel des fonctions permettant de recuperer les donnees utiles a l'affichage 


switch($critere){
    case 'nom':
        // recherche par nom
        $listeFetes = getFetesByNomF($nomF);
        break;
    case 'adresse':
        // recherche par adresse
        $listeFetes = getFetesByAdresse($voieAdrF, $cpF, $villeF);
        break;    
}

// traitement si necessaire des donnees recuperees
;

// appel du script de vue qui permet de gerer l'affichage des donnees
$titre = "Recherche d'un fêtes";
include "$racine/vue/entete.html.php";
include "$racine/vue/vueRechercheFete.php";
if (!empty($_POST)) {
    // affichage des resultats de la recherche
    include "$racine/vue/vueResultRecherche.php";
}
include "$racine/vue/pied.html.php";