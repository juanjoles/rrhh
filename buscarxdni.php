<html> 
<body> 
      <link href="jquery-ui/jquery-ui.css" rel="stylesheet">
    <script src="jquery-ui/external/jquery/jquery.js"></script>
    <script src="jquery-ui/jquery-ui.js"></script>
    <head>
        <style>
        .ui-widget {
            font-size: 14px;
        }
    </style>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    
<?php
        include "estructura/encabezado.php"; 
        
        include "bd/empleados.php";
?>
<h3><center>EMPLEADOS</center></h3>
<form method="post" action="#">
<br><br><br><strong>DNI:</strong> <input type="number" name="dni" size="20"> 
<input type="submit" value="Buscar" name="buscar"> 
<?php
echo "<center><table border=1 size='2' bgcolor='#A4A4A4'></center>";
echo "<tr><th>DNI</th><th>Nombre y Apellido</th><th>Nº Legajo</th><th>Nº Contrato</th><th>Area</th><th>Rel. Laboral</th><th>Fecha Ingreso</th><th>Antiguedad</th><th>Nº Control</th><th>Nº IOSEP</th><th>CUIL</th><th>Fecha Nacimiento</th><th>Estado Civil</th><th>Departamento</th><th>Localidad</th><th>Calle</th></tr>";
        
        $consulta = listarxdni($_POST[dni]);
        //while ($registro = $consulta->fetch()) {
             $sdate=date("Y");
            //$mostrar=date("d-m-Y",$registro[fecha_ingreso]);
            $e = $sdate - strftime("%Y", strtotime($registro[fecha_ingreso]));
            //$fecha=strtime("Y",$registro[fecha_ingreso]);
            echo "<tr><td>$registro[dni]</td>";
            echo "<td>$registro[nomyape]</td>";
            echo "<td>$registro[num_legajo]</td>";
            echo "<td>$registro[num_contrato]</td>";
            echo "<td>$registro[adescripcion]</td>";
            echo "<td>$registro[reldescripcion]</td>";
            echo "<td width='90'>$registro[fecha_ingreso]</td>";
            echo "<td><center>$e</center> </td>";
            echo "<td>$registro[num_control]</td>";
            echo "<td>$registro[num_iosep]</td>";
            echo "<td width='100'>$registro[cuil]</td>";
            echo "<td>$registro[fechanac]</td>";
            echo "<td>$registro[estado_civil]</td>";
            echo "<td>$registro[dnombre]</td>";
            echo "<td>$registro[lnombre]</td>";
            echo "<td>$registro[calle]</td><tr>";
       
            
            
        //} 
        
        echo "</table>";
        
                
        ?>
        
    </form>
    <?php include "estructura/pie.php"; ?>
</body> 
</html>
