<h1>Modifier mon profil</h1>

Mon adresse électronique : <?= $util["mailU"] ?> <br />
Mettre à jour mon pseudo : 
<form action="./?action=updProfil" method="POST">
    <input type="text" name="pseudoU" placeholder="Nouveau pseudo" /><br />
    <input type="submit" value="Enregistrer" />
    <hr>
    Mettre à jour mon mot de passe : <br />
    <?= $messageMdp ?>
    <input type="password" name="mdpU" placeholder="Nouveau mot de passe" /><br />
    <input type="password" name="mdpU2" placeholder="Confirmer la saisie" /><br />
    <input type="submit" value="Enregistrer" />
    <hr>
    Gerer les fêtes que j'aime : <br />
    <?php for ($i = 0; $i < count($mesFetesAimees); $i++) { ?>
        <input type="checkbox" name="lstidF[]" id="fete<?= $i ?>" value="<?= $mesFetesAimees[$i]['idF'] ?>" >
        <label for="fete<?= $i ?>"><?= $mesFetesAimees[$i]['nomF'] ?></label><br />
    <?php } ?>
    <input type="submit" value="Supprimer" />
    <hr>
    Les types de gastronomie que j'aime : <br />
    <ul id="tagFood">
    <?php for ($i = 0; $i < count($mesTypeGastronomieAimes); $i++) { ?>
        <input type="checkbox" name="delLstidTG[]" id="delType<?= $i ?>" value="<?= $mesTypeGastronomieAimes[$i]['idTG'] ?>" >
        <label for="delType<?= $i ?>"><li class="tag"><span class="tag">#</span><?= $mesTypeGastronomieAimes[$i]['libelleTG'] ?></li></label><br />
    <?php } ?>
    </ul>
    <br />
    <input type="submit" value="Supprimer" />
    <br /><br />
    <hr>
    Choisir d'autres types de gastronomie : <br />
    <ul id="tagFood">
    <?php for ($i = 0; $i < count($lesAutresTypesGastronomie); $i++) { ?>
        <input type="checkbox" name="addLstidTG[]" id="addType<?= $i ?>" value="<?= $lesAutresTypesGastronomie[$i]['idTG'] ?>" >
        <label for="addType<?= $i ?>"><li class="tag"><span class="tag">#</span><?= $lesAutresTypesGastronomie[$i]['libelleTG'] ?></li></label><br />
    <?php } ?>
    </ul>
    <br />
    <input type="submit" value="Ajouter" />
    <br /><br />
</form>


