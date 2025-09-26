<?php

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
include_once "$racine/modele/authentification.inc.php";
include_once "$racine/modele/bd.utilisateur.inc.php";

// init messages
$mailU = $_GET['mailU'];
$updtUtilisateur = getUtilisateurByMailU($mailU);
$messageMdp = "";

$utilAdmin = getAdmin();
$mailAdmin = $utilAdmin["mailU"];
$mailUlogged = getMailULoggedOn();

if ($mailAdmin == $mailUlogged) {
    $mailU = $_POST['mailU'];
    // traitement si necessaire des donnees recuperees

    if (isset($_POST["pseudoU"])){
        $pseudoU = $_POST["pseudoU"];
        if ($pseudoU!=""){
            updtPseudoUtilisateur($mailU, $pseudoU);
        }
    }

    if (isset($_POST["mdpU"]) && isset($_POST["mdpU2"])) {
        if ($_POST["mdpU"] != "") {
            if (($_POST["mdpU"] == $_POST["mdpU2"])) {
                updtMdpUtilisateur($mailU, $_POST["mdpU"]);
            } else {
                $messageMdp = "erreur de saisie du mot de passe";
            }
        }
    }

    if (isset($_POST["admin"])){
        $admin = $_POST["admin"];
        if ($admin == "1"){
            updtAdminUtilisateur($admin, $mailU);
        }
    }

    // appel du script de vue qui permet de gerer l'affichage des donnees
    $titre = "Mise à jour utilisateur";
    include "$racine/vue/enteteAdmin.html.php";
    include "$racine/vue/vueUpdtUtilisateur.php";
    include "$racine/vue/pied.html.php";
}
else{
    $titre = "Mon profil";
    include "$racine/vue/entete.html.php";
    include "$racine/vue/msg/vueMessageAccesInterdit";
    include "$racine/vue/pied.html.php";
}