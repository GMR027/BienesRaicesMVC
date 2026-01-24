<?php

namespace Controllers;

use MVC\Router;
use Model\Propiedad;
use PHPMailer\PHPMailer\PHPMailer;

class PaginasController {
  public static function index(Router $router) {
    echo 'Desde el index';
    $propiedades = Propiedad::mostrar(3);
    $inicioIndex = true;

    $router->render('/views/paginas/index.php', [
      'propiedades' => $propiedades,
      'inicio' => $inicioIndex
    ]);
  }

  public static function nosotros (Router $router) {
    echo 'Desde el nosotros';
    $router->render('/views/paginas/nosotros.php', []);
  }

  public static function propiedades(Router $router) {
    echo 'Desde el propiedades';
    $propiedades = Propiedad::all();
    $router->render('/views/paginas/propiedades.php', [
      'propiedades' => $propiedades
    ]);
  }

  public static function propiedad(Router $router) {
    echo 'Desde el propiedad';
    $id = validarId('/propiedades');
    $propiedad = Propiedad::find($id);
    $router->render('/views/paginas/propiedad.php', [
      'propiedad' => $propiedad
    ]);
  }

  public static function blog(Router $router) {
    echo 'Desde el blog';
    $router->render('/views/paginas/blog.php', []);
  }

  public static function entradaBlog(Router $router) {
    echo 'Desde el entradaBlog';
    $router->render('/views/paginas/entradaBlog.php', []);
  }

  public static function contacto(Router $router) {
    echo 'Desde el contacto';
    $mensaje = null;

    if($_SERVER['REQUEST_METHOD'] === 'POST' ) {
      //debuguear($_POST);
      $respuestas = $_POST['contacto'];

      //Crear una instancia de php mailer
      $mail = new PHPMailer();
      $mail->isSMTP();  //Configurar SMTP para envio de correos
      $mail->Host = 'sandbox.smtp.mailtrap.io'; //host de pagina web que gestiona los correos
      $mail->SMTPAuth = true;
      $mail->Username = '47f092d9f184d4';
      $mail->Password = 'e664e71e586e8d';
      $mail->SMTPSecure = 'tls'; //emails seguros 
      $mail->Port = 2525;

      
      //Configurar contenido del email (Recipients)
      $mail->setFrom('admin@bienesraices.com');
      $mail->addAddress('admin@bienesraices.com', 'Bienes Raices');
      $mail->Subject = 'Tienes un nuevo mensaje Perro!';

      //Habilitar HTML
      $mail->isHTML(true);
      $mail->CharSet = 'UTF-8';


      //Definir contenido
      $contenido = '<html>';
      $contenido .= '<p>Tienes un nuevo mensaje: </p>';
      $contenido .= ' <p>Nombre: ' .  $respuestas['nombre']  . '</p>';
      

      //envio condicional de correo o telefono
      
      if($respuestas['contacto'] === 'telefono') {
        $contenido .= '<p>Eligio ser contactado por telefono </p>';
        $contenido .= ' <p>Telefono: ' .  $respuestas['telefono']  . '</p>';
        $contenido .= ' <p>Fecha de contacto: ' .  $respuestas['fecha']  . '</p>';
        $contenido .= ' <p>Hora de contacto: ' .  $respuestas['hora']  . '</p>';
      } else {
        $contenido .= '<p>Eligio ser contactado por email </p>';
        $contenido .= ' <p>Correo: ' .  $respuestas['email']  . '</p>';
      }

      
      $contenido .= ' <p>Requerimiento: ' .  $respuestas['tipo']  . '</p>';
      $contenido .= ' <p>Presupuesto: $' .  $respuestas['precio']  . '</p>';
      $contenido .= ' <p>Medio de comunicacion: ' .  $respuestas['contacto']  . '</p>';
      $contenido .= ' <p>Mensaje: ' .  $respuestas['mensaje']  . '</p>';
      
      $contenido .= '</html>';


      $mail->Body = $contenido;
      $mail->AltBody = 'Texto alternativo sin html';

      //enviar email
      if($mail->send()) {
        $mensaje = 'Mensaje enviado';
      } else {
        $mensaje = 'Error de envio de mensaje';
      }
    }
    $router->render('/views/paginas/contacto.php', [
      'mensaje' => $mensaje
    ]);
  }

}

