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
   
     foreach ($datosAlumnos as $index => $alumno) {
        echo "</br>";
        echo $alumno['nombre'] ." correo: " .$alumno['correo']. "/// Contraseña: ". $alumno['contraseña'] ." -- Usuario: ". $alumno['usuario'];
        echo '<input type="hidden" name="alumnos['. $index .'][nombre]" value="'. $alumno['nombre'] .'">';
        echo '<input type="hidden" name="alumnos['. $index .'][correo]" value="'. $alumno['correo'] .'">';
        echo '<input type="hidden" name="alumnos['. $index .'][contraseña]" value="'. $alumno['contraseña'] .'">';
        echo '<input type="hidden" name="alumnos['. $index .'][usuario]" value="'. $alumno['usuario'] .'">';

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
