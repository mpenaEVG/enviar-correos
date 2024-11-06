<?php 
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
 
  require 'vendor/autoload.php';


  if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['alumnos'])){
    
    $alumnos = $_POST['alumnos'];
    var_dump($alumnos);
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
            $mail->addAddress($alumno['correo'],$alumno['nombre']);
            $mail->Subject = 'Detalles de la cuenta';
            $mail->Body = "Hola ". $alumno['nombre'] .", bienvenido a la escuela de guadalupe, tus credenciales son: \n 
              Usuario: ". $alumno['usuario'] ."\n 
              Contraseña: ". $alumno['contraseña'] ."\n 
              Un saludo cordial.";

              if($mail->send()){

              echo "Correo enviado a ". $alumno['nombre'] ." ,". $alumno['correo'] ."</br>";
            }else{

              echo "El correo no pudo ser enviado a ". $alumno['correo'] ."  ". $mail->ErrorInfo ."</br>";
            }
         }
      
      } catch (Exception $e) {
        echo "Error al enviar el correo a $correo: {$mail->ErrorInfo}</br>";
      }
    }
  
  




