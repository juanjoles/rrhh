    <?php
        include "bd/empleados.php";
        if ($_POST[tipo]=='area')
        {
            $consulta =empleadosarea($_POST[idarea]); 
        }
        else
        {
          if ($_POST[tipo]=='dni')
          {
            $consulta =  listarxdni($_POST[dni]); 
          }
        else
        {
         if ($_POST[tipo]=='nombre')
          {
            $consulta =  getempleadoBusqueda($_POST[nombre]); 
          }
        else {
            if ($_POST[tipo=='laboral']);
              {
                  $consulta = rel_laboral1($_POST[idlaboral]);
              }
        } 
        }
        }

        echo "<center><table border=1 size='2' bgcolor='#A4A4A4' class='table2'></center>";
        echo "<tr><th>DNI</th><th>Nombre y Apellido</th><th>Nº Legajo</th><th>Nº Contrato</th><th>Area</th><th>Rel. Laboral</th><th>Fecha Ingreso</th><th>Antiguedad</th><th>Nº Control</th>";
        
        while ($registro = $consulta->fetch()) {
            
             $sdate=date("Y");
            $e = $sdate - strftime("%Y", strtotime($registro[fecha_ingreso]));
            $fi=date("d-m-Y", strtotime($registro[fecha_ingreso]));
            echo "<tr><td>$registro[dni]</td>";
            echo "<td>$registro[nomyape]</td>";
            echo "<td>$registro[num_legajo]</td>";
            echo "<td>$registro[num_contrato]</td>";
            echo "<td>$registro[adescripcion]</td>";
            echo "<td>$registro[reldescripcion]</td>";
            echo "<td width='90'><center>$fi<center></td>";
            echo "<td><center>$e</center> </td>";
            echo "<td>$registro[num_control]</td>";
            
             
             echo "<td><a href='modificar_empleado.php?dni=$registro[dni]'>Otros Datos</a>";
   
        } 
        echo "</table>";

 