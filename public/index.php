<?php 
require_once __DIR__ . '/../includes/app.php';
use MVC\Router;
use Controllers\PropiedadControladora;

$router = new Router();

//debuguear(PropiedadControladora::class);


$router->get('/admin', [PropiedadControladora::class, 'index']);
$router->get('/propiedades/crear', [PropiedadControladora::class, 'crear']);
$router->get('/propiedades/actualizar', [PropiedadControladora::class, 'actualizar']);


$router->ComprobarRutas();

?>