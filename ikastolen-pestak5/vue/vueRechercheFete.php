
<h1>Recherche d'un fête</h1>
<form action="./?action=recherche&critere=<?= $critere ?>" method="POST">


    <?php
    switch ($critere) {
        case "nom":
            ?>
            Recherche par nom : <br />
            <input type="text" name="nomF" placeholder="nom" value="<?= $nomF ?>" /><br />
            <?php
            break;
        case "adresse":
            ?>
            Recherche par adresse : <br />
            <input type="text" name="villeF" placeholder="ville" value="<?= $villeF ?>"/><br />
            <input type="text" name="cpF" placeholder="code postal" value="<?= $cpF ?>"/><br />
            <input type="text" name="voieAdrF" placeholder="rue" value="<?= $voieAdrF ?>"/><br />
            <?php
            break;

    }
    ?>
    <br /><br />
    <input type="submit" value="Rechercher" />

</form>
