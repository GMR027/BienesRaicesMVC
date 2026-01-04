<?php 
require_once __DIR__ . '/../includes/app.php';


use MVC\Router;
use Controllers\PaginasController;
use Controllers\PropiedadControladora;
use Controllers\VendedorController;

$router = new Router();

//debuguear(PropiedadControladora::class);

//Zona privada
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
$router->post('/vendedores/eliminar', [VendedorController::class, 'eliminar']);


//Zona publica
$router->get('/', [PaginasController::class, 'index']);
$router->get('/nosotros', [PaginasController::class, 'nosotros']);
$router->get('/propiedades', [PaginasController::class, 'propiedades']);
$router->get('/contacto', [PaginasController::class, 'contacto']);
$router->post('/contacto', [PaginasController::class, 'contacto']);
$router->get('/propiedad', [PaginasController::class, 'propiedad']);
$router->get('/blog', [PaginasController::class, 'blog']);
$router->get('/entradaBlog', [PaginasController::class, 'entradaBlog']);


$router->ComprobarRutas();

?>