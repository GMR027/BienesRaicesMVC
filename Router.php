<?php

namespace MVC;

class Router {

  public $rutasGet = [];
  public $rutasPost = [];

  public function get($url, $funcion) {
    $this->rutasGet[$url] = $funcion;
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
  public function render($view) {
    //echo 'renderizando pagina';
    include __DIR__ . $view;
  }

}