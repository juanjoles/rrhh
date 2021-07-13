<?php
error_reporting(E_ALL ^ E_NOTICE);

?>

<form  >
    <fieldset>
        <table class="table1">
            <tr><td>DNI Empleado:</td><td><input type="text" name="dniempleado" id="dniempleado" size="20" maxlength="20"value="<?php echo $_POST[dni]; ?>" readonly=”readonly” /></td></tr>
            <tr><td>DNI Familiar:</td><td><input type="text" name="dni" id="dni" size="20" maxlength="20" /></td></tr>
            <tr><td>Apellido y Nombre:</td><td><input type="text" id="nomyape" name="nomyape" size="20" maxlength="20" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"/></td></tr>
            <tr><td>Fecha de Nacimiento:</td><td><input id="fecha_nacimiento" type="text"  name="fecha_nacimiento" size="20" maxlength="20" onkeyup="mascara(this,'-',patron,true)" /></td></tr>
            <tr><td>Parentesco:</td><td>
                    <select name="parentesco" id="parentesco" style="width: 100%">
                        <option value="1">Conyuge</option>
                        <option value="2">Hijo/a</option>
                        <option value="3">Padre del Titular</option>
                        <option value="4">Madre del Titular</option>
                        <option value="5">Menor a Cargo</option>
                    </select>
                </td></tr>
            
        </table>
</fieldset>
</form>
<script  languaje="javascript" type="text/javascript">
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