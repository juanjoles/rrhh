<?php
include "seguridad/seguridad.php"
?>

<script languaje="javascript">
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

 </script>
 
<?php
 error_reporting(E_ALL ^ E_NOTICE);
 ?>
<html>
    <!-- Esta hoja CSS, se mostrará sólo a Interenet Explorer //-->
    <!--[if IE]>
  <!--<script>
    <link rel="StyleSheet" href="estilos/estilos-ie.css" type="text/css"> 
    }
  </script>
<!--<![endif]-->  
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
    <link rel="StyleSheet" href="estilos/estilos.css" type="text/css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
  <link rel="StyleSheet" href="estilos/estilos.css" type="text/css">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <head>
        <meta http-equiv='X-UA-Compatible' content='IE=8'>
        <style>
        .ui-widget {
            font-size: 14px;
        }
        label {
    display: inline-block; width: 5em;
            }
        fieldset div {
        margin-bottom: 2em;
                    }
            fieldset .help {
        display: inline-block;
                        }
            .ui-tooltip {
             width: 210px;
    </style>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
 <script> function formulario(f) {

if (f.nomyape.value   == '') { alert ('El nombre no debe estar vacío'); 

f.nomyape.focus(); return false; }

if (f.dniempleado.value  == '') { alert ('El dni no debe estar vacío');

f.dniempleado.focus(); return false; } 

if (f.cuil.value  == '') { alert ('El CUIL no debe estar vacío');

f.cuil.focus(); return false; } 

if (f.barrio.value  == '') { alert ('El barrio no debe estar vacío');

f.barrio.focus(); return false; }

if (f.calle.value  == '') { alert ('La calle no debe estar vacía');

f.calle.focus(); return false; }

if (f.fechanac.value  == '') { alert ('La fecha de nacimiento no debe estar vacía');

f.fechanac.focus(); return false; }

if (f.fecha_ingreso.value  == '') { alert ('La fecha de ingreso no debe estar vacía');

f.fecha_ingreso.focus(); return false; }
return true; }

</script>

                 


    </head>
    <body>
        <?php 
        include "estructura/encabezado.php"; 
        //include "estructura/menu.php";
        include "bd/empleados.php";
        
if ($_POST) {
    include "bd/conexion.php";
    $sql = "select * from empleado where dniempleado=?";
    $params = array($_POST[dniempleado]);
    $consulta = $cnn->prepare($sql);
    $consulta->execute($params);
    if ($registro = $consulta->fetch()) {
        $mensaje= "<br>EL DNI YA SE ENCUENTRA REGISTRADO<br>";
    }
    else
    {
        $mensaje = "";
        if ($_POST) {
            if ($_POST[rel_laboral]==3){
                $consulta=numcontrato();
                $_POST[num_contrato]=$consulta[num_contrato]+1;
            }
            $resultado = agregarempleado($_POST[dniempleado],$_POST[num_legajo],$_POST[num_contrato],$_POST[nomyape],$_POST[cuil],date("Y-m-d", strtotime($_POST[fechanac])),$_POST[departamento],$_POST[localidad],$_POST[barrio],$_POST[calle],$_POST[rel_laboral],date("Y-m-d", strtotime($_POST[fecha_ingreso])),$_POST[estado_civil],$_POST[cod_area],$_POST[num_control],$_POST[num_iosep],$_POST[telefono],$_POST[profesion],$_POST[codigo_educativo]);
            if ($resultado==1) {
                $mensaje= "Registro guardado correctamente...<br>";
            }
            else {
                $mensaje= "Hubo problemas al guardar...<br>";
            }
        }
    }
}
        ?>
        
        
        <style>
  .ui-menu { 
  width: 150px; 
  border-radius: 5px;
  color: #555;
  font: normal 15px Tahoma;
  }
  </style>
  <br><br><br><br>
  <right><b>EMPLEADOS</b></rightr>
  <br><br><ul id="menu">
      <li><center><a href="menu2.php" >Volver</a></center></li>
  <li><center><a href="agregarempleado.php" >Actualizar</a></center></li>
  
</ul>
        
              
    <center><h4>Agregar Empleado</h4><center>
        <form method="post" action="#"  onsubmit="return formulario(this)">
        <table>
            <tr><td>Apellido y Nombre:</td><td><input type="text" name="nomyape" size="40" maxlength="50" onkeypress="return permite(event, 'car')" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" /></td>
            <td>DNI:</td><td><input id="dniempleado" title="Por favor, ingrese numero de DNI." type="text" name="dniempleado" size="40" maxlength="8" onkeypress="return permite(event, 'num')"  /></td></tr>
            
            <tr><td> Situacion Laboral:</td><td>
                   <select style="width: 64%" type="text"  name="rel_laboral" maxlength="20">
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
                        
                    
                </td>
                <td>Nº Legajo:</td><td><input id="num_legajo" title="Ingrese Nº Legajo, solo si corresponde." type="text" name="num_legajo" size="40" maxlength="50" onkeypress="return permite(event, 'tel')"/></td></tr>
            <tr><td> Area:</td><td>
                    <select style="width: 64%" id="cod_area" title="Seleccione un Area." name="cod_area">
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
                <td>CUIL:</td><td><input id="cuil" title="Ingrese Nº de CUIL." type="text" name="cuil" size="40" maxlength="14" onkeypress="return permite(event, 'cuit')"/></td></tr>
            <tr><td>Fecha de Nacimiento:</td><td><input id="fechanac" type="text"  name="fechanac" size="40" maxlength="10" onkeyup="mascara(this,'-',patron,true)"  /></td>
                
                <td>Departamento: </td><td>
                   <select style="width: 100%" id="id_departamento" title="Ingrese Departamento." name="departamento">
                        <?php
                            $consulta = departamentos();
                            while ($registro = $consulta->fetch()) 
                            {
                            ?>
                            <option value='<?php echo $registro[id_departamento]?>'><?php echo $registro[nombre] ?> </option>
                            <?php 
                            
                            } 
                        ?>
                   </select> 
                    
            <tr><td> Localidad:</td><td>
                <select style="width: 64%" id="id_localidad" title="Ingrese Localidad." name="localidad">
                        <?php
                            $consulta = getlocalidad();
                            while ($registro = $consulta->fetch()) 
                            {
                            ?>
                            <option value='<?php echo $registro[id_localidad]?>'><?php echo $registro[nombre] ?> </option>
                            <?php 
                            } 
                        ?>
                <td> Barrio:</td><td><input id="barrio" title="Ingrese un barrio." type="text" name="barrio" size="40" maxlength="50" onkeypress="return permite(event, 'num_car')" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"/></td></tr>
                <tr><td> Calle:</td><td><input id="calle" title="Ingrese una calle." type="text" name="calle" size="40" maxlength="50" onkeypress="return permite(event, 'num_car')" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"/></td>
                    <td> Fecha de Ingreso:</td><td><input   name="fecha_ingreso" size="40" maxlength="10" onkeyup="mascara(this,'-',patron,true)" /></td></tr>
            
                
                    <tr><td> Estado Civil:</td><td>
               <select style="width: 64%" id="estado_civil"  name="estado_civil">
                        <?php
                            $consulta = estado_civil();
                            while ($registro = $consulta->fetch()) 
                            {
                            ?>
                            <option value='<?php echo $registro[codigo]?>'><?php echo $registro[descripcion] ?> </option>
                            <?php 
                            
                            } 
                        ?>
                   </select> 
                </td>
                <td> Nº Control:</td><td><input id="num_control" title="Ingrese Nº Control, solo si corresponde." type="text" name="num_control" size="40" maxlength="50" onkeypress="return permite(event, 'tel')"/></td></tr>
                    <tr><td> Nº IOSEP:</td><td><input id="num_iosep" title="Ingrese Nº IOSEP, solo si corresponde." type="text" name="num_iosep" size="40" maxlength="50" onkeypress="return permite(event, 'tel')" /></td>
                <td> Telefono:</td><td><input id="telefono" title="Ingrese un Nº de contacto." type="text" name="telefono" size="40" maxlength="60" onkeypress="return permite(event, 'tel')"/></td></tr>
                    <tr><td> Profesión:</td><td>
                        <select style="width: 64%" id="profesion"  name="profesion">
                        <?php
                            $consulta = profesion();
                            while ($registro = $consulta->fetch()) 
                            {
                            ?>
                            <option value='<?php echo $registro[codigo]?>'><?php echo $registro[descripcion] ?> </option>
                            <?php 
                            
                            } 
                        ?>
                   </select> 
                        <td> Nivel Educativo:</td><td>
                    <select style="width: 100%" id="codigo_educativo"  name="codigo_educativo">
                        <?php
                            $consulta = nivel_educativo();
                            while ($registro = $consulta->fetch()) 
                            {
                             ?>
                            <option value='<?php echo $registro[codigo]?>'><?php echo $registro[descripcion] ?> </option>
                           
                                <?php 
                            } 
                        ?>
                    </select> </tr>
        </table>
            <br><tr><td></td><td><left><input type="submit" value="ACEPTAR" /><br><?php echo "$mensaje"; ?></left></td></tr>
        
            
            
        <?php include "estructura/pie.php"; ?>
    </body>
</html>
<script>
 $.datepicker.regional['es'] = {
 closeText: 'Cerrar',
 prevText: '<Ant',
 nextText: 'Sig>',
 currentText: 'Hoy',
 monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
 monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
 dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
 dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
 dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
 weekHeader: 'Sm',
 dateFormat: 'yy/mm/dd',
 firstDay: 1,
 isRTL: false,
 showMonthAfterYear: false,
 yearSuffix: '',
 changeMonth: true,
 changeYear: true,
 dateFormat: 'yy-mm-dd'
 };
 $.datepicker.setDefaults($.datepicker.regional['es']);
$(function () {
$("#fecha_ingreso").datepicker();
});
</script>

<script>
 $.datepicker.regional['es'] = {
 closeText: 'Cerrar',
 prevText: '<Ant',
 nextText: 'Sig>',
 currentText: 'Hoy',
 monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
 monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
 dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
 dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
 dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
 weekHeader: 'Sm',
 dateFormat: 'yy/mm/dd',
 firstDay: 1,
 isRTL: false,
 showMonthAfterYear: false,
 yearSuffix: '',
 changeMonth: true,
      changeYear: true,
      dateFormat: 'yy-mm-dd'
 };
 $.datepicker.setDefaults($.datepicker.regional['es']);
$(function () {
$("#feac").datepicker();
});
</script>
 <script type="text/javascript">
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
<script>
  $(function() {
    $( "#menu" ).menu();
  });
  </script>	  
