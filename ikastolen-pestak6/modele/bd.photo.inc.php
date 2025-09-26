<?php

include_once "bd.inc.php";

function getPhotosByidF($idF) {
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from photo where idF=:idF");
        $req->bindValue(':idF', $idF, PDO::PARAM_INT);

        $req->execute();

        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getPhotoByIdP($idP) {
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from photo where idP=:idP");
        $req->bindValue(':idP', $idP, PDO::PARAM_INT);
        $req->execute();

        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function addPhoto($cheminP, $idF) {
    $resultat = -1;
    try {
        $cnx = connexionPDO();

        $req = $cnx->prepare("insert into photo (cheminP, idF) values(:cheminP,:idF)");
        $req->bindValue(':cheminP', $cheminP, PDO::PARAM_STR);
        $req->bindValue(':idF', $idF, PDO::PARAM_INT);

        $resultat = $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function delPhotoById($idP)
{
    $resultat = -1;
    try {
        $cnx = connexionPDO();

        $req = $cnx->prepare("delete from photo  where idP=:idP");
        $req->bindValue(':idP', $idP, PDO::PARAM_STR);

        $resultat = $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
    var_dump($resultat);
    die();
}

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    // prog principal de test
    header('Content-Type:text/plain');

    echo "\n addPhoto(0, \"arabaEuskaraz.png\",1) : \n";
    print_r(addPhoto(22, "aeArnoa.png", 1));

    echo "\n addPhoto(1, \"ibilaldia.png\",2) : \n";
    print_r(addPhoto(23, "ibilaldia.png", 2));

    echo "\n addPhoto(2, \"HerriUrrats.png\",3) : \n";
    print_r(addPhoto(24, "HerriUrrats.png", 3));

    echo "\n getPhotosByidF(1) : \n";
    print_r(getPhotosByidF(1));

    echo "\n getPhotosByidF(3) : \n";
    print_r(getPhotosByidF(3));

    echo "\n getPhotoByIdP(1) : \n";
    print_r(getPhotoByIdP(1));
}