<h1><?= $uneFete['nomF']; ?></h1>

<span id="note"></span>
<section>
    Gastronomie <br/>
</section>
<p id="principal">
    <?= $uneFete['descF']; ?>
</p>
<h2 id="adresse">
    Adresse
</h2>
<p>
    <?= $uneFete['numAdrF']; ?>
    <?= $uneFete['voieAdrF']; ?><br/>
    <?= $uneFete['cpF']; ?>
    <?= $uneFete['villeF']; ?>
</p>

<h2 id="photos">
    Photos
</h2>
<ul id="galerie">
</ul>

<h2 id="horaires">
    Concerts et spectacles
</h2>
<?= $uneFete['horairesF']; ?>

<h2 id="crit">Critiques</h2>
<ul id="critiques">
</ul>

