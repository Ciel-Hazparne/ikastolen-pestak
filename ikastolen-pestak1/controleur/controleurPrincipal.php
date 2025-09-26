<?php

function controleurPrincipal($action){
    $lesActions = array();
    $lesActions["defaut"] = "listeFetes.php";
    $lesActions["liste"] = "listeFetes.php";
    $lesActions["detail"] = "detailFete.php";

    
    if (array_key_exists ( $action , $lesActions )){
        return $lesActions[$action];
    }
    else{
        return $lesActions["defaut"];
    }

}