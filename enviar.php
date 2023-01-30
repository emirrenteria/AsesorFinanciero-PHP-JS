<?php

use PHPMailer\PHPMailer\{PHPMailer, SMTP, Exception};

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';


// validamos para que no se puede aceder a enviar.php directamente con el enlace
if($_SERVER['REQUEST_METHOD'] != 'POST'){
  header("Location: index.html");
}


  $nombre = $_POST['nombre'];
  $asunto = $_POST['asunto'];
  $telefono = $_POST['telefono'];
  $email = $_POST['email'];
  $tipoUsuario = $_POST['tipoUsuario'];
  $mensaje = $_POST['mensaje'];

$msj = "De: $nombre <a href='mailto:$email'>$email</a><br>";
$msj .= "Asunto: $asunto<br><br>";
$msj .= "Nombre: $nombre<br> Telefono: $telefono<br> Tipo de Usuario: $tipoUsuario<br><br>";
$msj .= "Cuerpo del mensaje:";
$msj .= '<p>' . $mensaje . '</p>';
$msj .= "--<p>Este mensaje se ha enviado desde un formulario de contacto de Asesoria Financiera SA.</p>";

$mail = new PHPMailer(true);

          try {
              $mail->SMTPDebug = SMTP::DEBUG_OFF;
              $mail->isSMTP();
              $mail->Host = 'smtp.gmail.com';
              $mail->SMTPAuth = true;
              $mail->Username = 'erenteria50@misena.edu.co';
              $mail->Password = 'wmiahoewljxxavep';
              $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
              $mail->Port = 465;

              $mail->setFrom('erenteria50@misena.edu.co', 'contacto');
              $mail->addAddress('emir11r@hotmail.com', 'Receptor');
              //$mail->addReplyTo('otro@dominio.com');

              $mail->isHTML(true);
              $mail->Subject = 'Formulario de contacto';
              $mail->Body = utf8_decode($msj);

              $mail->send();

              $respuesta = 'Correo enviado';  ?>
             
<!DOCTYPE html>
<html lang="ES">

<head>
         
    <link href="https://fonts.googleapis.com/css?family=Pacifico|Roboto:100,300,400,500,700,900" rel="stylesheet" />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Asesores Financieros</title>

    <!-- ================== ESTILOS CSS ==================== -->

    <link href="./assets/css/normalize.css" rel="stylesheet" />
    <link href="./assets/css/reset.css" rel="stylesheet" />
    <link href="./assets/css/cabecera.css" rel="stylesheet" />
    <link href="./assets/css/menu/menu-item.css" rel="stylesheet" />
    <link href="./assets/css/menu/menu-link.css" rel="stylesheet" />
    <link href="./assets/css/menu/menu-lista.css" rel="stylesheet" />
    <link href="./assets/css/mensaje-enviado/mesaje-enviado.css" rel="stylesheet" />
    <link href="./assets/css/mensaje-enviado/mensaje-enviado-container.css" rel="stylesheet" />
    <link href="./assets/css/mensaje-enviado/mensaje-enviado-titulo.css" rel="stylesheet" />
    <link href="./assets/css/mensaje-enviado/mensaje-enviado-button.css" rel="stylesheet" />
    <link href="./assets/css/pie-de-pagina.css" rel="stylesheet" />
    <link href="./assets/css/logo.css" rel="stylesheet" />

     <!-- ================== ESTILOS CSS BOOTSTRAP ================== -->
     <link href="./plugins/bootstrap-4.5.3-dist/css/bootstrap.min.css" rel="stylesheet"/>


</head>

<body>
    <header class="cabecera">
        <img class="logo" src="./assets/img/logo.png" alt="Fruto y Fruta">
        <nav class="menu">
            <ul class="menu__lista">
                <li class="menu__item"> <a class="menu__link activo" href="#">Inicio</a> </li>
                <li class="menu__item"> <a class="menu__link" href="somos.html">¿Quienes somos?</a> </li>
                <li class="menu__item"> <a class="menu__link" href="testimonios.html">Testimonios</a> </li>
                <li class="menu__item"> <a class="menu__link" href="contacto.html">Contactanos</a> </li>
            </ul>
        </nav>
    </header>
    
    <section class="mensaje__enviado">
        <div class="mensaje__enviado__container">
            <h1 class="mensaje__enviado__titulo">
                ¡Mensaje enviado con éxito!
              </h1>
              <a href="./index.html" class="mensaje__enviado__button"> Volver atras </a>
        </div>
    </section>

   
    <footer class="pie-de-pagina">
        Contado: ejemplo@hotmail.com
    </footer>

</body>

</html>
             
              <?php
          } 
          
           catch (Exception $e) {
              $respuesta = 'Mensaje ' . $mail->ErrorInfo; 
              echo $respuesta;
          }
  ?>

