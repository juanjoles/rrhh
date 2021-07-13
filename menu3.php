<?php
include "seguridad/seguridad.php"
?>
<?php
 error_reporting(E_ALL ^ E_NOTICE);
 ?>

<?php 
        include "estructura/encabezado.php";
 ?>

<html>
  <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="StyleSheet" href="estilos/estilos.css" type="text/css">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
        <title></title>
    </head>
    <style>
  .ui-menu { 
  width: 160px; 
  border-radius: 5px;
  color: #555;
  font: normal 15px Tahoma;
  }
  </style>
  
  <br><br><br><br>
  <right><b>EMPLEADOS</b></rightr>
  <br><br><ul id="menu">
      <li><center><a href="menu2.php" >Volver</a></center></li>
  <li><center><a href="listaempleados.php" >Lista de Empleados</a></center></li>
  <li><center><a href="empleados_area.php" >Busqueda Especifica</a></center></li>
  
</ul>
 

            

</table>
<?php include "estructura/pie.php"; ?>
</html>
<script>
  $(function() {
    $( "#menu" ).menu();
  });
  </script>