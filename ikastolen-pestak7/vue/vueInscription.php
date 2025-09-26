<h1>Inscription</h1>
<span id="alerte"><?= $msg ?></span>
<form action="./?action=inscription" method="POST">

    <input type="email" name="mailU" placeholder="Email de connexion" /><br />
    <input type="password" name="mdpU" placeholder="Mot de passe"  /><br />
    <input type="password" name="mdpU2" placeholder="Confirmer la saisie" /><br />
    <input type="text" name="pseudoU" placeholder="Pseudo" /><br />

    <input type="submit" value="S'inscrire" />

</form>