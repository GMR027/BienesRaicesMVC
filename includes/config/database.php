<?php

/**
 * Constantes de configuración de la base de datos
 */
const DB_HOST = 'localhost';
const DB_USER = 'root';
const DB_PASSWORD = '2705';
const DB_NAME = 'bienesRaices';

/**
 * Conecta a la base de datos MySQL
 * 
 * @return mysqli Objeto de conexión a la base de datos
 * @throws Exception Si la conexión falla
 */
function conectarBD(): mysqli {
    // Obtener el entorno desde las variables de entorno
    $entorno = $_ENV['ENV'] ?? 'development';
    
    // Configuración de conexión según el entorno
    if ($entorno === 'production') {
        $host = $_ENV['DB_HOST'] ?? DB_HOST;
        $usuario = $_ENV['DB_USER'] ?? DB_USER;
        $password = $_ENV['DB_PASSWORD'] ?? DB_PASSWORD;
        $nombreBaseDatos = $_ENV['DB_NAME'] ?? DB_NAME;
    } else {
        $host = DB_HOST;
        $usuario = DB_USER;
        $password = DB_PASSWORD;
        $nombreBaseDatos = DB_NAME;
    }
    
    // Crear conexión a la base de datos
    $conexion = new mysqli($host, $usuario, $password, $nombreBaseDatos);
    
    // Verificar si la conexión fue exitosa
    if (!$conexion) {
        throw new Exception('Error en la conexión a la base de datos: ' . mysqli_connect_error());
    }
    
    // Establecer juego de caracteres UTF-8
    $conexion->set_charset("utf8");
    
    return $conexion;
}