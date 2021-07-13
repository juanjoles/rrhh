<?php
 error_reporting(E_ALL ^ E_NOTICE);
 ?>
 <?php
if ($_POST) {
    include "bd/conexion.php";
    $sql = "select * from usuarios where user = ?";
    $params = array($_POST[user]);
    $consulta = $cnn->prepare($sql);
    $consulta->execute($params);
    
    if ($registro = $consulta->fetch()) { //EL USUARIO EXISTE
        $clave = ($_POST[pass]);
        if ($clave == $registro[pass]) { //LA CLAVE ES CORRECTA
            session_name("rrhh");
            session_start();
            $_SESSION[autenticado]=1;
            $_SESSION[user]=$registro[user];
            $_SESSION[tiempo]=date("G:H:s d/m/Y");
            header ("Location: aplicacion.php");
        }
        else {
            //LA CLAVE NO ES CORRECTA
            header ("Location: index.php?error=pass");
        }
    }
    else {
        //EL USUARIO NO EXISTE
        header ("Location: index.php?error=user");
    }
}
?>
