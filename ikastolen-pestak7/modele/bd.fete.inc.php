<?php

include_once "bd.inc.php";

function getFeteByidF($idF) {

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from fete where idF=:idF");
        $req->bindValue(':idF', $idF, PDO::PARAM_INT);

        $req->execute();

        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getFetes() {
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from fete");
        $req->execute();

        while ($ligne = $req->fetch(PDO::FETCH_ASSOC)) {
            $resultat[] = $ligne;
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getTop4Fetes() {
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select fete.*,sum(note) from fete, critiquer where fete.idF=critiquer.idF group by idF order by sum(note) desc limit 4 ");
        $req->execute();

        while ($ligne = $req->fetch(PDO::FETCH_ASSOC)) {
            $resultat[] = $ligne;
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getFetesByMotsCles($tabMots) {
    $resultat = array();

    $filtre = "";
    for ($i = 0; $i < count($tabMots); $i++) {
        $filtre .= " or  nomF like '%:mot$i%' ";
        $filtre .= " or  villeF like '%:mot$i%' ";
    }

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from fete " . $filtre);
        $req->execute();

        while ($ligne = $req->fetch(PDO::FETCH_ASSOC)) {
            $resultat[] = $ligne;
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getFetesByTypesGastronomie($tabidTG) {
    $resultat = array();

    if (count($tabidTG) > 0) {
        $filtre = "idTG = $tabidTG[0] ";
        for ($i = 1; $i < count($tabidTG); $i++) {
            $filtre .= " or  idTG = $tabidTG[$i] ";
        }

        try {
            $cnx = connexionPDO();
            $req = $cnx->prepare("select distinct fete.* from fete,proposer where fete.idF=proposer.idF and (" . $filtre . ") order by nomF");
            $req->execute();

            while ($ligne = $req->fetch(PDO::FETCH_ASSOC)) {
                $resultat[] = $ligne;
            }
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    } else {
        return false;
    }
}

function getFetesByNomF($nomF) {
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from fete where nomF like :nomF");
        $req->bindValue(':nomF', "%" . $nomF . "%", PDO::PARAM_STR);

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

function getFetesByAdresse($voieAdrF, $cpF, $villeF) {
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from fete where voieAdrF like :voieAdrF and cpF like :cpF and villeF like :villeF");
        $req->bindValue(':voieAdrF', "%" . $voieAdrF . "%", PDO::PARAM_STR);
        $req->bindValue(':cpF', $cpF . "%", PDO::PARAM_STR);
        $req->bindValue(':villeF', "%" . $villeF . "%", PDO::PARAM_STR);
        $req->execute();

        while ($ligne = $req->fetch(PDO::FETCH_ASSOC)) {
            $resultat[] = $ligne;
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getFetesByMultiCriteres($nomF, $voieAdrF, $cpF, $villeF, $tabidTG) {
    $resultat = array();
    $filtre = "";
    if (count($tabidTG) > 0) {
        $filtre = "and (idTG = $tabidTG[0] ";
        for ($i = 1; $i < count($tabidTG); $i++) {
            $filtre .= " or  idTG = $tabidTG[$i] ";
        }
        $filtre .= ")";
    }
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select distinct fete.* from fete,proposer where fete.idF=proposer.idF and nomF like :nomF and  voieAdrF like :voieAdrF and cpF like :cpF and villeF like :villeF  $filtre order by nomF");
        $req->bindValue(':nomF', "%" . $nomF . "%", PDO::PARAM_STR);
        $req->bindValue(':voieAdrF', "%" . $voieAdrF . "%", PDO::PARAM_STR);
        $req->bindValue(':cpF', $cpF . "%", PDO::PARAM_STR);
        $req->bindValue(':villeF', "%" . $villeF . "%", PDO::PARAM_STR);
        $req->execute();

        while ($ligne = $req->fetch(PDO::FETCH_ASSOC)) {
            $resultat[] = $ligne;
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getFetesAimesByMailU($mailU) {
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select fete.* from fete,aimer where fete.idF = aimer.idF and mailU = :mailU");
        $req->bindValue(':mailU', $mailU, PDO::PARAM_STR);
        $req->execute();

        while ($ligne = $req->fetch(PDO::FETCH_ASSOC)) {
            $resultat[] = $ligne;
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

    echo "getFetes() : \n";
    print_r(getFetes());

    echo "getFeteByidF(1) : \n";
    print_r(getFeteByidF(1));

    echo "getFetesBynomF(nomF) : \n";
    print_r(getFetesBynomF("Ibilaldia"));

    echo "getFetesByAdresse(voieAdrF, cpF, villeF) : \n";
    print_r(getFetesByAdresse("Gaztelako Atea", "01007", "Gasteiz"));
}