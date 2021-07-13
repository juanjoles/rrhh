<?php
 error_reporting(E_ALL ^ E_NOTICE);
 ?>
<?php


function numcontrato() {
    include "conexion.php";
    $sql = "select max(num_contrato)as num_contrato from empleado";
    $consulta = $cnn->prepare($sql);
    
    if ($consulta->execute()) {
        //echo "consulta ejecutada...<br><br>";
    }
    else {
        //print_r($consulta->errorInfo());
    }
    return $consulta->fetch();
}
function listaempleados() {
    include "conexion.php";
    $sql = "select empleado.dniempleado as dni,empleado.nomyape as nomyape,empleado.num_legajo as num_legajo,empleado.num_contrato as num_contrato,area.descripcion as adescripcion,rel_laboral.descripcion as reldescripcion, empleado.fecha_ingreso as fecha_ingreso,empleado.num_control as num_control,empleado.num_iosep as num_iosep,empleado.cuil as cuil,empleado.fechanac as fechanac,empleado.estado_civil as estado_civil,departamentos.nombre as dnombre,localidades.nombre as lnombre,empleado.calle as calle,empleado.profesion as profesion "
            . "from empleado,area,departamentos,localidades,rel_laboral,profesion "
            . "where empleado.cod_area=area.cod_area and empleado.departamento=departamentos.id_departamento and empleado.localidad=localidades.id_localidad and empleado.rel_laboral=rel_laboral.cod_laboral and empleado.profesion=profesion.codigo";
    $consulta = $cnn->prepare($sql);
    
    if ($consulta->execute()) {
        //echo "consulta ejecutada...<br><br>";
    }
    else {
        //print_r($consulta->errorInfo());
    }
    return $consulta;
}

function rel_laboral1($rel_laboral) {
    include "conexion.php";
    $sql = "select empleado.dniempleado as dni,empleado.nomyape as nomyape,empleado.num_legajo as num_legajo,empleado.num_contrato as num_contrato,area.descripcion as adescripcion,rel_laboral.descripcion as reldescripcion, empleado.fecha_ingreso as fecha_ingreso,empleado.num_control as num_control,empleado.num_iosep as num_iosep,empleado.cuil as cuil,empleado.fechanac as fechanac,empleado.estado_civil as estado_civil,departamentos.nombre as dnombre,localidades.nombre as lnombre,empleado.calle as calle,empleado.profesion as profesion "
            . "from empleado,area,departamentos,localidades,rel_laboral,profesion "
            . "where empleado.cod_area=area.cod_area and empleado.departamento=departamentos.id_departamento and empleado.localidad=localidades.id_localidad and empleado.rel_laboral=rel_laboral.cod_laboral and empleado.profesion=profesion.codigo and rel_laboral.cod_laboral=?";
    $consulta = $cnn->prepare($sql);
    $params = array($rel_laboral);
    if ($consulta->execute($params)) {
        //echo "consulta ejecutada...<br><br>";
    }
    else {
        print_r($consulta->errorInfo());
    }
    return $consulta;
}

function empleadosarea($cod_area) {
    include "conexion.php";
    $sql = "select empleado.dniempleado as dni,empleado.nomyape as nomyape,empleado.num_legajo as num_legajo,empleado.num_contrato as num_contrato,area.descripcion as adescripcion,rel_laboral.descripcion as reldescripcion, empleado.fecha_ingreso as fecha_ingreso,empleado.num_control as num_control,empleado.num_iosep as num_iosep,empleado.cuil as cuil,empleado.fechanac as fechanac,empleado.estado_civil as estado_civil,departamentos.nombre as dnombre,localidades.nombre as lnombre,empleado.calle as calle,empleado.profesion as profesion "
            . "from empleado,area,departamentos,localidades,rel_laboral,profesion "
            . "where empleado.cod_area=area.cod_area and empleado.departamento=departamentos.id_departamento and empleado.localidad=localidades.id_localidad and empleado.rel_laboral=rel_laboral.cod_laboral and empleado.profesion=profesion.codigo and area.cod_area=?";
    $consulta = $cnn->prepare($sql);
    $params = array($cod_area);
    if ($consulta->execute($params)) {
        //echo "consulta ejecutada...<br><br>";
    }
    else {
        print_r($consulta->errorInfo());
    }
    return $consulta;
}

function agregarempleado($dniempleado, $num_legajo, $num_contrato,$nomyape,$cuil,$fechanac,$departamento,$localidad,$barrio,$calle,$rel_laboral,$fecha_ingreso,$estado_civil,$cod_area,$num_control,$num_iosep,$telefono,$profesion,$codigo_educativo) {
    include "conexion.php";
    $sql = "insert into empleado (dniempleado,num_legajo,num_contrato,nomyape,cuil,fechanac,departamento,localidad,barrio,calle,rel_laboral,fecha_ingreso,estado_civil,cod_area,num_control,num_iosep,telefono,profesion,codigo_educativo) values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    $consulta = $cnn->prepare($sql);
    $params = array($dniempleado, $num_legajo, $num_contrato,$nomyape,$cuil,$fechanac,$departamento,$localidad,$barrio,$calle,$rel_laboral,$fecha_ingreso,$estado_civil,$cod_area,$num_control,$num_iosep,$telefono,$profesion,$codigo_educativo);
    if ($consulta->execute($params)) {
        return 1;
        echo "consulta ejecutada...<br><br>";
    }
    else {
       print_r($consulta->errorInfo());
        return 0;
        
    }
    //return $consulta;
}

function rel_laboral() {
    include "conexion.php";
    $sql = "select cod_laboral,descripcion from rel_laboral";
    $consulta = $cnn->prepare($sql);
    
    if ($consulta->execute()) {
        //echo "consulta ejecutada...<br><br>";
    }
    else {
        //print_r($consulta->errorInfo());
    }
    return $consulta;
}

function nivel_educativo() {
    include "conexion.php";
    $sql = "select codigo,descripcion from nivel_educativo ";
    $consulta = $cnn->prepare($sql);
    
    if ($consulta->execute()) {
        //echo "consulta ejecutada...<br><br>";
    }
    else {
        //print_r($consulta->errorInfo());
    }
    return $consulta;
}

function estado_civil() {
    include "conexion.php";
    $sql = "select codigo,descripcion from estado_civil ";
    $consulta = $cnn->prepare($sql);
    
    if ($consulta->execute()) {
        //echo "consulta ejecutada...<br><br>";
    }
    else {
        //print_r($consulta->errorInfo());
    }
    return $consulta;
}
function departamentos() {
    include "conexion.php";
    $sql = "select id_departamento,nombre from departamentos";
    $consulta = $cnn->prepare($sql);
    
    if ($consulta->execute()) {
        //echo "consulta ejecutada...<br><br>";
    }
    else {
        //print_r($consulta->errorInfo());
    }
    return $consulta;
}

function getlocalidad() {
    include "conexion.php";
    $sql = "select id_localidad,nombre 
            from localidades ";
    $consulta = $cnn->prepare($sql);
    
    if ($consulta->execute($params)) {
        //echo "consulta ejecutada...<br><br>";
    }
    else {
        //print_r($consulta->errorInfo());
    }
    return $consulta;
}

function profesion() {
    include "conexion.php";
    $sql = "select codigo,descripcion 
            from profesion ";
    $consulta = $cnn->prepare($sql);
    
    if ($consulta->execute($params)) {
        //echo "consulta ejecutada...<br><br>";
    }
    else {
        //print_r($consulta->errorInfo());
    }
    return $consulta;
}

function areas() {
    include "conexion.php";
    $sql = "select cod_area,descripcion from area order by cod_area desc";
    $consulta = $cnn->prepare($sql);
    
    if ($consulta->execute()) {
        //echo "consulta ejecutada...<br><br>";
    }
    else {
        //print_r($consulta->errorInfo());
    }
    return $consulta;
}
function listarxdni($dni) {
    include "conexion.php";
    $sql = "select empleado.dniempleado as dni,empleado.nomyape as nomyape,empleado.num_legajo as num_legajo,empleado.num_contrato as num_contrato,empleado.cod_area,area.descripcion as adescripcion,rel_laboral.descripcion as reldescripcion, empleado.fecha_ingreso as fecha_ingreso,empleado.num_control as num_control,empleado.num_iosep as num_iosep,empleado.cuil as cuil,empleado.fechanac as fechanac,empleado.estado_civil as estado_civil,departamentos.nombre as dnombre,localidades.nombre as lnombre,empleado.calle as calle,barrio,empleado.telefono as telefono,empleado.profesion as profesion,empleado.codigo_educativo as codigo_educativo "
            . "from empleado,area,departamentos,localidades,rel_laboral,profesion,estado_civil "
            . "where empleado.cod_area=area.cod_area and empleado.departamento=departamentos.id_departamento and empleado.localidad=localidades.id_localidad and empleado.rel_laboral=rel_laboral.cod_laboral and empleado.profesion=profesion.codigo and empleado.estado_civil=estado_civil.codigo and dniempleado=?";
    $consulta = $cnn->prepare($sql);
    $params = array($dni);
    if ($consulta->execute($params)) {
        //echo "consulta ejecutada...<br><br>";
    }
    else {
        print_r($consulta->errorInfo());
    }
    return $consulta;
}
function listarxdni1($dni) {
    include "conexion.php";
    $sql = "select barrio,empleado.dniempleado as dni,empleado.nomyape as nomyape,empleado.num_legajo as num_legajo,empleado.departamento,empleado.localidad,empleado.num_contrato as num_contrato,empleado.cod_area,area.descripcion as adescripcion,empleado.rel_laboral,rel_laboral.descripcion as reldescripcion, empleado.fecha_ingreso as fecha_ingreso,empleado.num_control as num_control,empleado.num_iosep as num_iosep,empleado.cuil as cuil,empleado.fechanac as fechanac,empleado.estado_civil as estado_civil,departamentos.nombre as dnombre,localidades.nombre as lnombre,empleado.calle as calle,empleado.telefono as telefono,empleado.profesion as profesion,empleado.codigo_educativo as codigo_educativo "
            . "from empleado,area,departamentos,localidades,rel_laboral,nivel_educativo,profesion,estado_civil "
            . "where empleado.codigo_educativo=nivel_educativo.codigo and empleado.cod_area=area.cod_area and empleado.departamento=departamentos.id_departamento and empleado.localidad=localidades.id_localidad and empleado.rel_laboral=rel_laboral.cod_laboral and empleado.profesion=profesion.codigo and empleado.estado_civil=estado_civil.codigo and dniempleado=?";
    $consulta = $cnn->prepare($sql);
    $params = array($dni);
    if ($consulta->execute($params)) {
        //echo "consulta ejecutada...<br><br>";
    }
    else {
        print_r($consulta->errorInfo());
    }
    return $consulta->fetch();
}
function modificarempleado($dninuevo, $num_legajo, $num_contrato,$nomyape,$cuil,$fechanac,$departamento,$localidad,$barrio,$calle,$rel_laboral,$fecha_ingreso,$estado_civil,$cod_area,$num_control,$num_iosep,$telefono,$profesion,$codigo_educativo,$dniviejo) {
    include "conexion.php";
    $sql = "update empleado set dniempleado=?,num_legajo=?,num_contrato=?,nomyape=?,cuil=?,fechanac=?,departamento=?,localidad=?,barrio=?,calle=?,rel_laboral=?,fecha_ingreso=?,estado_civil=?,cod_area=?,num_control=?,num_iosep=?,telefono=?,profesion=?,codigo_educativo=? where dniempleado=?";
    $consulta = $cnn->prepare($sql);
    $params = array($dninuevo, $num_legajo, $num_contrato,$nomyape,$cuil,$fechanac,$departamento,$localidad,$barrio,$calle,$rel_laboral,$fecha_ingreso,$estado_civil,$cod_area,$num_control,$num_iosep,$telefono,$profesion,$codigo_educativo,$dniviejo);
    if ($consulta->execute($params)) {
        return 1;
        echo "consulta ejecutada...<br><br>";
    }
    else {
        return 0;
        print_r($consulta->errorInfo());
    }
    //return $consulta;
}
function getempleadoBusqueda($nombre) {
    include "conexion.php";
    $sql = "select empleado.dniempleado as dni,empleado.nomyape as nomyape,empleado.num_legajo as num_legajo,empleado.num_contrato as num_contrato,area.descripcion as adescripcion,rel_laboral.descripcion as reldescripcion, empleado.fecha_ingreso as fecha_ingreso,empleado.num_control as num_control,empleado.num_iosep as num_iosep,empleado.cuil as cuil,empleado.fechanac as fechanac,empleado.estado_civil as estado_civil,departamentos.nombre as dnombre,localidades.nombre as lnombre,empleado.calle as calle,empleado.profesion as profesion "
            . "from empleado,area,departamentos,localidades,rel_laboral,profesion,estado_civil "
            . "where empleado.cod_area=area.cod_area and empleado.departamento=departamentos.id_departamento and empleado.localidad=localidades.id_localidad and empleado.rel_laboral=rel_laboral.cod_laboral and empleado.profesion=profesion.codigo and empleado.estado_civil=estado_civil.codigo and nomyape LIKE ?";
    $consulta = $cnn->prepare($sql);
    $params = array("%$nombre%");
    if ($consulta->execute($params)) {
        //echo "consulta ejecutada...<br><br>";
    }
    else {
        //print_r($consulta->errorInfo());
    }
    return $consulta;
}
