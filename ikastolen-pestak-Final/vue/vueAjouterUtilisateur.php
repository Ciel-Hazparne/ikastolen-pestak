<h1>Enregistrer un nouvel utilisateur</h1>
<span id="alerte"><?= $msg ?></span>
<form action="./?action=ajouterUtilisateur" method="POST">
    <input type="text" name="mailU" placeholder="Adresse mail" required/><br>
    <input type="password" name="mdpU" placeholder="Mot de Passe" required/><br>
    <input type="password" name="mdpU2" placeholder="Confirmer la saisie" required/><br>
    <input type="text" name="pseudoU" placeholder="Pseudo" required/><br>
    <input type="checkbox" name="admin" value="1"/><label for="Admin"> Cocher si l'utilisateur doit être administrateur </label><br>
    <input type="submit"/>
</form>