<?php
// Importamos la clase bloque.
include_once(dirname(dirname(dirname(__FILE__))) . "/src/bloque/bloque.php");

// Importamos la conexión con la base de datos.
include_once(dirname(dirname(dirname(__FILE__))) . "/src/db.php");

// Importamos el servicio de Grupos (para referencias).
include_once(dirname(dirname(dirname(__FILE__))) . "/src/grupo/servicio_grupo.php");

class DBBloque
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
  private function fila_a_modelo($fila_bloque)
  {
    // Creamos el nuevo objeto.
    $bloque = new Bloque();

    // Asignamos los datos.
    $bloque->id = $fila_bloque["id"];
    $bloque->nombre = $fila_bloque["nombre"];
    $bloque->descripcion = $fila_bloque["descripcion"];
    $bloque->id_grupo = $fila_bloque["id_grupo"];

    // Para obtener el Grupo referenciado.
    $servicio_grupo = new ServicioGrupo();

    // Obtener el grupo refeerenciado.
    $bloque->grupo = $servicio_grupo->obtenerGrupoPorID($bloque->id_grupo);

    // Regresamos el objeto.
    return $bloque;
  }

  public function obtener_todos()
  {
    // Creamos la consulta.
    $consulta = "SELECT * FROM bloques";

    // Ejecutamos la consulta.
    $resultado = $this->conexion->query($consulta);

    // Creamos un array de objetos.
    $bloques = array();

    // Recorremos los resultados.
    while ($fila = $resultado->fetch_assoc()) {
      // Agregamos el objeto a la lista.
      $bloques[] = $this->fila_a_modelo($fila);
    }

    // Regresamos la lista.
    return $bloques;
  }

  // Función para obtener un bloque en función de su ID.
  public function obtenerBloquePorID($id_bloque)
  {
    // Creamos la consulta.
    $consulta = "SELECT * FROM bloques WHERE id = " . $id_bloque . ";";

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

  // Función para actualizar un bloque en la base de datos.
  public function actualizarBloque($nuevoBloque)
  {
    // Creamos la consulta.
    $consulta = "UPDATE bloques SET nombre=\"" . $nuevoBloque->nombre . "\" WHERE id=" . $nuevoBloque->id . ";";

    // Ejecutamos la consulta.
    $resultado = $this->conexion->query($consulta);

    // Validamos la operación.
    if ($resultado == true) {
      // Regres
      return $this->obtenerBloquePorID($nuevoBloque->id);
    } else {
      return null;
    }
  }

  // Función para eliminar un bloque en la base de datos.
  public function eliminarBloque($id_bloque_a_eliminar)
  {
    // Creamos la consulta.
    $consulta = "DELETE FROM bloques WHERE id=" . $id_bloque_a_eliminar . ";";

    // Ejecutamos la consulta.
    $resultado = $this->conexion->query($consulta);

    // Regresamos el resultado (boolean)
    return $resultado;
  }

  // Función para insertar un bloque en la base de datos.
  public function insertarBloque($nuevoBloque)
  {
    // Creamos la consulta.
    $consulta = "INSERT INTO bloques (nombre) VALUES (\"" . $nuevoBloque->nombre . "\");";

    // Ejecutamos la consulta.
    $resultado = $this->conexion->query($consulta);

    // Regresamos el resultado (boolean).
    return $resultado;
  }
}
