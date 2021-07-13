<?php
 error_reporting(E_ALL ^ E_NOTICE);
 ?>
<right><img width='250' src='imagenes/logo2014.bmp' border="2" /></right> 
<div class="encabezado">
        <h3><center>DIR. GRAL. DE RECURSOS HUMANOS</center></h3>
    <div class="datos_sesion">
    <?php
    if ($_SESSION[autenticado]==1) {
        echo "$_SESSION[user] (desde $_SESSION[tiempo]) <a href='seguridad/salir.php'>[SALIR]</a>";
    }
    ?>
    </div>
</div>

