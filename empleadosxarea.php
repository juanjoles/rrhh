<?php
 error_reporting(E_ALL ^ E_NOTICE);
 ?>


<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script type=text/javascript lenguage="javascript" src="java/funciones.js"></script>
        <script type="text/javascript" src="jscript/utiles.js"> </script>
        
        <title></title>
        <script language="javascript">
</script>
    </head>
    <style>
    </style>
    <body>
        <body>
        
            
        <?php 
        include "bd/empleados.php";
        include "estructura/encabezado.php"; 
        include "estructura/menu.php";
       if ($_GET) {
            if ($_GET[op]=="eliminar") { //estoy eliminando
                eliminarproveedor($_GET[cuit]);
            }
        }
        
        ?>
            <h3><center>Areas</center></h3>
            
            
        <?php
      
        $consulta = areas();
        
        echo "<table border=1>";
        echo "<tr><th>CODIGO</th>,<th>DESCRIPCION</th>";
        while ($registro = $consulta->fetch()) {
            echo "<tr><td>$registro[cod_area]</td>";
            echo "<td>$registro[descripcion]</td>";
            
            echo "<td><a href='empleados_area1.php?cod_area=$registro[cod_area]'>VER EMPLEADOS </a></td>";
            
        } 
        
         echo "</table>";
        
                
        ?>
            
        <?php include "estructura/pie.php"; ?>
    </body>
    
</html>


