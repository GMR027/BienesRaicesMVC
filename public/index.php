<?php 
require_once __DIR__ . '/../includes/app.php';
use MVC\Router;
use Controllers\PropiedadControladora;
use Controllers\VendedorController;

$router = new Router();

//debuguear(PropiedadControladora::class);


$router->get('/admin', [PropiedadControladora::class, 'index']);
$router->get('/propiedades/crear', [PropiedadControladora::class, 'crear']);
$router->post('/propiedades/crear', [PropiedadControladora::class, 'crear']);
$router->get('/propiedades/actualizar', [PropiedadControladora::class, 'actualizar']);
$router->post('/propiedades/actualizar', [PropiedadControladora::class, 'actualizar']);
$router->post('/propiedades/eliminar', [PropiedadControladora::class, 'eliminar']);
$router->get('/vendedores/crear', [VendedorController::class, 'crear']);
$router->post('/vendedores/crear', [VendedorController::class, 'crear']);
$router->get('/vendedores/actualizar', [VendedorController::class, 'actualizar']);
$router->post('/vendedores/actualizar', [VendedorController::class, 'actualizar']);

$router->ComprobarRutas();

?>