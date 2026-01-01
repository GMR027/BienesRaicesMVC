<?php

namespace Controllers;
use MVC\Router;
use Model\Propiedad;
use Model\Vendedores;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class PropiedadControladora {
  public static  function index(Router $router) { //los que esta en parentesis es para mantener la referencia de index.php, pasar el mismo objeto
    //echo 'Index asi super wow';
    //debuguear($router);
    $resultado = $_GET['resultado'] ?? null;

    $propiedades = Propiedad::all();
    $vendedores = Vendedores::all();
    $router->render('/views/propiedades/admin.php', [
      //"mensaje" => 'Desde la vista de admin'
      'propiedades' => $propiedades,
      'resultado' => $resultado,
      'vendedores' => $vendedores
    ]);
  }

  public static function crear(Router $router) {
    //echo 'Desde metodo crear';
    $propiedad = new Propiedad;
    $vendedoresLista = Vendedores::all();
    $errores = Propiedad::getErrores();

    if ($_SERVER['REQUEST_METHOD'] === 'POST' ) {
      //echo 'Comprobacion de conexion y verificacion de post';
      //debuguear($_POST);
      $propiedad = new Propiedad($_POST['propiedad']);
    //debuguear($_FILES['propiedad']);

    //generar nombre para imagenes
      $nombreIMG = md5(uniqid( rand(), true )) . '.jpg';

    if($_FILES['propiedad']['tmp_name']['imagenCargada']) {
      $manager = new ImageManager(Driver::class);
      $imagen = $manager->read($_FILES['propiedad']['tmp_name']['imagenCargada'])->cover(800, 600);
      $propiedad->setImage($nombreIMG);
      //debuguear($imagen);
    }

    //debuguear(CARPETA_IMG);

    $errores = $propiedad->validarErrores();

    //Revisar que el array de errores esta vacio
    if(empty($errores)){


      //carpeta de imagenes
      //$carpetaIMG = '../../imagenes/';
      if(!is_dir(CARPETA_IMG)) {
        mkdir(CARPETA_IMG);
      }
  
      //Guardar imagen en servidor
      $imagen->save(CARPETA_IMG . $nombreIMG);
      
      $propiedad->guardar();

      
    } 
    }

    $router->render('/views/propiedades/crear.php', [
      'propiedad' => $propiedad,
      'vendedores' => $vendedoresLista,
      'errores' => $errores
    ]);
  }

  public static function actualizar(Router $router) {
    echo 'Desde metodo actualizar';
    $id = validarId('/admin');
    $propiedad = Propiedad::find($id);
    $errores = Propiedad::getErrores();
    $vendedoresLista = Vendedores::all();
    //debuguear($id);

    if ($_SERVER['REQUEST_METHOD'] === 'POST' ) {
      $array = $_POST['propiedad'];
  
      $propiedad->sincronizar($array);
      //debuguear($propiedad);
  
      $errores = $propiedad->validarErrores();
  
      //generar nombre para imagenes
        $nombreIMG = md5(uniqid( rand(), true )) . '.jpg';
  
      //validacion subida de archivos
      if($_FILES['propiedad']['tmp_name']['imagenCargada']) {
        $manager = new ImageManager(Driver::class);
        $imagenLeida = $manager->read($_FILES['propiedad']['tmp_name']['imagenCargada'])->cover(800, 600);
        $propiedad->setImage($nombreIMG);
        //debuguear($imagen);
      }
      
      if(empty($errores)){
      //Almacenar imagen en DD
      if($_FILES['propiedad']['tmp_name']['imagenCargada']) {
            $imagenLeida->save(CARPETA_IMG . $nombreIMG);
        }
  
        $propiedad->guardar();
      } 
    }

    $router->render('/views/propiedades/actualizar.php', [
      'propiedad' => $propiedad,
      'errores' => $errores,
      'vendedores' => $vendedoresLista
    ]);
  }

  public static function eliminar() {
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
      $idEliminar = $_POST['idEliminar'];
    $idEliminar = filter_var($idEliminar, FILTER_VALIDATE_INT);
    //var_dump($idEliminar);

    if($idEliminar) {

      $tipo = $_POST['tipo'];
      //debuguear($tipo);
      if(validarTipo($tipo)) {
          if($tipo === 'propiedad') {
            //debuguear('Es valido');
            $propiedad = Propiedad::find($idEliminar);
            //debuguear($propiedad);
            $propiedad->eliminar();
          } else if($tipo === 'vendedor') {
            $vendedor = Vendedores::find($idEliminar);
            $vendedor->eliminar();
            //debuguear($vendedor);
          }
        }
      }
    }
  } 

}