<?php

include_once "bd.inc.php";

function getCritiquerByIdF($idF)
{
    $resultat = array();

    // completer le code manquant


    return $resultat;
}

function getNoteMoyenneByIdF($idF)
{
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select avg(note) from critiquer where idF=:idF");
        $req->bindValue(':idF', $idF, PDO::PARAM_INT);
        $req->execute();
        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    if ($resultat["avg(note)"] != NULL) {
        return $resultat["avg(note)"];
    } else {
        return 0;
    }
}


if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    // prog principal de test
    header('Content-Type:text/plain');

    echo "\n getNoteMoyenneByIdF(1) \n";
    print_r(getNoteMoyenneByIdF(1));
}