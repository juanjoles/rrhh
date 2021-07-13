<?php

include "bd/conexion.php";
    
    $sql = "insert into familia (dniempleado,nomyape,dni,fecha_nacimiento,parentesco) values (?,?,?,?,?)";
    $consulta = $cnn->prepare($sql);
    $params = array($_POST[dniempleado], $_POST[nomyape],$_POST[dni],date("Y-m-d", strtotime($_POST[fecha_nacimiento])),$_POST[parentesco]);
    if ($consulta->execute($params)) {

    }
    else {

         print_r($consulta->errorInfo());
        return 0;
    }
    
    ?>

   

    

