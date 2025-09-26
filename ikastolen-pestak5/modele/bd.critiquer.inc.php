<?php

include_once "bd.inc.php";

function getCritiquerByidF($idF) {
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

function getNoteMoyenneByidF($idF) {

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
    if ($req->rowCount()>0){
        return $resultat["avg(note)"];
    }
    else{
        return 0;
    }
}



if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    // prog principal de test
    header('Content-Type:text/plain');

    echo "\n getCritiquerByidF(1) : \n";
    print_r(getCritiquerByidF(1));

    echo "\n getNoteMoyenneByidF(1) : \n";
    print_r(getNoteMoyenneByidF(1));

    
}
?>