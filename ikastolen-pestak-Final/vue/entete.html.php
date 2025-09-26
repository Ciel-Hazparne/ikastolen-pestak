<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <link rel="icon" href="../images/ikastola.ico">
    <title><?php echo $titre ?></title>
    <style type="text/css">
        @import url("/assets/css/base.css");
        @import url("/assets/css/form.css");
        @import url("/assets/css/cgu.css");
        @import url("/assets/css/corps.css");
        @import url("/assets/font-awesome/css/font-awesome.css");
    </style>
</head>
<body>
<nav>
    <ul id="menuGeneral">
        <li><a href="./?action=accueil"><i class="fa fa-home"></i> Accueil</a></li>
        <li><a href="./?action=recherche"><i class="fa fa-search"></i> Recherche</a></li>
        <li><a href="./?action=liste"><i class="fa fa-th-list"></i> Liste</a></li>
        <li id="logo"><a href="./?action=accueil"><img src="images/logoBarre.png" alt="logo"/></a></li>
        <li></li>
        <li><a href="./?action=cgu"><i class="fa fa-file-text-o"></i> CGU</a></li>
        <?php if (isLoggedOn()) { ;?>
            <li><a href="./?action=profil"><i class="fa fa-user"></i> <?= $_SESSION["pseudoU"] ?></a>
                <ul class="sousMenu">
                    <li><a href="./?action=profil"><i class="fa fa-product-hunt"></i></i> Mon profil</a></li>
                    <li><a href="./?action=updtProfil"><i class="fa fa-pencil-square-o"></i> Mise à jour profil</a></li>
                </ul>
            </li>
        <?php } else { ?>
            <li><a href="./?action=connexion"><i class="fa fa-sign-in"></i> Connexion</a></li>
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