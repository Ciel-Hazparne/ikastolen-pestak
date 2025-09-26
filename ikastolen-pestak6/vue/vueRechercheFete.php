
<h1>Recherche d'une fête</h1>
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
        case "type":
            ?> 
            Recherche par type de gastronomie :<br />
            Sélectionner un ou plusieurs types de gastronomie<br />
            <?php
            // mes types de gastronomie
            for ($i = 0; $i < count($mesTypeGastronomieAimes); $i++) {
                if (count($tabidTG) == 0) {
                    $check = "checked"; // on ne provient pas du formulaire de recherche
                } else {
                    $check = ""; // on provient du formulaire de recherche, checked sera peut etre fait dans la condition suivante

                    if (in_array($mesTypeGastronomieAimes[$i]['idTG'], $tabidTG)) {
                        $check = "checked";
                    }
                }
                ?>
                <input type="checkbox" <?= $check ?> name="tabidTG[]" id="aime<?= $i ?>" value="<?= $mesTypeGastronomieAimes[$i]['idTG'] ?>" >
                <label for="aime<?= $i ?>"><?= $mesTypeGastronomieAimes[$i]['libelleTG'] ?></label><br />
                <?php
            }
            // les autres types de gastronomie
            for ($i = 0; $i < count($lesAutresTypesGastronomie); $i++) {
                $check = "";
                if (in_array($lesAutresTypesGastronomie[$i]['idTG'], $tabidTG)) {
                    $check = "checked";
                }
                ?>
                <input type="checkbox" <?= $check ?> name="tabidTG[]" id="autres<?= $i ?>" value="<?= $lesAutresTypesGastronomie[$i]['idTG'] ?>" >
                <label for="autres<?= $i ?>"><?= $lesAutresTypesGastronomie[$i]['libelleTG'] ?></label><br />
                <?php
            }
            ?>  <br /><?php
            break;
        case "multi":
            ?>
            Recherche multi-critères<br />
            <input type="text" name="nomF" placeholder="nom de la fête" value="<?= $nomF ?>"/>
            <input type="text" name="voieAdrF" placeholder="rue" value="<?= $voieAdrF ?>"/><br />
            <input type="text" name="cpF" placeholder="code postal" value="<?= $cpF ?>"/>
            <input type="text" name="villeF" placeholder="ville" value="<?= $villeF ?>"/>

            <br />
            <?php
            // mes types de gastronomie
            for ($i = 0; $i < count($mesTypeGastronomieAimes); $i++) {
                if (count($tabidTG) == 0) {
                    $check = "checked"; // on ne provient pas du formulaire de recherche
                } else {
                    $check = ""; // on provient du formulaire de recherche, checked sera peut etre fait dans la condition suivante

                    if (in_array($mesTypeGastronomieAimes[$i]['idTG'], $tabidTG)) {
                        $check = "checked";
                    }
                }
                ?>
                <input type="checkbox" <?= $check ?> name="tabidTG[]" id="aime<?= $i ?>" value="<?= $mesTypeGastronomieAimes[$i]['idTG'] ?>" >
                <label for="aime<?= $i ?>"><?= $mesTypeGastronomieAimes[$i]['libelleTG'] ?></label><br />
                <?php
            }
            // les autres types de gastronomie
            for ($i = 0; $i < count($lesAutresTypesGastronomie); $i++) {
                $check = "";
                if (in_array($lesAutresTypesGastronomie[$i]['idTG'], $tabidTG)) {
                    $check = "checked";
                }
                ?>
                <input type="checkbox" <?= $check ?> name="tabidTG[]" id="autres<?= $i ?>" value="<?= $lesAutresTypesGastronomie[$i]['idTG'] ?>" >
                <label for="autres<?= $i ?>"><?= $lesAutresTypesGastronomie[$i]['libelleTG'] ?></label><br />
                <?php
            }
            break;
    }
    ?>
    <br /><br />
    <input type="submit" value="Rechercher" />

</form>
