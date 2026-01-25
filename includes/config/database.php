<?php

function conectarBD() : mysqli {
  $host = $_ENV['ENV'] ?? 'localhost';
  if ($host == 'production') {
    $baseDatos = new mysqli (
      $_ENV['DB_HOST'],
      $_ENV['DB_USER'],
      $_ENV['DB_PASSWORD'],
      $_ENV['DB_NAME']
    );
  } else {
    $baseDatos = new mysqli ('localhost', 'root', '2705', 'bienesRaices');
  }
  $baseDatos->set_charset("utf8"); //Indicador para que muestre los acentos y las N

  //Forma para validar conexion
  // if($baseDatos) {
  //   echo 'Se conecto a la base de datos';
  // } else {
  //   echo 'No se pudo conectar a la base de datos';
  // }

  if(!$baseDatos) {
    echo 'Error en conexion base de datos';
    exit;
  }

  return $baseDatos;
}