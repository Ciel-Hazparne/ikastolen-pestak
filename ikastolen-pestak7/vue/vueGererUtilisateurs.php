<h3>Gestion des utilisateurs</h3>
<div id="listeDiv">
    <table id="listeT">
        <thead>
        <tr>
            <th>Courriel</th>
            <th>Mot de passe</th>
            <th>pseudo</th>
            <th>Administrateur</th>
            <th colspan="2">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($listeUtilisateurs as $cle => $valeur): ?>  <!-- On déroule le tableau résultat de la requête pour compléter le tableau HTML de la page -->
            // code à compléter. Vous avez le même principe dans la vue « v_gestion_sapeurs.php » du SDIS
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
</div>