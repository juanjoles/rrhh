
      <?php 
        include "bd/empleados.php";
        include "bd/familia.php";
        if ($_GET) {
            if ($_GET[op]=="eliminar") { //estoy eliminando
                eliminarfamilia($_GET[dni]);
            }
        }
        $consulta2 =listafamilia($_POST[dniempleado]); 
        
        echo "<center><table border=1 size='2' bgcolor='#A4A4A4' class='table2'></center><br><br>";
        echo"<h3><center>GRUPO FAMILIAR</center></h3>";
        echo "<tr><th>Nombre y Apellido</th><th>DNI Empleado</th><th>DNI</th><th>Fecha Nacimiento</th><th>Parentesco</th>";
        
        while ($registro = $consulta2->fetch()) {
            $fi=date("d-m-Y", strtotime($registro[fecha_nacimiento]));
            echo "<tr><td>$registro[nomyape]</td>";
            echo "<td><center>$registro[dniempleado]</center></td>";
            echo "<td><center>$registro[dni]</center></td>";
            echo "<td><center>$fi</center></td>";
            echo "<td><center>$registro[nombre]</center></td>";
            echo "<td><a href='agregarfamilia.php?dni=$registro[dni]'>Modificar</button></td>";
            echo "</tr>";
        }
        echo "</table>";
        
        ?> 
        