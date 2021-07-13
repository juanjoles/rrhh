<?php

function getlocalidades($id_departamento) {
    include "conexion.php";
    $sql = "select * 
            from localidades
            where id_departamento = ?
            order by nombre";
    $consulta = $cnn->prepare($sql);
    $params = array($id_departamento);
    if ($consulta->execute($params)) {
        //echo "consulta ejecutada...<br><br>";
    }
    else {
        //print_r($consulta->errorInfo());
    }
    return $consulta;
}
?>

