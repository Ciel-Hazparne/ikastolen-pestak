
<h1>Mon profil</h1>

Mon adresse électronique : <?= $util["mailU"] ?> <br />
Mon pseudo : <?= $util["pseudoU"] ?> <br />

<hr>

Les fêtes que j'aime : <br />
<?php for($i=0;$i<count($mesFetesAimees);$i++){ ?>
    <a href="./?action=detail&idF=<?= $mesFetesAimees[$i]["idF"] ?>"><?= $mesFetesAimees[$i]["nomF"] ?></a><br />
<?php } ?>
<hr>
Les types de gastronomie que j'aime :
<ul id="tagFood">		
<?php for($i=0;$i<count($mesTypeGastronomieAimes);$i++){ ?>
    <li class="tag"><span class="tag">#</span><?= $mesTypeGastronomieAimes[$i]["libelleTG"] ?></li>
<?php } ?>
</ul>
<hr>
<a href="./?action=deconnexion">se deconnecter</a>


