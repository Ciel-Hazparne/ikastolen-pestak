<h1>Liste des fêtes</h1>

<?php
for ($i = 0; $i < count($listeFetes); $i++) {

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
            </ul>
        </div>
    </div>
    <?php
}
?>


