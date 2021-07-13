<?php
 error_reporting(E_ALL ^ E_NOTICE);
 ?>
     <?php
session_name("rrhh");
session_start();
if ($_SESSION[autenticado]!=1) {
    header ("Location: index.php?error=login");    
}
?>

