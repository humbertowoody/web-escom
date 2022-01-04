<?php
// Incluimos la conexión con la base de datos.
include_once(dirname(dirname(dirname(__FILE__))) . "/src/tema/db_tema.php");

// Incluimos el modelo del tema
include_once(dirname(dirname(dirname(__FILE__))) . "/src/tema/tema.php");

class ServicioTema
{
  // Variable para almacenar la conexión con la DB.
  private $db_tema;

  // Constructor de la clase.
  public function __construct()
  {
    // Instancia de clase para SQL de Tema.
    $this->db_tema = new DBTema();
  }

  // Función para obtener un tema a partir del ID.
  public function obtenerTemaPorID($id_tema)
  {
    // Obtenemos el tema (o nulo).
    $tema = $this->db_tema->obtenerTemaPorID($id_tema);

    // Regresamos el resultado.
    return $tema;
  }

  // Función para actualizar un tema.
  public function actualizarTema($tema)
  {
    // Validamos que el tema exista.
    $tema_encontrado = $this->db_tema->obtenerTemaPorID($tema->id);
    if ($tema_encontrado == null) {
      // El tema no existe, regresamos null.
      return null;
    }

    // Actualizamos el tema en la base de datos.
    $tema_actualizado = $this->db_tema->actualizarTema($tema);

    // Regresamos el tema actualizado.
    return $tema_actualizado;
  }

  // Función para obtener todos los temas.
  public function obtenerTemas()
  {
    // Obtenemos todos los temas de la DB.
    return $this->db_tema->obtener_todos();
  }

  // Función para eliminar un tema en función de su ID.
  public function eliminarTema($id_tema)
  {
    // Ejecutamos la operación en la base de datos.
    return $this->db_tema->eliminarTema($id_tema);
  }

  // Función para crear un tema
  public function crearTema($tema_nuevo)
  {
    // Validación

    // Si es válido, insertamos en la DB.
    return $this->db_tema->insertarTema($tema_nuevo);
  }
}
