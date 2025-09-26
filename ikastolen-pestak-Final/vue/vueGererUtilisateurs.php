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
            <tr>
                <?php foreach ($valeur as $val): ?>
                    <td class="util">
                        <?php echo $val ?>
                    </td>
                <?php endforeach; ?>
                <td class="action">
                    <!-- Requête GET pour identifier l'utilisateur à supprimer -->
                    <a href='./?action=supprimerUtilisateur&mailU=<?= $valeur['mailU'] ?>'
                       onClick="return(confirm('Etes-vous sûr de vouloir supprimer <?php echo $valeur['mailU'] ?> ?'));"
                       class="boutonSupp">&nbsp;SUPPR&nbsp;</a>
                </td>
                <td class="action">
                    <!-- Requête GET pour identifier l'utilisateur à MAJ -->
                    <a href=./?action=updtUtilisateur&mailU=<?= $valeur['mailU'] ?>
                       class="boutonMaj">&nbsp;MAJ&nbsp;</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

</div>