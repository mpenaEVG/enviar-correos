<?php 
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
 
  require 'vendor/autoload.php';


  if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['alumnos'])){
    
    $alumnos = $_POST['alumnos'];
    $cabecera = $_POST['cabecera'];

      $mail = new PHPMailer(true);

      try {
        // Configuracion servicio SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'mauri.pea@gmail.com';
        $mail->Password = getenv('SMTP_PASSWORD');
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        foreach ($alumnos as $alumno) {
          $alumno = array_change_key_case($alumno,CASE_LOWER); //Cambiamos todas las claves a minúscula
          if(isset($alumno['correo']) && !empty($alumno['correo'])){
            if(isset($alumno['nombre']) && !empty($alumno['nombre'])){
              $mail->addAddress($alumno['correo'],$alumno['nombre']);
              $mail->Subject = 'Credenciales Hosting';


              $body = 'Hola '. $alumno['nombre'] ."! tus credenciales del hosting son las siguientes:\n"; 
              foreach($cabecera as $columna){
                if(isset($alumno[$columna])){
                  if($columna !== 'correo' && $columna !== 'nombre'){
                     $body .= $columna .": ". $alumno[$columna] . "\n";
                  }
                }
              }
              $body .= "\n Un saludo cordial";
              $mail->Body = $body;

              if($mail->send()){
                echo "Correo enviado a". $alumno['nombre'] ." (". $alumno['correo']. ")";
              } else{

                echo "Fallo: correo no pudo ser enviado a". $alumno['nombre'] ." (". $alumno['correo']. ")";
              }
            }else{
              echo "Faltan datos para el nombre del alumno: " . $alumno['correo'] . "<br>";
            } 
          } else {
              echo "El alumno no tiene correo válido: " . (isset($alumno['nombre']) ? $alumno['nombre'] : 'Desconocido') . "<br>";
          }
        }
          
      } catch (Exception $e) {
        echo "Error al enviar el correo a $correo: {$mail->ErrorInfo}</br>";
      }
    }
  
  




