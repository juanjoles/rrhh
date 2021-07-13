<?php
include "seguridad/seguridad.php"
?> 


<?php
 error_reporting(E_ALL ^ E_NOTICE);
 ?>


<!DOCTYPE html>
<html lang="en">
    
    <head>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
       <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
         <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
        <link rel="stylesheet" href="/resources/demos/style.css"> 
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="StyleSheet" href="estilos/estilos.css" type="text/css">
        <script type="text/javascript" language="javascript" src="jquery-ui/jquery-1.11.1.js"></script>
        <meta http-equiv='X-UA-Compatible' content='IE=8'>
        <title></title>
    </head>
    
    <body>
        <body>
        <?php 
          include "bd/empleados.php";
          include "estructura/encabezado.php"; 
        //include "estructura/menu.php";
        
        echo "<br><br><br>";
        //echo "<button ><a href='menu3.php'>Volver</a><br></button><br><br>"
        ?>
            <input type =button value="Volver" onClick="top.location.href= 'menu3.php'" /><br><br>
 <form>
  <div id="radio">
    <input type="radio" id="dni1" name="radio" onclick="muestra('dni'),oculta('area'),oculta('nombre')"><label >Buscar Por DNI</label>
    <input type="radio" id="area1" name="radio" checked="checked" value="buscarxarea" onclick="muestra('area'),oculta('dni'),oculta('nombre')"><label >Buscar Por Area</label>
    <input type="radio" id="nombre1" name="radio" value="buscarxnombre" onclick="muestra('nombre'),oculta('area'),oculta('dni')" ><label >Buscar Por Nombre</label>
  </div>
</form>
     
        <div id="dni">       
        <input name="txt_dni" id="txt_dni">
        <input type="button" onclick="buscardni()" value="Buscar DNI"><br>
        </div>       
                    <div id="area">
                    <td><select style="width: 25%" id="cod_area" name="cod_area" onchange="buscar()">
                        <?php
                            $consulta = areas();
                            while ($registro = $consulta->fetch()) 
                            {
                            ?>
                            <option value='<?php echo $registro[cod_area]?>'><?php echo $registro[descripcion] ?> </option>
                            
                                <?php 
                              
                            }
                            ?>
                     
                </select>
              
                </div> 
            <div id="nombre">       
                <input name="txt_nombre" id="txt_nombre">
                <input type="button" onclick="buscarnombre()" value="Buscar Nombre"><br>
            </div>  
            
 <h3><center>EMPLEADOS</center></h3>
 <div id="content" name="content">

 </div>
        <?php
                
        ?>
        <?php include "estructura/pie.php"; ?>
 <script languaje="javascript" type="text/javascript">
       function buscar()
       {
        var nom_variable=document.getElementById("cod_area").value;     
       $.ajax
        ({
        type: "POST",
        url: "buscarxarea.php",
        data: "idarea=" + nom_variable + "&tipo=area",
        success: function(datos) {
        $("#content").html(datos);
        }
        });
        }
        function buscarfamilia()
       {
        var nom_variable=document.getElementById("txt_familia").value;     
       $.ajax
        ({
        type: "POST",
        url: "modificar_empleado.php",
        data: "dniempleado=" + nom_variable + "&tipo=familia",
        success: function(datos) {
        $("#content").html(datos);
        }
        });
        }
        function buscardni()
        {
        var dni=document.getElementById("txt_dni").value;     
       $.ajax
        ({
        type: "POST",
        url: "buscarxarea.php",
        data: "dni=" + dni + "&tipo=dni",
        success: function(datos) {
        $("#content").html(datos);
        }
        });
        }
        function buscardni()
        {
        var dni=document.getElementById("txt_dni").value;     
       $.ajax
        ({
        type: "POST",
        url: "buscarxarea.php",
        data: "dni=" + dni + "&tipo=dni",
        success: function(datos) {
        $("#content").html(datos);
        }
        });
        }
        function buscarnombre()
        {
        var nombre=document.getElementById("txt_nombre").value;     
       $.ajax
        ({
        type: "POST",
        url: "buscarxarea.php",
        data: "nombre=" + nombre + "&tipo=nombre",
        success: function(datos) {
        $("#content").html(datos);
        }
        });
        }
       
   
    function oculta(id){
         var elDiv = document.getElementById(id); //se define la variable "elDiv" igual a nuestro div
        elDiv.style.display='none'; //damos un atributo display:none que oculta el div     
       }
  
   function muestra(id){
        var elDiv = document.getElementById(id); //se define la variable "elDiv" igual a nuestro div
        elDiv.style.display='block';//damos un atributo display:block que  el div     
       }
  
  
   window.onload = function(){/*hace que se cargue la función */
   /* "Mandamos como parametro el nombre de la Div para ocultar" */
   oculta('dni');
   oculta('area');
   oculta('nombre');/*Ocultamos Pmoral*/
   }
   var era;
function uncheckRadio(rbutton){
if(rbutton.checked==true && era==true){rbutton.checked=false;}
era=rbutton.checked;
}   

</script> 
</body>
    
</html>
<script>
  $(function() {
    $( "#radio" ).buttonset();
  });
  </script>
