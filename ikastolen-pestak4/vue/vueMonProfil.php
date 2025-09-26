<h1>Mon profil</h1>

Mon adresse électronique : <?= $util["mailU"] ?> <br/>
Mon pseudo : <?= $util["pseudoU"] ?> <br/>

<hr>

les fêtes que j'aime : <br/>
<?php for ($i = 0; $i < count($mesFetesAimees); $i++) { ?>
    <a href="./?action=detail&idF=<?= $mesFetesAimees[$i]["idF"] ?>"><?= $mesFetesAimees[$i]["nomF"] ?></a><br/>
<?php } ?>
<hr>
les types de gastronomie que j'aime :
<ul id="tagFood">
    <?php for ($i = 0; $i < count($mesTypeGastronomieAimees); $i++) { ?>
        <li class="tag"><span class="tag">#</span><?= $mesTypeGastronomieAimees[$i]["libelleTG"] ?></li>
    <?php } ?>
</ul>
<hr>
<a href="./?action=deconnexion">Se déconnecter</a>