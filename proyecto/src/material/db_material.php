<?php
// Importamos la clase material.
include_once(dirname(dirname(dirname(__FILE__))) . "/src/material/material.php");

// Importamos la conexión con la base de datos.
include_once(dirname(dirname(dirname(__FILE__))) . "/src/db.php");

// Importamos el servicio de SubTemas (para referencias).
include_once(dirname(dirname(dirname(__FILE__))) . "/src/subtema/servicio_subtema.php");

class DBMaterial
{
  // Variable para la conexión con la DB.
  private $conexion;

  public function __construct()
  {
    $claseConexion = new Conexion();

    $this->conexion = $claseConexion->obtenerConexion();
  }

  /**
   * Función para convertir una fila de respuesta de la base de datos en un objeto Usuario.
   */
  private function fila_a_modelo($fila_material)
  {
    // Creamos el nuevo objeto.
    $material = new Material();

    // Asignamos los datos.
    $material->id = $fila_material["id"];
    $material->tipo = $fila_material["tipo"];
    $material->nombre = $fila_material["nombre"];
    $material->descripcion = $fila_material["descripcion"];
    $material->url = $fila_material["url"];
    $material->id_subtema = $fila_material["id_subtema"];

    // Para obtener el SubTema referenciado.
    $servicio_subtema = new ServicioSubTema();

    // Obtener el subtema refeerenciado.
    $material->subtema = $servicio_subtema->obtenerSubTemaPorID($material->id_subtema);

    // Regresamos el objeto.
    return $material;
  }

  // Función para obtener todos los materiales de la base de datos.
  public function obtener_todos()
  {
    // Creamos la consulta.
    $consulta = "SELECT * FROM materiales";

    // Ejecutamos la consulta.
    $resultado = $this->conexion->query($consulta);

    // Creamos un array de objetos.
    $materiales = array();

    // Recorremos los resultados.
    while ($fila = $resultado->fetch_assoc()) {
      // Agregamos el objeto a la lista.
      $materiales[] = $this->fila_a_modelo($fila);
    }

    // Regresamos la lista.
    return $materiales;
  }

  // Función para obtener un material en función de su ID.
  public function obtenerMaterialPorID($id_material)
  {
    // Creamos la consulta.
    $consulta = "SELECT * FROM materiales WHERE id = " . $id_material . ";";

    // Ejecutamos la consulta.
    $resultado = $this->conexion->query($consulta);

    // Verificamos que haya resultados.
    if ($resultado->num_rows <= 0) {
      // Si no hay resultado regresamos null.
      return null;
    }

    // Regresamos el primer resultado.
    return $this->fila_a_modelo($resultado->fetch_assoc());
  }

  // Función para actualizar un material en la base de datos.
  public function actualizarMaterial($nuevoMaterial)
  {
    // Creamos la consulta.
    $consulta = "UPDATE materiales SET nombre=\"" . $nuevoMaterial->nombre . "\",descripcion=\"" . $nuevoMaterial->descripcion . "\",id_subtema=\"" . $nuevoMaterial->id_subtema . "\",tipo=\"" . $nuevoMaterial->tipo . "\",url=\"" . $nuevoMaterial->url . "\" WHERE id=" . $nuevoMaterial->id . ";";

    // Ejecutamos la consulta.
    $resultado = $this->conexion->query($consulta);

    // Validamos la operación.
    if ($resultado == true) {
      // Regres
      return $this->obtenerMaterialPorID($nuevoMaterial->id);
    } else {
      return null;
    }
  }

  // Función para eliminar un material en la base de datos.
  public function eliminarMaterial($id_material_a_eliminar)
  {
    // Creamos la consulta.
    $consulta = "DELETE FROM materiales WHERE id=" . $id_material_a_eliminar . ";";

    // Ejecutamos la consulta.
    $resultado = $this->conexion->query($consulta);

    // Regresamos el resultado (boolean)
    return $resultado;
  }

  // Función para insertar un material en la base de datos.
  public function insertarMaterial($nuevoMaterial)
  {
    // Creamos la consulta.
    $consulta = "INSERT INTO materiales (nombre,descripcion,id_subtema,tipo,url) VALUES (\"" . $nuevoMaterial->nombre . "\",\"" . $nuevoMaterial->descripcion . "\",\"" . $nuevoMaterial->id_subtema . "\",\"" . $nuevoMaterial->tipo . "\",\"" . $nuevoMaterial->url . "\");";

    // Ejecutamos la consulta.
    $resultado = $this->conexion->query($consulta);

    // Regresamos el resultado (boolean).
    return $resultado;
  }
}
