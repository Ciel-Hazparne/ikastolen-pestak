<?php

include_once "bd.inc.php";

function getCritiquerByidF($idF)
{
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from critiquer where idF=:idF");
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

function getNoteMoyenneByidF($idF)
{
    $resultat = array();

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
    if ($req->rowCount() > 0) {
        return $resultat["avg(note)"];
    } else {
        return 0;
    }
}

function getCritiquerByMailU($mailU)
{
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from critiquer where mailU=:mailU");
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

function getCritiquerById($idF, $mailU)
{
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from critiquer where idF=:idF and mailU=:mailU");
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

function getCritiquerByNote($operateur, $note)
{
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from critiquer where note $operateur :note");
        $req->bindValue(':note', $note, PDO::PARAM_STR);

        $req->execute();

        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function addCritiquer($idF, $mailU)
{
    $resultat = -1;
    try {
        $cnx = connexionPDO();

        $req = $cnx->prepare("insert into critiquer (idF, mailU) values(:idF, :mailU)");
        $req->bindValue(':idF', $idF, PDO::PARAM_INT);
        $req->bindValue(':mailU', $mailU, PDO::PARAM_STR);

        $resultat = $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function delCritiquerById($idF, $mailU)
{
    $resultat = -1;
    try {
        $cnx = connexionPDO();

        $req = $cnx->prepare("delete from critiquer  where idF=:idF and mailU=:mailU");
        $req->bindValue(':idF', $idF, PDO::PARAM_INT);
        $req->bindValue(':mailU', $mailU, PDO::PARAM_STR);

        $resultat = $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function updCritiquerNote($idF, $mailU, $note)
{
    $resultat = -1;
    try {
        $cnx = connexionPDO();

        $req = $cnx->prepare("update critiquer set  note=:note where idF=:idF and mailU=:mailU ");
        $req->bindValue(':idF', $idF, PDO::PARAM_INT);
        $req->bindValue(':mailU', $mailU, PDO::PARAM_STR);
        $req->bindValue(':note', $note, PDO::PARAM_INT);


        $resultat = $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function updCritiquerCommentaire($idF, $mailU, $commentaire)
{
    $resultat = -1;
    try {
        $cnx = connexionPDO();

        $req = $cnx->prepare("update critiquer set commentaire=:commentaire where idF=:idF and mailU=:mailU ");
        $req->bindValue(':idF', $idF, PDO::PARAM_INT);
        $req->bindValue(':mailU', $mailU, PDO::PARAM_STR);
        $req->bindValue(':commentaire', $commentaire, PDO::PARAM_STR);

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

    echo "\n addCritiquer(1,'jokin.zarzabal@gmail.com') : \n";
    addCritiquer(1, 'jokin.zarzabal@gmail.com');
    updCritiquerNote(1, 'jokin.zarzabal@gmail.com', 3);
    updCritiquerCommentaire(1, 'jokin.zarzabal@gmail.com', 'Très bonne entrecote, les frites sont maisons et delicieuses.');


    echo "\n getCritiquerByidF(1) : \n";
    print_r(getCritiquerByidF(1));

    echo "\n getCritiquerByMailU('jokin.zarzabal@gmail.com') : \n";
    print_r(getCritiquerByMailU('jokin.zarzabal@gmail.com'));

    echo "\n getCritiquerById(1, 'jokin.zarzabal@gmail.com') : \n";
    print_r(getCritiquerById(1, 'jokin.zarzabal@gmail.com'));

    echo "\n getCritiquerByNote('>', 2) : \n";
    print_r(getCritiquerByNote('>', 2));

    echo "\n getCritiquerByNote('<', 2) : \n";
    print_r(getCritiquerByNote('<', 2));
}