<?php 
// Activa la visualización de errores en el script
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
// Configura PHP para que reporte todos los tipos de errores
error_reporting(E_ALL);

require __DIR__ . './../vendor/autoload.php';
require 'funciones.php';
require 'config/database.php';




//conectarnos a la base de datos
$solicudBaseDatos = conectarBD();

use Model\ActiveRecord;

ActiveRecord::confDatabase($solicudBaseDatos);
