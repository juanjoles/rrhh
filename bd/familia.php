<?php

function listafamilia($dniempleado) {
    include "conexion.php";
    $sql = "select familia.dniempleado,familia.nomyape,familia.dni,familia.fecha_nacimiento,parentesco.nombre as nombre,parentesco.codigo,familia.parentesco from familia,parentesco where parentesco.codigo=familia.parentesco and familia.dniempleado=?";
    $consulta = $cnn->prepare($sql);
    $params = array($dniempleado);
    if ($consulta->execute($params)) {
        //echo "consulta ejecutada...<br><br>";
    }
    else {
        print_r($consulta->errorInfo());
    }
    return $consulta;
}
function listafamilia1($dni) {
    include "conexion.php";
    $sql = "select familia.dniempleado,familia.nomyape,familia.dni,familia.fecha_nacimiento,parentesco.nombre as nombre,parentesco.codigo,familia.parentesco from familia,parentesco where parentesco.codigo=familia.parentesco and familia.dni=?";
    $consulta = $cnn->prepare($sql);
    $params = array($dni);
    if ($consulta->execute($params)) {
        //echo "consulta ejecutada...<br><br>";
    }
    else {
        print_r($consulta->errorInfo());
    }
   return $consulta->fetch();
}

function eliminarfamilia($dni) {
    include "conexion.php";
    $sql = "delete from familia where dni = ?";
    $consulta = $cnn->prepare($sql);
    $params = array($dni);
    if ($consulta->execute($params)) {
        return 1;
        //echo "consulta ejecutada...<br><br>";
    }
    else {
        return 0;
       // print_r($consulta->errorInfo());
    }
    //return $consulta;
}
function agregarfamilia($dniempleado, $nomyape, $dni,$fecha_nacimiento,$parentesco) {
    include "conexion.php";
    $sql = "insert into familia (dniempleado,nomyape,dni,fecha_nacimiento,parentesco) values (?,?,?,?,?)";
    $consulta = $cnn->prepare($sql);
    $params = array($dniempleado, $nomyape, $dni,$fecha_nacimiento,$parentesco);
    if ($consulta->execute($params)) {
        return 1;
        echo "consulta ejecutada...<br><br>";
    }
    else {
       print_r($consulta->errorInfo());
        return 0;
        
    }
    //return $consulta;
}

function modificarfamilia($dniempleado,$dninuevo, $nomyape,$fecha_nacimiento,$parentesco,$dniviejo) {
    include "conexion.php";
    $sql = "update familia set dni=?,dniempleado=?,nomyape=?,fecha_nacimiento=?,parentesco=? where dni=?";
    $consulta = $cnn->prepare($sql);
    $params = array($dniempleado,$dninuevo, $nomyape,$fecha_nacimiento,$parentesco,$dniviejo);
    if ($consulta->execute($params)) {
        return 1;
        echo "consulta ejecutada...<br><br>";
    }
    else {
        return 0;
        print_r($consulta->errorInfo());
    }
    //return $consulta;
}
function parentesco() {
    include "conexion.php";
    $sql = "select codigo,nombre from parentesco";
    $consulta = $cnn->prepare($sql);
    
    if ($consulta->execute()) {
        //echo "consulta ejecutada...<br><br>";
    }
    else {
        //print_r($consulta->errorInfo());
    }
    return $consulta;
}

?>

