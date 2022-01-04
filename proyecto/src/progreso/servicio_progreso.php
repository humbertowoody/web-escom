<?php
// Incluimos la conexión con la base de datos.
include_once(dirname(dirname(dirname(__FILE__))) . "/src/progreso/db_progreso.php");

// Incluimos el modelo del progreso
include_once(dirname(dirname(dirname(__FILE__))) . "/src/progreso/progreso.php");

class ServicioProgreso
{
  // Variable para almacenar la conexión con la DB.
  private $db_progreso;

  // Constructor de la clase.
  public function __construct()
  {
    // Instancia de clase para SQL de Progreso.
    $this->db_progreso = new DBProgreso();
  }

  // Función para obtener un progreso a partir del ID.
  public function obtenerProgresoPorID($id_progreso)
  {
    // Obtenemos el progreso (o nulo).
    $progreso = $this->db_progreso->obtenerProgresoPorID($id_progreso);

    // Regresamos el resultado.
    return $progreso;
  }

  // Función para actualizar un progreso.
  public function actualizarProgreso($progreso)
  {
    // Validamos que el progreso exista.
    $progreso_encontrado = $this->db_progreso->obtenerProgresoPorID($progreso->id);
    if ($progreso_encontrado == null) {
      // El progreso no existe, regresamos null.
      return null;
    }

    // Actualizamos el progreso en la base de datos.
    $progreso_actualizado = $this->db_progreso->actualizarProgreso($progreso);

    // Regresamos el progreso actualizado.
    return $progreso_actualizado;
  }

  // Función para obtener todos los progresos.
  public function obtenerProgresos()
  {
    // Obtenemos todos los progresos de la DB.
    return $this->db_progreso->obtener_todos();
  }

  // Función para crear un progreso
  public function crearProgreso($progreso_nuevo)
  {
    // Validación

    // Si es válido, insertamos en la DB.
    return $this->db_progreso->insertarProgreso($progreso_nuevo);
  }
}
