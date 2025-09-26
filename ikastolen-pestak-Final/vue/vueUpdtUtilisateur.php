<h1>Mise à jour utilisateur</h1>
<form action="./?action=updtUtilisateur" method="POST">
    <p><strong>Il n'est pas possible de modifier le mail utilisateur qui est le seul identifiant fiable (comme dans Cisco netacad.com)</strong></p>
    <label>Mail obligatoire pour valider les modifications</label><br>
    <input type="text" name="mailU" placeholder="<?=$updtUtilisateur['mailU'] ?>" required/><br>
    <input type="text" name="pseudoU" placeholder="<?=$updtUtilisateur['pseudoU']?>"/><br>
    <input type="password" name="mdpU" placeholder="Nouveau mot de passe" /><br>
    <input type="password" name="mdpU2" placeholder="Confirmer la saisie" /><br>
    <input type="checkbox" name="admin" value="1"/><label for="Admin"> Cocher si l'utilisateur doit être administrateur </label><br>
    <input type="submit"/>
</form>