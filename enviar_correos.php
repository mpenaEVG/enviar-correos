<?php 
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
  
  require 'vendor/autoload.php';

  $host = 'localhost';
  $db = '2daw';
  $user = 'mau';
  $password = getenv('DB_PASSWORD');



  try {

    $pdo = new pdo("mysql:host=$host;dbname=$db;charset=utf8",$user,$password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->query(("SELECT nombre, email FROM alumnos"));
    $alumnos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($alumnos as $alumno) {
      $nombre = $alumno['nombre'];
      $correo = $alumno['email'];
      $asunto = "Prueba de correo para $nombre";
      $mensaje = "Hola $nombre, esto es un correo de prueba generado con php";
      
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

        //Configuracion del correo
        $mail->setFrom('mauri.pea@gmail.com', 'Mauri');
        $mail->addAddress($correo,$nombre);
        $mail->Subject = $asunto;
        $mail->Body = $mensaje;

        $mail->send();
        echo "Correo enviado a $nombre, ($correo)</br>";
      
      } catch (Exception $e) {
        echo "Error al enviar el correo a $correo: {$mail->ErrorInfo}</br>";
      }
    }
  
  } catch (PDOException $e) {

    die("Error al conectar con la base de datos ". $e->getMessage());

  }
      




