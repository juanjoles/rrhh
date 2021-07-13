<?php
 error_reporting(E_ALL ^ E_NOTICE);
 ?>
<?php        
        $driver = "mysql";
        $host   = "localhost";
        $user   = "root";
        $passw  = "";
        $dbname = "rrhh";
        $cnn = new PDO("$driver:host=$host;dbname=$dbname", "$user", "$passw");
        if ($cnn) {
          //  echo "Conectado...<br>";
        }
?>
