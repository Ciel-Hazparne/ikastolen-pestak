<?php

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
include_once "$racine/modele/bd.utilisateur.inc.php";

// creation du menu de recherche
$menuRecherche = array();
$menuRecherche[] = Array("url" => "./?action=gererUtilisateurs", "label" => "modifier ou supprimer un utilisateur");
$menuRecherche[] = Array("url" => "./?action=ajouterUtilisateur", "label" => "ajouter un utilisateur");


$inscrit = false;
$msg = "";
// recuperation des donnees GET, POST, et SESSION
if (isset($_POST["mailU"]) && isset($_POST["mdpU"]) && isset($_POST["mdpU2"]) && isset($_POST["pseudoU"])) {

    if ($_POST["mailU"] != "" && $_POST["mdpU"] != "" && $_POST["mdpU2"] != "" && $_POST["pseudoU"] != "") {
        if (($_POST["mdpU"] == $_POST["mdpU2"])) {
            $mailU = $_POST["mailU"];
            $mdpU = $_POST["mdpU"];
            $pseudoU = $_POST["pseudoU"];
            $admin = $_POST["admin"];

            // enregistrement des donnees
            $ret = addUtilisateur($mailU, $mdpU, $pseudoU, $admin);
            if ($ret) {
                $inscrit = true;
            } else {
                $msg = "l'utilisateur n'a pas été enregistré.";
            }
        } else {
            $msg = "erreur de saisie du mot de passe";
        }

    } else {
        $msg = "Renseigner tous les champs...";
    }
}

if ($inscrit) {
    // appel du script de vue qui permet de gerer l'affichage des donnees
    $titre = "Inscription confirmée";
    include "$racine/vue/enteteAdmin.html.php";
    include "$racine/vue/msg/vueConfirmationEnregistrement.php";
    include "$racine/vue/pied.html.php";
} else {
    // appel du script de vue qui permet de gerer l'affichage des donnees
    $titre = "Inscription à retenter";
    include "$racine/vue/enteteAdmin.html.php";
    include "$racine/vue/vueAjouterUtilisateur.php";
    include "$racine/vue/pied.html.php";
}