<?php

namespace Controllers;
use MVC\Router;
use Model\Admin;

class LoginController {
  public static function login (Router $router) {
    echo 'Desde login';
    $errores = [];

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
      //echo 'Probando.....';
      //debuguear($_POST);
      $auth = new Admin($_POST);
      $errores = $auth->validar();

      if(empty($errores)) {
        //Verificar si usuario existe
        $ingreso = $auth->existeUsuario();

        if(!$ingreso) {
          $errores = Admin::getErrores();
        } else {
           //verificar password
          $autenticado = $auth->verificarPassword($ingreso);

          if($autenticado) {
          //Autenticar usuario
            echo 'Ingreso correcto';
          } else {
            $errores = Admin::getErrores();
          }
        }
       
      }
    }

    $router->render('/views/auth/login.php', [
      'errores' => $errores
    ]);
  }

  public static function logout () {
    echo 'desde logout';
  }
}