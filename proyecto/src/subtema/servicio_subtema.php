<?php
// Incluimos la conexión con la base de datos.
include_once(dirname(dirname(dirname(__FILE__))) . "/src/subtema/db_subtema.php");

// Incluimos el modelo del subtema
include_once(dirname(dirname(dirname(__FILE__))) . "/src/subtema/subtema.php");

class ServicioSubTema
{
  // Variable para almacenar la conexión con la DB.
  private $db_subtema;

  // Constructor de la clase.
  public function __construct()
  {
    // Instancia de clase para SQL de SubTema.
    $this->db_subtema = new DBSubTema();
  }

  // Función para obtener un subtema a partir del ID.
  public function obtenerSubTemaPorID($id_subtema)
  {
    // Obtenemos el subtema (o nulo).
    $subtema = $this->db_subtema->obtenerSubTemaPorID($id_subtema);

    // Regresamos el resultado.
    return $subtema;
  }

  // Función para actualizar un subtema.
  public function actualizarSubTema($subtema)
  {
    // Validamos que el subtema exista.
    $subtema_encontrado = $this->db_subtema->obtenerSubTemaPorID($subtema->id);
    if ($subtema_encontrado == null) {
      // El subtema no existe, regresamos null.
      return null;
    }

    // Actualizamos el subtema en la base de datos.
    $subtema_actualizado = $this->db_subtema->actualizarSubTema($subtema);

    // Regresamos el subtema actualizado.
    return $subtema_actualizado;
  }

  // Función para obtener todos los subtemas.
  public function obtenerSubTemas()
  {
    // Obtenemos todos los subtemas de la DB.
    return $this->db_subtema->obtener_todos();
  }

  // Función para eliminar un subtema en función de su ID.
  public function eliminarSubTema($id_subtema)
  {
    // Ejecutamos la operación en la base de datos.
    return $this->db_subtema->eliminarSubTema($id_subtema);
  }

  // Función para crear un subtema
  public function crearSubTema($subtema_nuevo)
  {
    // Validación

    // Si es válido, insertamos en la DB.
    return $this->db_subtema->insertarSubTema($subtema_nuevo);
  }
}
