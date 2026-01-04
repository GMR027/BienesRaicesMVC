<?php

namespace MVC;

class Router {

  public $rutasGet = [];
  public $rutasPost = [];

  public function get($url, $funcion) {
    $this->rutasGet[$url] = $funcion;
  }

  public function post($url, $funcion) {
    $this->rutasPost[$url] = $funcion;
  }

  public function ComprobarRutas () {
    //echo 'Desde funcion comprobar rutas';
    $urlActual = $_SERVER['REQUEST_URI']; //leer url valida
    $metodo = $_SERVER['REQUEST_METHOD'];
    

    if($metodo === 'GET') {
      //echo 'Es metodo get';
      //debuguear($this->rutasGet);
      //debuguear($this->rutasGet[$urlActual]);
      $funcion = $this->rutasGet[$urlActual] ?? null;
      //debuguear($fn);
    } else if ($metodo === 'POST') {
      //debuguear($this);
      $funcion = $this->rutasPost[$urlActual] ?? null;
    }

    if($funcion) {
      //debuguear($funcion); //imprimir el controlador y que metodo va usar
      //debuguear($this);

      call_user_func($funcion, $this);
    } else {
      echo "Pagina no encontrada";
    }
  }


  //Muestra una vista
  public function render($view, $datos = []) {
    //echo 'renderizando pagina';
    //debuguear($datos);
    foreach($datos as $key => $value) {
      $$key = $value;  //$$variable de variable
    }

    ob_start(); //iniciar un almacenamiento en memoria
    include_once __DIR__ . $view; //inf de paginas propiedades

    $contenido = ob_get_clean();  //Limpia el buffer de la memoria
    include_once __DIR__ . '/views/layout.php'; //inf de layout general y que en medio se intregrara la informacion de las paginas propiedades

  }


}