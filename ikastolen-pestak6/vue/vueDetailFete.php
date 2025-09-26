<h1><?= $uneFete['nomF']; ?>

    <?php if ($aimer != false) { ?>
        <a href="./?action=aimer&idF=<?= $uneFete['idF']; ?>" ><img class="aimer" src="images/aime.png" alt="j'aime cette fête"></a>
    <?php } else { ?>
        <a href="./?action=aimer&idF=<?= $uneFete['idF']; ?>" ><img class="aimer" src="images/aimepas.png" alt="je n'aime pas encore cette fête"></a>
    <?php } ?>

</h1>

<span id="note">
    <?php for ($i = 1; $i <= 5; $i++) { ?>
        <a class="aimer" href="./?action=noter&note=<?= $i ?>&idF=<?= $uneFete['idF']; ?>" >
            <?php if ($i <= $noteMoy) { ?>
                <img class="note" src="images/like.png" alt="">
            <?php } else {
                ?>
                <img class="note" src="images/neutre.png" alt="like neutre">
            <?php } ?>
        </a>
    <?php } ?>
</span>
<section>
    Gastronomie <br />
    <ul id="tagFood">		
        <?php for ($j = 0; $j < count($lesTypesGastronomie); $j++) { ?>
            <li class="tag"><span class="tag">#</span><?= $lesTypesGastronomie[$j]["libelleTG"] ?></li>
        <?php } ?>
    </ul>

</section>
<p id="principal">
    <?php if (count($lesPhotos) > 0) { ?>
        <img src="photos/<?= $lesPhotos[0]["cheminP"] ?>" alt="photos de la fête" />
    <?php } ?>
    <br />
    <?= $uneFete['descF']; ?>
</p>
<h2 id="adresse">
    Adresse
</h2>
<p>
    <?= $uneFete['numAdrF']; ?>
    <?= $uneFete['voieAdrF']; ?><br />
    <?= $uneFete['cpF']; ?>
    <?= $uneFete['villeF']; ?>

</p>

<h2 id="photos">
    Photos
</h2>
<ul id="galerie">
    <?php for ($i = 0; $i < count($lesPhotos); $i++) { ?>
        <li> <img class="galerie" src="photos/<?= $lesPhotos[$i]["cheminP"] ?>" alt="" /></li>
    <?php } ?>

</ul>

<h2 id="horaires">
    Concerts et spectacles
</h2> 
<?= $uneFete['horairesF']; ?>


<h2 id="crit">Critiques</h2>

<ul id="critiques">
    <?php for ($i = 0; $i < count($critiques); $i++) { ?>
        <li>
            <span>
                <?= $critiques[$i]["mailU"] ?> 
                <?php if ($critiques[$i]["mailU"] == $mailU) { ?>
                    <a href='./?action=supprimerCritique&idF=<?= $uneFete['idF']; ?>'>Supprimer</a>
                <?php } ?>
            </span>
            <div>
                <span>
                    <?php
                    if ($critiques[$i]["note"]) {
                        echo $critiques[$i]["note"] . "/5";
                    }
                    ?>
                </span>
                <span><?= $critiques[$i]["commentaire"] ?> </span>
            </div>

        </li>
    <?php } ?>

</ul>

<?php
if ($mailU) {
    ?>
    <form action="./?action=commenter&idF=<?= $uneFete['idF']; ?>" method="POST">
        <textarea id="commentaireForm" name="commentaire"><?= $monCommentaire ?></textarea><br />
        <input type="submit" value="Enregistrer le commentaire" />
    </form>

    <?php
}
?>