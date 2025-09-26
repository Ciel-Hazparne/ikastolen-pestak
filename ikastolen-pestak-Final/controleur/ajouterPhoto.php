<?php

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
include_once "$racine/modele/bd.photo.inc.php";
include_once "$racine/modele/authentification.inc.php";
$dossier = 'photos/';
$fichier = basename($_FILES['uploadPhoto']['name']);
$taille_maxi = 100000;
$taille = filesize($_FILES['uploadPhoto']['tmp_name']);
$extensions = array('.png', '.gif', '.jpg', '.jpeg', '.PNG', '.GIF', '.JPG', '.JPEG');
$extension = strrchr($_FILES['uploadPhoto']['name'], '.');  // strrchr — Trouve la dernière occurrence d'un caractère dans une chaîne (on cherche à vérifier l'extension
if (!in_array($extension, $extensions)) { //Si l'extension n'est pas dans le tableau
    $erreur = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg';
}
if ($taille > $taille_maxi) {
    $erreur = 'Le fichier est trop gros, il ne doit pas dépasser 100Ko !';
}
if (!isset($erreur)) { //S'il n'y a pas d'erreur, on upload

    //On formate le nom du fichier ici...
    $fichier = strtr($fichier,
        'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
        'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
    $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
    move_uploaded_file($_FILES['uploadPhoto']['tmp_name'], $dossier . $fichier);
    $idF = $_GET["idF"];
    $cheminP = $fichier;
    addPhoto($cheminP, $idF);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
} else {
    $idF = $_GET["idF"];
    include "$racine/vue/entete.html.php";
    ?>
    <div id="alerte">
        <strong><?= $erreur ?></strong>
        <?= "<a href='./?action=detail&idF=$idF'>Veuillez recommencer</a>"; ?>
    </div>
<?php } ?>