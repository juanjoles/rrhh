<?php
include "seguridad/seguridad.php"
?>


<!DOCTYPE html>
<html>
  <head>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
        <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
        <link rel="stylesheet" href="/resources/demos/style.css"> 
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="StyleSheet" href="estilos/estilos.css" type="text/css">
        <script type="text/javascript" language="javascript" src="jquery-ui/jquery-1.11.1.js"></script>
        
        <title></title>
    </head>
    <style>
        
    </style>
    <body>
        <body>
        <?php 
          include "bd/empleados.php";
          include "estructura/encabezado.php"; 
        //include "estructura/menu.php";
        
        echo "<br><br><br>";
        echo "<button ><a href='menu3.php'>Volver</a><br></button><br><br>";
        echo "Seleccione relación laboral";
        ?>
            <style> 

</style> 
 <div id="laboral">
                    <td><select style="width: 25%" id="cod_laboral" name="cod_laboral" onchange="buscar()">
                        <?php
                            $consulta = rel_laboral();
                            while ($registro = $consulta->fetch()) 
                            {
                            ?>
                            <option value='<?php echo $registro[cod_laboral]?>'><?php echo $registro[descripcion] ?> </option>
                            
                                <?php 
                              
                            }
                            ?>
                     
                </select>
              
                      
 <h3><center>EMPLEADOS</center></h3>
 <div id="content" name="content">

 </div>
        <?php
                
        ?>
        <?php include "estructura/pie.php"; ?>
 <script languaje="javascript" type="text/javascript">
       function buscar()
       {
        var nom_variable=document.getElementById("cod_laboral").value;     
       $.ajax
        ({
        type: "POST",
        url: "buscarxarea.php",
        data: "idlaboral=" + nom_variable + "&tipo=laboral",
        success: function(datos) {
        $("#content").html(datos);
        }
        });
        }
</script> 
</body>
    
</html>                