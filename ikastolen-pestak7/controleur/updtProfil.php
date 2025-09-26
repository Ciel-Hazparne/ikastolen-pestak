<?php

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
include_once "$racine/modele/authentification.inc.php";
include_once "$racine/modele/bd.utilisateur.inc.php";
include_once "$racine/modele/bd.typeGastronomie.inc.php";
include_once "$racine/modele/bd.fete.inc.php";
include_once "$racine/modele/bd.aimer.inc.php";
include_once "$racine/modele/bd.preferer.inc.php";

// creation du menu de recherche
$menuRecherche = array();
$menuRecherche[] = Array("url" => "./?action=profil", "label" => "Consulter mon profil");
$menuRecherche[] = Array("url" => "./?action=updtProfil", "label" => "Modifier mon profil");

// init messages 
$msg = "";

// recuperation des donnees GET, POST, et SESSION
if (isLoggedOn()) {
    $mailU = getMailULoggedOn();
    $util = getUtilisateurByMailU($mailU);

        // traitement si necessaire des donnees recuperees

    if (isset($_POST["pseudoU"])){
        $pseudoU = $_POST["pseudoU"];
        if ($pseudoU!=""){
            updtPseudoUtilisateur($mailU, $pseudoU);
        }
    }
    
    if (isset($_POST["mdpU"]) && isset($_POST["mdpU2"])) {
        if ($_POST["mdpU"] != "" && $_POST["mdpU2"] != "") {
            if (($_POST["mdpU"] == $_POST["mdpU2"])) {
                updtMdpUtilisateur($mailU, $_POST["mdpU"]);
            } else {
                $msg = "erreur de saisie du mot de passe";
            }
        }
    }

    if (isset($_POST["lstidF"])) {
        $lstidF = $_POST["lstidF"];
        for ($i = 0; $i < count($lstidF); $i++) {
            delAimer($mailU, $lstidF[$i]);
        }
    }
    
    //addLstidTG
    if (isset($_POST["addLstidTG"])) {
        $addLstidTG = $_POST["addLstidTG"];
        for ($i = 0; $i < count($addLstidTG); $i++) {
            addPreferer($mailU, $addLstidTG[$i]);
        }
    }
    
    //delLstidTG
    if (isset($_POST["delLstidTG"])) {
        $delLstidTG = $_POST["delLstidTG"];
        for ($i = 0; $i < count($delLstidTG); $i++) {
            delPreferer($mailU, $delLstidTG[$i]);
        }
    }

    
    // appel des fonctions permettant de recuperer les donnees utiles a l'affichage 
    $mesFetesAimees = getFetesAimesByMailU($mailU);
    $mesTypeGastronomieAimes = getTypesGastronomiePrefereesByMailU($mailU);
    $lesAutresTypesGastronomie = getTypesGastronomieNonPrefereesByMailU($mailU);
    
    // appel du script de vue qui permet de gerer l'affichage des donnees

    $mailU = getMailULoggedOn();
    $utilAdmin = getAdmin();
    $mailAdmin = $utilAdmin["mailU"];

    if ($mailAdmin == $mailU) {
        $titre = "Mon profil";
        include "$racine/vue/enteteAdmin.html.php";
        include "$racine/vue/vueUpdtProfil.php";
        include "$racine/vue/pied.html.php";
    }
    else{
        // appel du script de vue qui permet de gerer l'affichage des donnees
        $titre = "Mon profil";
        include "$racine/vue/entete.html.php";
        include "$racine/vue/vueUpdtProfil.php";
        include "$racine/vue/pied.html.php";
    }
}
