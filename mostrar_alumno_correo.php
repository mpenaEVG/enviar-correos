<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Enviar Correo</title>
</head>
<body>

<?php 
        echo"</br>";
        echo "Desea enviar un correo a ";

        echo '<form action="enviar_correos.php" method="POST">'; 

         foreach($cabecera as $columna) {
            echo '<input type="hidden" name="cabecera[]" value="' . $columna . '">';
          }
        
        foreach($datosAlumnos as $index => $alumno){

          echo "</br>";
          foreach($cabecera as $columna){
            echo $columna .": ". $alumno[$columna] ." ";
          }

          foreach($cabecera as $columna){
            echo '<input type="hidden" name="alumnos['. $index .']['. $columna .']" value="'. $alumno[$columna]. '">';
          }
        }
        echo '</br>';
        echo '</br>';
        echo "?";
        echo '</br>';
        echo '</br>';
        echo '<button type="submit">Enviar Correos</button>';
        echo '</form>';
    ?>
  </body>
</html>
