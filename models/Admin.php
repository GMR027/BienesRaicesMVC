<?php 


namespace Model;

class Admin extends ActiveRecord {
  //Base de datos
  protected static $tabla = 'usuarios';
  protected static $colDB = ['id', 'email', 'pasword'];

  public $id;
  public $email;
  public $pasword;

  public function __construct($args = [])
  {
    $this->id =$args['id'] ?? null;
    $this->email =$args['email'] ?? '';
    $this->pasword =$args['pasword'] ?? '';
  }

  public function validar () {
    if(!$this->email) {
      self::$errores[] = 'El email es obligatorio';
    }
    if(!$this->pasword) {
      self::$errores[] = 'La contrasena es obligatoria';
    }

    return self::$errores;
  }

  public function existeUsuario() {
    //revisar si existe usuario
    $query = "SELECT * FROM " . self::$tabla . " WHERE email = '" . $this->email .  "' LIMIT 1";
    $resultado = self::$infoBasedatos->query($query);

    //debuguear($resultado);
    if(!$resultado->num_rows) {
      self::$errores[] = 'El usuario no existe';
      return;
    }

    return $resultado;
  }

  public function verificarPassword($ingreso) {
    $usuario = $ingreso->fetch_object();
    //debuguear($usuario);

    $autenticado = password_verify($this->pasword, $usuario->pasword);

    if(!$autenticado) {
      self::$errores[] = 'Contrasena incorrecta';
    } 

    return $autenticado;
  }
}