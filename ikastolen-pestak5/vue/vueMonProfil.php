
<h1>Mon profil</h1>

Mon adresse électronique : <?= $util["mailU"] ?> <br />
Mon pseudo : <?= $util["pseudoU"] ?> <br />

<hr>

les fêtes que j'aime : <br />
<?php for($i=0;$i<count($mesFetesAimes);$i++){ ?>
    <a href="./?action=detail&idF=<?= $mesFetesAimes[$i]["idF"] ?>"><?= $mesFetesAimes[$i]["nomF"] ?></a><br />
<?php } ?>
<hr>
les types de gastronomie que j'aime :
<ul id="tagFood">		
<?php for($i=0;$i<count($mesTypeGastronomieAimes);$i++){ ?>
    <li class="tag"><span class="tag">#</span><?= $mesTypeGastronomieAimes[$i]["libelleTC"] ?></li>
<?php } ?>
</ul>
<hr>
<a href="./?action=deconnexion">se deconnecter</a>


