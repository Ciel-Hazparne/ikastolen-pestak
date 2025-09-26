<div id="accroche">Decouvrez les spécialités gastronomiques des fêtes des ikastola avec ikastolen-pestak.eus</div>

<h1>Top 4 des fêtes les plus gourmandes</h1>
<?php
for ($i = 0; $i < count($listeFetes); $i++) {
    ?>
    <?php
    $lesTypesGastronomie = getTypesGastronomieByidF($listeFetes[$i]['idF']);
    $lesPhotos = getPhotosByidF($listeFetes[$i]['idF']);
    ?>
    <div class="card">
        <div class="photoCard">
            <?php if (count($lesPhotos) > 0) { ?>
                <img src="photos/<?= $lesPhotos[0]["cheminP"] ?>" alt="photo de la fête"/>
            <?php } ?>
        </div>
        <div class="descrCard"><?php echo "<a href='./?action=detail&idF=" . $listeFetes[$i]['idF'] . "'>" . $listeFetes[$i]['nomF'] . "</a>"; ?>
            <br/>
            <?= $listeFetes[$i]["numAdrF"] ?>
            <?= $listeFetes[$i]["voieAdrF"] ?>
            <br/>
            <?= $listeFetes[$i]["cpF"] ?>
            <?= $listeFetes[$i]["villeF"] ?>
        </div>
        <div class="tagCard">
            <ul id="tagFood">
                <?php for ($j = 0; $j < count($lesTypesGastronomie); $j++) { ?>
                    <li class="tag"><span class="tag">#</span><?= $lesTypesGastronomie[$j]["libelleTG"] ?></li>
                <?php } ?>
            </ul>
        </div>
    </div>
    <?php
}
?>
<div id="galerie"> <p>Classement basé sur les ressentis des visiteurs.</p></div>