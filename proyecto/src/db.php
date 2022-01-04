<?php
// Importamos la configuración general de la aplicación.
require_once(dirname(dirname(__FILE__)) . '/src/config.php');

class Conexion
{
  private $db_con;

  public function __construct()
  {
    // Conexión con la base de datos
    $this->db_con = new mysqli(Config::$db_host, Config::$db_user, Config::$db_pass, Config::$db_name);
  }

  public function obtenerConexion()
  {
    return $this->db_con;
  }
}
