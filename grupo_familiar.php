<?php
 error_reporting(E_ALL ^ E_NOTICE);
 ?>
<html>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
  <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <style>
  .ui-menu { 
  width: 200px; 
  border-radius: 5px;
  color: #555;
  font: normal 15px Tahoma;
  }
  </style>
    <body>
        <body>
        <?php 
             include "bd/empleados.php";
             include "bd/familia.php";
             include "estructura/encabezado.php"; 
        //include "estructura/menu.php";
        echo "<button ><a href='menu2.php'>Volver</a><br></button><br><br>"
        ?>
            <h3><center>GRUPO FAMILIAR</center></h3>
            <br><br><ul id="menu">
  <li>AGREGAR FAMILIAR</li>
  <li>VER FAMILIARES</li>
  
  
</ul>
            
            <?php include "estructura/pie.php"; ?>
    </body>
    
</html>

<script>
  $(function() {
    $( "#menu" ).menu();
  });
  </script>
