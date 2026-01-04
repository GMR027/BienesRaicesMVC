<?php

namespace Controllers;

use MVC\Router;
use Model\Propiedad;

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
    $router->render('/views/paginas/propiedad.php', []);
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
    $router->render('/views/paginas/contacto.php', []);
  }

}