<?php
// Incluimos la conexión con la base de datos.
include_once(dirname(dirname(dirname(__FILE__))) . "/src/bloque/db_bloque.php");

// Incluimos el modelo del bloque
include_once(dirname(dirname(dirname(__FILE__))) . "/src/bloque/bloque.php");

class ServicioBloque
{
  // Variable para almacenar la conexión con la DB.
  private $db_bloque;

  // Constructor de la clase.
  public function __construct()
  {
    // Instancia de clase para SQL de Bloque.
    $this->db_bloque = new DBBloque();
  }

  // Función para obtener un bloque a partir del ID.
  public function obtenerBloquePorID($id_bloque)
  {
    // Obtenemos el bloque (o nulo).
    $bloque = $this->db_bloque->obtenerBloquePorID($id_bloque);

    // Regresamos el resultado.
    return $bloque;
  }

  // Función para actualizar un bloque.
  public function actualizarBloque($bloque)
  {
    // Validamos que el bloque exista.
    $bloque_encontrado = $this->db_bloque->obtenerBloquePorID($bloque->id);
    if ($bloque_encontrado == null) {
      // El bloque no existe, regresamos null.
      return null;
    }

    // Actualizamos el bloque en la base de datos.
    $bloque_actualizado = $this->db_bloque->actualizarBloque($bloque);

    // Regresamos el bloque actualizado.
    return $bloque_actualizado;
  }

  // Función para obtener todos los bloques.
  public function obtenerBloques()
  {
    // Obtenemos todos los bloques de la DB.
    return $this->db_bloque->obtener_todos();
  }

  // Función para eliminar un bloque en función de su ID.
  public function eliminarBloque($id_bloque)
  {
    // Ejecutamos la operación en la base de datos.
    return $this->db_bloque->eliminarBloque($id_bloque);
  }

  // Función para crear un bloque
  public function crearBloque($bloque_nuevo)
  {
    // Validación

    // Si es válido, insertamos en la DB.
    return $this->db_bloque->insertarBloque($bloque_nuevo);
  }
}
