<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <link rel="icon" href="../images/ikastola.ico">
    <title><?php echo $titre ?></title>
    <style type="text/css">
        @import url("css/base.css");
        /*https://developer.mozilla.org/fr/docs/Web/CSS/@import*/
        @import url("css/form.css");
        @import url("css/cgu.css");
        @import url("css/corps.css");
    </style>
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
</head>
<body>
<nav>
    <ul id="menuGeneral">
        <li><a href="./?action=accueil">Accueil</a></li>
        <li><a href="./?action=recherche"><img src="images/rechercher.png" alt="loupe"/>Recherche</a></li>
        <li><a href="./?action=liste">Liste</a></li>
        <li id="logo"><a href="./?action=accueil"><img src="images/logoBarre.png" alt="logo"/></a></li>
        <li></li>
        <li><a href="./?action=cgu">CGU</a></li>
        <?php if (isLoggedOn()) { ;?>
            <li><a href="./?action=profil"><img src="images/profil.png" alt="profil"/> <?= $_SESSION["pseudoU"] ?></a></li>
        <?php } else { ?>
            <li><a href="./?action=connexion"><img src="images/profil.png" alt="connexion"/>Connexion</a></li>
        <?php } ?>
    </ul>
</nav>
<div id="bouton">
    <div></div>
    <div></div>
    <div></div>
</div>
<ul id="menuContextuel">
    <li><img src="images/logoBarre.png" alt="logo fédération des Ikastola"/></li>
    <?php if (isset($menuRecherche)) { ?>
        <?php for ($i = 0; $i < count($menuRecherche); $i++) { ?>
            <li>
                <a href="<?php echo $menuRecherche[$i]['url']; ?>">
                    <?php echo $menuRecherche[$i]['label']; ?>
                </a>
            </li>
        <?php } ?>
    <?php } ?>
</ul>
<div id="corps">