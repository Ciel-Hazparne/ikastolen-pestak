<h1><?= $uneFete['NomF']; ?>
</h1>

<span id="note">
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
</ul>

