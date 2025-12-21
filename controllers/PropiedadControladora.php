<?php

namespace Controllers;
use MVC\Router;

class PropiedadControladora {
  public static  function index(Router $router) { //los que esta en parentesis es para mantener la referencia de index.php, pasar el mismo objeto
    //echo 'Index asi super wow';
    //debuguear($router);
    $router->render('/views/propiedades/admin.php');
  }

  public static function crear(Router $router) {
    echo 'Desde metodo crear';
    $router->render('/views/propiedades/crear.php');
  }

  public static function actualizar(Router $router) {
    echo 'Desde metodo actualizar';
    $router->render('/views/propiedades/actualizar.php');
  }
}

