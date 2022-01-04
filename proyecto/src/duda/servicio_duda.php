<?php
// Incluimos la conexión con la base de datos.
include_once(dirname(dirname(dirname(__FILE__))) . "/src/duda/db_duda.php");

// Incluimos el modelo del duda
include_once(dirname(dirname(dirname(__FILE__))) . "/src/duda/duda.php");

class ServicioDuda
{
  // Variable para almacenar la conexión con la DB.
  private $db_duda;

  // Constructor de la clase.
  public function __construct()
  {
    // Instancia de clase para SQL de Duda.
    $this->db_duda = new DBDuda();
  }

  // Función para obtener un duda a partir del ID.
  public function obtenerDudaPorID($id_duda)
  {
    // Obtenemos el duda (o nulo).
    $duda = $this->db_duda->obtenerDudaPorID($id_duda);

    // Regresamos el resultado.
    return $duda;
  }

  // Función para actualizar un duda.
  public function actualizarDuda($duda)
  {
    // Validamos que el duda exista.
    $duda_encontrado = $this->db_duda->obtenerDudaPorID($duda->id);
    if ($duda_encontrado == null) {
      // El duda no existe, regresamos null.
      return null;
    }

    // Actualizamos el duda en la base de datos.
    $duda_actualizado = $this->db_duda->actualizarDuda($duda);

    // Regresamos el duda actualizado.
    return $duda_actualizado;
  }

  // Función para obtener todos los dudas.
  public function obtenerDudas()
  {
    // Obtenemos todos los dudas de la DB.
    return $this->db_duda->obtener_todos();
  }

  // Función para crear un duda
  public function crearDuda($duda_nuevo)
  {
    // Validación

    // Si es válido, insertamos en la DB.
    return $this->db_duda->insertarDuda($duda_nuevo);
  }
}
