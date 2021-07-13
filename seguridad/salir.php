<?php
session_name("rrhh");
session_start();
session_destroy();
header("Location: ../index.php");
?>

