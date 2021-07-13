<?php
include "seguridad/seguridad.php"
?>
<?php
 error_reporting(E_ALL ^ E_NOTICE);
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
 <script> function formulario(f) {

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

</script>

<!DOCTYPE html>
<html lang="en">
    
    <head>
        <script src="jquery-1.3.min.js" language="javascript"></script>

        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
        <link rel="stylesheet" href="/resources/demos/style.css">
        <link rel="StyleSheet" href="estilos/estilos.css" type="text/css">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <style>
        .ui-widget {
            font-size: 14px;
        }
        label {
    display: inline-block; width: 5em;
            }
        fieldset div {
        margin-bottom: 0,5em;
                    }
            fieldset .help {
        display: inline-block;
                        }
            .ui-tooltip {
             width: 100px;
    </style>
    <body>
        <body>
        <?php 
          include "bd/empleados.php";
          include "bd/familia.php";
          include "estructura/encabezado.php"; 
        //include "estructura/menu.php";
        
        $mensaje = "";
        if ($_POST) {
            $resultado = modificarfamilia($_POST[dni],$_POST[dniempleado],$_POST[nomyape],date("Y-m-d", strtotime($_POST[fecha_nacimiento])),$_POST[parentesco],$_POST[dniviejo]);
            if ($resultado==1) {
                $mensaje= "Registro actualizado correctamente...<br>";
                
            }
            else {
                $mensaje= "Hubo problemas al guardar...<br>";
            }
          $registro = listafamilia1($_POST[dni]);
        }
        if ($_GET && !$_POST) {
            $registro = listafamilia1($_GET[dni]);
        }
        
        
        ?>
        <button ><a href='modificar_empleado.php?dni=<?php echo $registro[dniempleado]; ?>'>Volver</a><br></button><br><br> 
        <center><h3>Modificar Datos Familiar</h3><center>
        <form method="post" action="#" onsubmit="return formulario(this)">
            
        <table>
            <input type="hidden" name="dniviejo" id='dniviejo' size="30" maxlength="8" value="<?php echo $registro[dni]; ?>" readonly=”readonly”/></td></tr>
            <tr><td>DNI Empleado:</td><td><input type="text" name="dniempleado" size="20" maxlength="20"value="<?php echo $registro[dniempleado]; ?>"/></td></tr>
            <tr><td>DNI Familiar:</td><td><input type="text" name="dni" size="20" maxlength="20" onkeypress="return permite(event, 'num')" value="<?php echo $registro[dni]; ?>"/></td></tr>
            <tr><td>Apellido y Nombre:</td><td><input type="text" name="nomyape" size="20" maxlength="20" onkeypress="return permite(event, 'car')" value="<?php echo $registro[nomyape]; ?>" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"/></td></tr>
            <tr><td>Fecha de Nacimiento:</td><td><input type="text"  name="fecha_nacimiento" size="20" maxlength="20" value="<?php echo date("d-m-Y", strtotime($registro[fecha_nacimiento])) ?>" onkeyup="mascara(this,'-',patron,true)"/></td></tr>
            <tr><td>Parentesco:</td><td>
                    <select style="width: 80%" id="parentesco" name="parentesco">
                        <?php
                            $consulta1 = parentesco();
                            while ($registro1 = $consulta1->fetch()) 
                            {
                            ?>
                        <option value='<?php echo $registro1[codigo]?>' <?php if ($registro[parentesco]==$registro1[codigo]){ echo "selected";} ?> ><?php echo $registro1[nombre] ?> </option>
                            <?php 
                            } 
                        ?>
                    </select>
                </td></tr>
            <tr><td></td><td><input type="submit" value="Modificar" /><br><?php echo $mensaje; ?></td></tr>
        </table>
            
        </form>
        <?php
        
        ?>
        <?php include "estructura/pie.php"; ?>
    </body>
</html>
<script>
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



