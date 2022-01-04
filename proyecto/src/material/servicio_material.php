<?php
// Incluimos la conexión con la base de datos.
include_once(dirname(dirname(dirname(__FILE__))) . "/src/material/db_material.php");

// Incluimos el modelo del material
include_once(dirname(dirname(dirname(__FILE__))) . "/src/material/material.php");

class ServicioMaterial
{
  // Variable para almacenar la conexión con la DB.
  private $db_material;

  // Constructor de la clase.
  public function __construct()
  {
    // Instancia de clase para SQL de Material.
    $this->db_material = new DBMaterial();
  }

  // Función para obtener un material a partir del ID.
  public function obtenerMaterialPorID($id_material)
  {
    // Obtenemos el material (o nulo).
    $material = $this->db_material->obtenerMaterialPorID($id_material);

    // Regresamos el resultado.
    return $material;
  }

  // Función para actualizar un material.
  public function actualizarMaterial($material)
  {
    // Validamos que el material exista.
    $material_encontrado = $this->db_material->obtenerMaterialPorID($material->id);
    if ($material_encontrado == null) {
      // El material no existe, regresamos null.
      return null;
    }

    // Actualizamos el material en la base de datos.
    $material_actualizado = $this->db_material->actualizarMaterial($material);

    // Regresamos el material actualizado.
    return $material_actualizado;
  }

  // Función para obtener todos los materiales.
  public function obtenerMateriales()
  {
    // Obtenemos todos los materiales de la DB.
    return $this->db_material->obtener_todos();
  }

  // Función para eliminar un material en función de su ID.
  public function eliminarMaterial($id_material)
  {
    // Ejecutamos la operación en la base de datos.
    return $this->db_material->eliminarMaterial($id_material);
  }

  // Función para crear un material
  public function crearMaterial($material_nuevo)
  {
    // Validación

    // Si es válido, insertamos en la DB.
    return $this->db_material->insertarMaterial($material_nuevo);
  }
}
