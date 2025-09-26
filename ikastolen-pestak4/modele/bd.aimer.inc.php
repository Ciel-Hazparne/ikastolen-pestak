<?php

include_once "bd.inc.php";

function getAimerByMailU($mailU)
{
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from aimer where mailU=:mailU");
        $req->bindValue(':mailU', $mailU, PDO::PARAM_STR);

        $req->execute();

        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        while ($ligne) {
            $resultat[] = $ligne;
            $ligne = $req->fetch(PDO::FETCH_ASSOC);
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getAimerByIdF($idF)
{
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from aimer where idF=:idF");
        $req->bindValue(':idF', $idF, PDO::PARAM_INT);

        $req->execute();

        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        while ($ligne) {
            $resultat[] = $ligne;
            $ligne = $req->fetch(PDO::FETCH_ASSOC);
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getAimerById($mailU, $idF)
{
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

function addAimer($mailU, $idF)
{
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

function delAimer($mailU, $idF)
{
    // à completer


}

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    // prog principal de test
    header('Content-Type:text/plain');

    echo "\n getAimerByMailU(\"jokin.zarzabal@gmail.com\") : \n";
    print_r(getAimerByMailU("jokin.zarzabal@gmail.com"));

    echo "\n getAimerByidF(1) : \n";
    print_r(getAimerByidF(1));

    echo "\n getAimerById(mailU, idF) : \n";
    print_r(getAimerById("jokin.zarzabal@gmail.com", 1));

    echo "\n addAimer(\"jokin.zarzabal@gmail.com\",3) : \n";
    print_r(addAimer("jokin.zarzabal@gmail.com", 3));

}