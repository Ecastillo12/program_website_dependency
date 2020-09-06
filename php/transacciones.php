<?php

function consultarSQL($consulta){
    $mysqli = new mysqli("localhost", "root", "", "palomas_mensajeras");
    if(mysqli_connect_errno()){
        echo "Ha ocurrido un problema problemas";
    }
    $mysqli->set_charset("utf8");
    $mysqli->autocommit(FALSE);
    $mysqli->begin_transaction(MYSQLI_TRANS_START_WITH_CONSISTENT_SNAPSHOT);
    if($resultados=$mysqli->query($consulta)){
        if($mysqli->commit()){
            return 1;
        }else{
            return 0;
        }
    }else{
        $mysqli->rollBack();
        return 0;
    }
}

?>