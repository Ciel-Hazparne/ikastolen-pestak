<?php

include_once "bd.inc.php";

function getProposerByidF($idF) {
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from proposer where idF=:idF");
        $req->bindValue(':idF', $idF, PDO::PARAM_INT);

        $req->execute();

        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getProposerByidTG($idTG) {
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from proposer where idTG=:idTG");
        $req->bindValue(':idTG', $idTG, PDO::PARAM_INT);

        $req->execute();

        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function addProposer($idF, $idTG) {
    $resultat = -1;
    try {
        $cnx = connexionPDO();

        $req = $cnx->prepare("insert into proposer (idF, idTG) values(:idF,:idTG)");
        $req->bindValue(':idF', $idF, PDO::PARAM_INT);
        $req->bindValue(':idTG', $idTG, PDO::PARAM_INT);

        $resultat = $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    // prog principal de test
    header('Content-Type:text/plain');

    echo "\n addProposer(1,1) : \n";
    print_r(addProposer(1, 1));

    echo "\n addProposer(2,1) : \n";
    print_r(addProposer(2, 1));

    echo "\n addProposer(3,3) : \n";
    print_r(addProposer(3, 3));

    echo "\n getProposerByidF(1) : \n";
    print_r(getProposerByidF(1));

    echo "\n getProposerByidTG(3) : \n";
    print_r(getProposerByidTG(3));
}