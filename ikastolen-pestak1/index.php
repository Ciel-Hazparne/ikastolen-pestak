<?php
include "getRacine.php";
include "$racine/controleur/controleurPrincipal.php";

if (isset($_GET["action"])) {
    $action = $_GET["action"];
} else {
    $action = "defaut";
}

$fichier = controleurPrincipal($action);
/*var_dump($fichier);
die();*/
include "$racine/controleur/$fichier";