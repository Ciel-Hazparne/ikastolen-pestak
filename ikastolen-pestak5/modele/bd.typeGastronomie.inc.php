<?php

include_once "bd.inc.php";

function getTypesGastronomie() {
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from typeGastronomie");
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

function getTypesGastronomiePrefereesByMailU($mailU) {
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select typeGastronomie.* from typeGastronomie,preferer where typeGastronomie.idTG = preferer.idTG and preferer.mailU = :mailU");
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

function getTypesGastronomieNonPreferesByMailU($mailU) {
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from typeGastronomie where idTG not in (select typeGastronomie.idTG from typeGastronomie,preferer where typeGastronomie.idTG = preferer.idTG and preferer.mailU = :mailU)");
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

function getTypesGastronomieByidF($idF){
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select typeGastronomie.* from typeGastronomie,proposer where typeGastronomie.idTG = proposer.idTG and proposer.idF = :idF");
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

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    // prog principal de test
    header('Content-Type:text/plain');

    echo "getTypesGastronomie() : \n";
    print_r(getTypesGastronomie());
    
    echo "getTypesGastronomiePrefereesByMailU(mailU) : \n";
    print_r(getTypesGastronomiePrefereesByMailU("test@bts.sio"));
    
    echo "getTypesGastronomieNonPreferesByMailU(mailU) : \n";
    print_r(getTypesGastronomieNonPreferesByMailU("test@bts.sio"));
    
    echo "getTypesGastronomieByidF(idF) : \n";
    print_r(getTypesGastronomieByidF(4));
}
?>


