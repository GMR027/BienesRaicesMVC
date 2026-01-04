<?php 

namespace Controllers;
use MVC\Router;
use Model\Vendedores;

class VendedorController {
  public static function crear(Router $router) {
    echo 'Desde crear de vendedores';
    $vendedor = new Vendedores();
    $errores = Vendedores::getErrores();

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
      $vendedor = new Vendedores($_POST['vendedor']);
      $errores = $vendedor->validarErrores();

      if(empty($errores)) {
        $vendedor->guardar();
      }
    }

    $router->render('/views/vendedores/crear.php', [
      'vendedor' => $vendedor,
      'errores' =>$errores
    ]);
  }

  public static function actualizar(Router $router) {
    echo 'Desde actualizar vendedores';
    $id = validarId('/admin');
    $vendedor = Vendedores::find($id);
    $errores = Vendedores::getErrores();

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
      $arrayDatos = $_POST['vendedor'];
      $vendedor->sincronizar($arrayDatos);

      //debuguear($vendedor);

      $errores = $vendedor->validarErrores();

      if(empty($errores)) {
        $vendedor->guardar();
      }
    }

    $router->render('/views/vendedores/actualizar.php', [
      'errores' => $errores,
      'vendedor' => $vendedor
    ]);
  }


  public static function eliminar ( ) {
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
      $idvendedor = $_POST['idEliminar'];
      $idvendedor = filter_var($idvendedor, FILTER_VALIDATE_INT);
      //debuguear($_POST);

      if($idvendedor) {
        $tipo = $_POST['tipo'];

        if(validarTipo($tipo)) {
            $vendedor = Vendedores::find($idvendedor);
            $vendedor->eliminar();
          
        }
      }
    }
  }

}