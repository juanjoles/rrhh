<?php
 error_reporting(E_ALL ^ E_NOTICE);
 ?>
<?php

if ($_GET) {
    if ($_GET[error]=="user") {
        $mensaje = "El usuario no existe.";
    }
    else
        if ($_GET[error]=="pass") {
            $mensaje = "La clave no es correcta.";
        }
        else {
            if ($_GET[error]=="login") {
                $mensaje = "Primero debe loguearse.";
            }
        }
}
?>

<html>
    <meta>
        <link rel="stylesheet" type="text/css" href="estilos/estilos.css?version=20120717" />
        <link rel="StyleSheet" href="estilos/estilos.css" type="text/css">
        <script type=text/javascript lenguage="javascript" src="java/funciones.js"></script>
        <script type=text/javascript lenguage="javascript" src="java/jquery-1.11.1.js"></script>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    </meta>

    <body>
        <?php include "estructura/encabezado.php"; ?>
        <div class="principal">
        
        <form method="post" action="autenticar.php">
        <center><table border="0" class="tabla_inicio">
        <tr><th colspan="2"><br><br><br><br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   INICIE SESI&Oacute;N</th></tr>
        <tr><td>Usuario:</td><td><input name="user" /></td></tr>
        <tr><td>Clave:</td><td><input type="password" name="pass" /></td></tr>
        <tr><th colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="Entrar" /></th></tr>
        
        <tr><td colspan="2"><div class="error_login"><?php echo $mensaje; ?></div></td></tr>
            </table></center>
        </form>
            
        </div>
    <?php include "estructura/pie.php"; ?>    
    </body>
</html>
