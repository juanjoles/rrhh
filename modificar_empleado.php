<?php
include "seguridad/seguridad.php"
?>
<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\" \"http://www.w3.org/TR/html4/loose.dtd\"> 


        

        

<html lang="en">
    <head>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
        <link rel="stylesheet" href="/resources/demos/style.css">
        <link rel="StyleSheet" href="estilos/estilos.css" type="text/css">
        <meta http-equiv='X-UA-Compatible' content='IE=8'>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
        <link rel="STYLESHEET" type="text/css" href="estilos-ie.css" />
       
        <title></title>
    </head>
    <body>
        
        <?php 
         error_reporting(E_ALL ^ E_NOTICE);
        include "estructura/encabezado.php"; 
        //include "estructura/menu.php";
        include "bd/empleados.php";
        include "bd/familia.php";
      
        $mensaje = "";
        if ($_POST) {
            $resultado = modificarempleado($_POST[dni],$_POST[num_legajo],$_POST[num_contrato],$_POST[nomyape],$_POST[cuil],date("Y-m-d", strtotime($_POST[fechanac])),$_POST[departamento],$_POST[localidad],$_POST[barrio],$_POST[calle],$_POST[rel_laboral],date("Y-m-d", strtotime($_POST[fecha_ingreso])),$_POST[estado_civil],$_POST[cod_area],$_POST[num_control],$_POST[num_iosep],$_POST[telefono],$_POST[profesion],$_POST[codigo_educativo],$_POST[dniviejo]);
            if ($resultado==1) {
                $mensaje= "Registro actualizado correctamente...<br>";
                
            }
            else {
                $mensaje= "Hubo problemas al guardar...<br>";
            }
            $registro = listarxdni1($_POST[dni]);
        }
        if ($_GET && !$_POST) {
            $registro = listarxdni1($_GET[dni]);
            
        }
        ?>
        <div >
            <br><br>
            <style>
  .ui-menu { 
  width:172px; 
  border-radius: 5px;
  color: #555;
  font: normal 15px Tahoma;
  }
 

  </style>
  <br><br><br><br>
  
  <br><br><ul id="menu">
      <li><center><a href="menu2.php" >Volver</a><center></li>
      <li><a class="button" id="opener">Agregar Familiar</a></li>
      <li><center><a  onclick="buscarfamilia()">Buscar Familiar</a><center></li>
</ul>
            
            
            <center><h3>Modificar Empleado</h3></center>
        <form id="fo3" method="post" action="#" onsubmit="return formulario(this)">
        <center><table>
            <input type="hidden" name="dniviejo" id='dniviejo' size="30" maxlength="8" value="<?php echo $registro[dni]; ?>" /></td></tr>
            <tr><td>Apellido y Nombre:</td><td><input type="text"  name="nomyape" size="40" maxlength="50" onkeypress="return permite(event, 'car')" value="<?php echo $registro[nomyape]; ?>" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"/></td>
            <td>DNI:</td><td><input type="text" name="dni" size="40" maxlength="8" onkeypress="return permite(event, 'num')"  value="<?php echo $registro[dni]; ?>" /></td></tr>
            <tr><td>Nº Legajo:</td><td><input type="text" name="num_legajo" size="40" maxlength="30" onkeypress="return permite(event, 'tel')" value="<?php echo $registro[num_legajo]; ?>" /></td>
            <td>Nº Contrato:</td><td><input type="text" name="num_contrato" size="40" maxlength="30" value="<?php echo $registro[num_contrato]; ?>" readonly=”readonly”/></td></tr>
            
            <tr><td>Area:</td><td>
            <select style="width: 64%" id="cod_area" name="cod_area">
                        <?php
                            $consulta1 = areas();
                            while ($registro1 = $consulta1->fetch()) 
                            {
                            ?>
                            <option value='<?php echo $registro1[cod_area]?>' <?php if ($registro[cod_area]==$registro1[cod_area]){ echo "selected";} ?> ><?php echo $registro1[descripcion] ?> </option>
                            <?php 
                            } 
                        ?>
            </select>
            <td>Situacion Laboral:</td><td>
            <select style="width: 100%" id="rel_laboral" name="rel_laboral">
                        <?php
                            $consulta1 = rel_laboral();
                            while ($registro1 = $consulta1->fetch()) 
                            {
                            ?>
                            <option value='<?php echo $registro1[cod_laboral]?>' <?php if ($registro[rel_laboral]==$registro1[cod_laboral]){ echo "selected";} ?> ><?php echo $registro1[descripcion] ?> </option>
                            <?php 
                            } 
                        ?>
            </select>        
            <tr><td>Fecha de Ingreso:</td><td><input type="text" name="fecha_ingreso" size="40" maxlength="20" value="<?php echo date("d-m-Y", strtotime($registro[fecha_ingreso])) ?>" onkeyup="mascara(this,'-',patron,true)" /></td>
            <td>Nº Control:</td><td><input type="text" name="num_control" size="40" maxlength="20" onkeypress="return permite(event, 'tel')" value="<?php echo $registro[num_control]; ?>" /></td></tr>
            <tr><td>Nº IOSEP:</td><td><input type="text" name="num_iosep" size="40" maxlength="20" onkeypress="return permite(event, 'tel')" value="<?php echo $registro[num_iosep]; ?>" /></td>       
            <td>CUIL:</td><td><input type="text" name="cuil" size="40" maxlength="14" onkeypress="return permite(event, 'cuit')" value="<?php echo $registro[cuil]; ?>" /></td></tr>
            <tr><td>Fecha de Nacimiento:</td><td><input type="text" id="fechanac" name="fechanac" size="40" maxlength="20" value="<?php echo date("d-m-Y", strtotime($registro[fechanac])) ?>" onkeyup="mascara(this,'-',patron,true)" /></td>
                <td>Estado Civil:</td><td>
                    <select style="width: 100%" id="estado_civil" name="estado_civil">
                        <?php
                            $consulta1 = estado_civil();
                            while ($registro1 = $consulta1->fetch()) 
                            {
                            ?>
                            <option value='<?php echo $registro1[codigo]?>' <?php if ($registro[estado_civil]==$registro1[codigo]){ echo "selected";} ?> ><?php echo $registro1[descripcion] ?> </option>
                            <?php 
                            } 
                        ?>
            </select>  
                </td></tr>
            <tr><td>Departamento:</td><td>
                    <select style="width: 64%" id="id_departamento" name="departamento">
                        <?php
                            $consulta1 = departamentos();
                            while ($registro1 = $consulta1->fetch()) 
                            {
                            ?>
                            <option value='<?php echo $registro1[id_departamento]?>' <?php if ($registro[departamento]==$registro1[id_departamento]){ echo "selected";} ?> ><?php echo $registro1[nombre] ?> </option>
                            <?php 
                            } 
                        ?>
            </select>  
            <td>Localidad:</td><td>
                    <select style="width: 100%" id="id_localidad" name="localidad">
                        <?php
                            $consulta1 = getlocalidad();
                            while ($registro1 = $consulta1->fetch()) 
                            {
                            ?>
                            <option value='<?php echo $registro1[id_localidad]?>' <?php if ($registro[localidad]==$registro1[id_localidad]){ echo "selected";} ?> ><?php echo $registro1[nombre] ?> </option>
                            <?php 
                            } 
                        ?>
            </select> 
            <tr><td>Barrio:</td><td><input type="text" name="barrio" size="40" maxlength="50" onkeypress="return permite(event, 'num_car')" value="<?php echo $registro[barrio]; ?>" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"/></td>
            <td>Calle:</td><td><input type="text" name="calle" size="40" maxlength="50" onkeypress="return permite(event, 'num_car')" value="<?php echo $registro[calle]; ?>" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" /></td></tr>       
        </td></tr>
        <tr><td> Telefono:</td><td><input id="telefono" title="Ingrese un Nº de contacto." type="text" name="telefono" size="40" maxlength="60" onkeypress="return permite(event, 'tel')" value="<?php echo $registro[telefono]; ?>" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"/></td>
                    <td> Profesión:</td><td>
                        <select style="width: 100%" id="profesion" name="profesion">
                        <?php
                            $consulta1 = profesion();
                            while ($registro1 = $consulta1->fetch()) 
                            {
                            ?>
                            <option value='<?php echo $registro1[codigo]?>' <?php if ($registro[profesion]==$registro1[codigo]){ echo "selected";} ?> ><?php echo $registro1[descripcion] ?> </option>
                            <?php 
                            } 
                        ?>
            </select>  
                <tr><td> Nivel Educativo:</td><td>
                    <select style="width: 64%" id="codigo_educativo" title="Seleccione un Nivel." name="codigo_educativo">
                        <?php
                            $consulta1 = nivel_educativo();
                            while ($registro1 = $consulta1->fetch()) 
                            {
                             ?>
                            <option value='<?php echo $registro1[codigo]?>' <?php if ($registro[codigo_educativo]==$registro1[codigo]){ echo "selected";} ?> ><?php echo $registro1[descripcion] ?> </option>
                           
                                <?php 
                            } 
                        ?>
                    </select> 
        
            </table></center>
            <br><center><input type="submit" value="Modificar" class="button1"/><br><?php echo $mensaje; ?></center>
        </form>
        </div>
             
        <input type="hidden" name="txt_familia" id="txt_familia" value="<?php echo $registro[dni]; ?>">
        
        <div id='familia' name='familia'>  
            
        </div>   
        
         <div id='asdf' name='asdf'>  
        </div>  
        
        <div id="dialog" title="Agregar Familiar">
        <div id="dialog-form">
        <form>
        </form>
        </div>
</div>
        
<?php include "estructura/pie.php"; ?>
<script languaje="javascript" type="text/javascript">
function justNumbers(e)
        {
        var keynum = window.event ? window.event.keyCode : e.which;
        if ((keynum == 8) || (keynum == 46))
        return true;
         
        return /\d/.test(String.fromCharCode(keynum));
        }
        function permite(elEvento, permitidos) {
  // Variables que definen los caracteres permitidos
  var numeros = "0123456789";
  var caracteres = " abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ";
  var numeros_caracteres = numeros + caracteres;
  var teclas_especiales = [8];
  var cuit="0123456789-";
  var tel="0123456789-()/";
  // 8 = BackSpace, 46 = Supr, 37 = flecha izquierda, 39 = flecha derecha
 
 
  // Seleccionar los caracteres a partir del parámetro de la función
  switch(permitidos) {
    case 'num':
      permitidos = numeros;
      break;
    case 'car':
      permitidos = caracteres;
      break;
    case 'num_car':
      permitidos = numeros_caracteres;
      break;
      case 'tel':
      permitidos = tel;
      break;
  case 'cuit':
      permitidos = cuit;
      break;
  }
 
  // Obtener la tecla pulsada 
  var evento = elEvento || window.event;
  var codigoCaracter = evento.charCode || evento.keyCode;
  var caracter = String.fromCharCode(codigoCaracter);
 
  // Comprobar si la tecla pulsada es alguna de las teclas especiales
  // (teclas de borrado y flechas horizontales)
  var tecla_especial = false;
  for(var i in teclas_especiales) {
    if(codigoCaracter == teclas_especiales[i]) {
      tecla_especial = true;
      break;
    }
  }
 
  // Comprobar si la tecla pulsada se encuentra en los caracteres permitidos
  // o si es una tecla especial
  return permitidos.indexOf(caracter) != -1 || tecla_especial;
}

function buscarfamilia()
       {
         
        var nom_variable=document.getElementById("txt_familia").value; 

       $.ajax
        ({
        type: "POST",
        url: "modificar_empleado_1.php",
        data: "dniempleado=" + nom_variable + "&tipo=familia",
        success: function(datos) {
        $("#familia").html(datos);
        }
        });
        }


$(function() {
    var dialog, form;

    function addUser() 
    {     
        
      var valid = true;
      if ( valid ) {

        $.ajax
        ({
        type: "POST",
        url: "guardar-familiar.php",
        data: "dniempleado=" + $("#dniempleado").val() + "&nomyape=" + $("#nomyape").val() + "&dni=" + $("#dni").val() + "&fecha_nacimiento=" + $("#fecha_nacimiento").val() + "&parentesco=" + $("#parentesco").val(),
        success: function(datos) {
        $("#asdf").html(datos);
        }
        });
        

       $.ajax
        ({
        type: "POST",
        url: "modificar_empleado_1.php",
        data: "dniempleado=" + $("#txt_familia").val() + "&tipo=familia",
        success: function(datos) {
        $("#familia").html(datos);
        }
        });
        
        dialog.dialog( "close" );
      }
      return valid;  
    }
 
    dialog = $( "#dialog-form" ).dialog({
      autoOpen: false,
      height: 300,
      width: 450,
      modal: true,
      resizable: false,
      buttons: {
        "Guardar": addUser,
        Cancelar: function() 
        {
        dialog.dialog( "close" );
        }
      },
      close: function() 
      {
        form[ 0 ].reset();
      }
    });

    form = dialog.find( "form" ).on( "submit", function( event ) {
      event.preventDefault();
      addUser();
    });
 
    $( "#opener" ).button().on( "click", function() {
        

        $.ajax
        ({
        type: "POST",
        url: "alta-familiar.php",
        data: "dni=" + $("#dniviejo").val(),
        success: function(datos) {
            $("#dialog-form").html(datos);
        }
        });
        dialog.dialog( "open" );
    });
  }); 
 function formulario(f) {

if (f.nomyape.value   == '') { alert ('El nombre no debe estar vacío'); 

f.nomyape.focus(); return false; }

if (f.dni.value  == '') { alert ('El dni no debe estar vacío');

f.dni.focus(); return false; } 

if (f.cuil.value  == '') { alert ('El CUIL no debe estar vacío');

f.cuil.focus(); return false; } 

if (f.barrio.value  == '') { alert ('El barrio no debe estar vacío');

f.barrio.focus(); return false; }

if (f.calle.value  == '') { alert ('La calle no debe estar vacía');

f.calle.focus(); return false; } 
return true; }

var patron = new Array(2,2,4)
var patron2 = new Array(1,3,3,3,3)
function mascara(d,sep,pat,nums){
if(d.valant != d.value){
	val = d.value
	largo = val.length
	val = val.split(sep)
	val2 = ''
	for(r=0;r<val.length;r++){
		val2 += val[r]	
	}
	if(nums){
		for(z=0;z<val2.length;z++){
			if(isNaN(val2.charAt(z))){
				letra = new RegExp(val2.charAt(z),"g")
				val2 = val2.replace(letra,"")
			}
		}
	}
	val = ''
	val3 = new Array()
	for(s=0; s<pat.length; s++){
		val3[s] = val2.substring(0,pat[s])
		val2 = val2.substr(pat[s])
	}
	for(q=0;q<val3.length; q++){
		if(q ==0){
			val = val3[q]
		}
		else{
			if(val3[q] != ""){
				val += sep + val3[q]
				}
		}
	}
	d.value = val
	d.valant = val
	}
}

</script>

   </body>  
</html>
<script>
  $(function() {
    $( "#menu" ).menu();
  });
  </script>
 
