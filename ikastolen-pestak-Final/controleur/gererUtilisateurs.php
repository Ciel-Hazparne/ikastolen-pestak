<?php

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
include_once "$racine/modele/bd.utilisateur.inc.php";
// creation du menu de recherche
$menuRecherche = array();
$menuRecherche[] = Array("url" => "./?action=gererUtilisateurs", "label" => "modifier ou supprimer un utilisateur");
$menuRecherche[] = Array("url" => "./?action=ajouterUtilisateur", "label" => "ajouter un utilisateur");

$listeUtilisateurs = getUtilisateurs();
$utilAdmin = getAdmin();
$mailAdmin = $utilAdmin["mailU"];
$mailU = getMailULoggedOn();

if ($mailAdmin == $mailU) {
// appel du script de vue qui permet de gerer l'affichage des donnees
    $titre = "Gestion utilisateurs";
    include "$racine/vue/enteteAdmin.html.php";
    include "$racine/vue/vueGererUtilisateurs.php";
    include "$racine/vue/pied.html.php";
}else{
    include "$racine/vue/entete.html.php";
    include "$racine/vue/msg/vueMessageAccesInterdit.php";
}
