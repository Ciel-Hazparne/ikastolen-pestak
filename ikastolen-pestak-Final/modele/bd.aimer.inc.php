<?php

include_once "bd.inc.php";

function getAimerByMailU($mailU) {
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from aimer where mailU=:mailU");
        $req->bindValue(':mailU', $mailU, PDO::PARAM_STR);
        $req->execute();
        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getAimerByidF($idF) {
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from aimer where idF=:idF");
        $req->bindValue(':idF', $idF, PDO::PARAM_INT);

        $req->execute();

        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getAimerById($mailU, $idF){
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from aimer where mailU=:mailU and  idF=:idF");
        $req->bindValue(':idF', $idF, PDO::PARAM_INT);
        $req->bindValue(':mailU', $mailU, PDO::PARAM_STR);
        
        $req->execute();
        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function addAimer($mailU, $idF) {
    $resultat = -1;
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("insert into aimer (mailU, idF) values(:mailU,:idF)");
        $req->bindValue(':idF', $idF, PDO::PARAM_INT);
        $req->bindValue(':mailU', $mailU, PDO::PARAM_STR);
        
        $resultat = $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function delAimer($mailU, $idF) {
    $resultat = -1;
    try {
        $cnx = connexionPDO();

        $req = $cnx->prepare("delete from aimer where idF=:idF and mailU=:mailU");
        $req->bindValue(':idF', $idF, PDO::PARAM_INT);
        $req->bindValue(':mailU', $mailU, PDO::PARAM_STR);
        
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

    echo "\n addAimer(\"jokin.zarzabal@gmail.com\",1) : \n";
    print_r(addAimer("jokin.zarzabal@gmail.com", 1));

    echo "\n addAimer(\"jokin.zarzabal@gmail.com\",2) : \n";
    print_r(addAimer("jokin.zarzabal@gmail.com", 2));

    echo "\n getAimerByMailU(\"jokin.zarzabal@gmail.com\") : \n";
    print_r(getAimerByMailU("jokin.zarzabal@gmail.com"));

    echo "\n getAimerByidF(1) : \n";
    print_r(getAimerByidF(1));

    echo "\n delAimer(\"jokin.zarzabal@gmail.com\",2) : \n";
    print_r(delAimer("jokin.zarzabal@gmail.com", 2));

}