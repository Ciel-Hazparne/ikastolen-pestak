<?php

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
include_once "$racine/modele/bd.utilisateur.inc.php";

// creation du menu de recherche
$menuRecherche = array();
$menuRecherche[] = Array("url"=>"./?action=connexion","label"=>"Connexion");
$menuRecherche[] = Array("url"=>"./?action=inscription","label"=>"Inscription");


$inscrit = false;
$msg="";
// recuperation des donnees GET, POST, et SESSION
if (isset($_POST["mailU"]) && isset($_POST["mdpU"]) && isset($_POST["mdpU2"]) && isset($_POST["pseudoU"])) {

    if ($_POST["mailU"] != "" && $_POST["mdpU"] != "" && $_POST["mdpU2"] != "" && $_POST["pseudoU"] != "") {
        if (($_POST["mdpU"] !== $_POST["mdpU2"])) {
            $msg = "erreur de saisie du mot de passe";
        }
            $mailU = $_POST["mailU"];
            if (filter_var($mailU, FILTER_VALIDATE_EMAIL) === false) {
                $msg = "La syntaxe de votre adresse e-mail n'est pas correcte.";
            } else {
                $mdpU = strip_tags($_POST["mdpU"]);
                $pseudoU = strip_tags($_POST["pseudoU"]);

                // enregistrement des donnees
                $ret = enrollUtilisateur($mailU, $mdpU, $pseudoU);
                if ($ret) {
                    $inscrit = true;
                } else {
                    $msg = "l'utilisateur n'a pas été enregistré.";
                }
            }
        }
    else {
            $msg = "Renseigner tous les champs...";
        }
}

if ($inscrit) {
    // appel du script de vue qui permet de gerer l'affichage des donnees
    $titre = "Inscription confirmée";
    include "$racine/vue/entete.html.php";
    include "$racine/vue/msg/vueConfirmationInscription.php";
    include "$racine/vue/pied.html.php";
} else {
    // appel du script de vue qui permet de gerer l'affichage des donnees
    $titre = "Inscription à retenter";
    include "$racine/vue/entete.html.php";
    include "$racine/vue/vueInscription.php";
    include "$racine/vue/pied.html.php";
}