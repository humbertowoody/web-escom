<?php
// Importamos la clase subtema.
include_once(dirname(dirname(dirname(__FILE__))) . "/src/subtema/subtema.php");

// Importamos la conexión con la base de datos.
include_once(dirname(dirname(dirname(__FILE__))) . "/src/db.php");

// Importamos el servicio de Temas (para referencias).
include_once(dirname(dirname(dirname(__FILE__))) . "/src/tema/servicio_tema.php");

class DBSubTema
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
  private function fila_a_modelo($fila_subtema)
  {
    // Creamos el nuevo objeto.
    $subtema = new SubTema();

    // Asignamos los datos.
    $subtema->id = $fila_subtema["id"];
    $subtema->nombre = $fila_subtema["nombre"];
    $subtema->descripcion = $fila_subtema["descripcion"];
    $subtema->id_tema = $fila_subtema["id_tema"];

    // Para obtener el Tema referenciado.
    $servicio_tema = new ServicioTema();

    // Obtener el tema refeerenciado.
    $subtema->tema = $servicio_tema->obtenerTemaPorID($subtema->id_tema);

    // Regresamos el objeto.
    return $subtema;
  }

  // Función para obtener todos los subtemas de la base de datos.
  public function obtener_todos()
  {
    // Creamos la consulta.
    $consulta = "SELECT * FROM subtemas";

    // Ejecutamos la consulta.
    $resultado = $this->conexion->query($consulta);

    // Creamos un array de objetos.
    $subtemas = array();

    // Recorremos los resultados.
    while ($fila = $resultado->fetch_assoc()) {
      // Agregamos el objeto a la lista.
      $subtemas[] = $this->fila_a_modelo($fila);
    }

    // Regresamos la lista.
    return $subtemas;
  }

  // Función para obtener un subtema en función de su ID.
  public function obtenerSubTemaPorID($id_subtema)
  {
    // Creamos la consulta.
    $consulta = "SELECT * FROM subtemas WHERE id = " . $id_subtema . ";";

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

  // Función para actualizar un subtema en la base de datos.
  public function actualizarSubTema($nuevoSubTema)
  {
    // Creamos la consulta.
    $consulta = "UPDATE subtemas SET nombre=\"" . $nuevoSubTema->nombre . "\",descripcion=\"" . $nuevoSubTema->descripcion . "\",id_tema=\"" . $nuevoSubTema->id_tema . "\" WHERE id=" . $nuevoSubTema->id . ";";

    // Ejecutamos la consulta.
    $resultado = $this->conexion->query($consulta);

    // Validamos la operación.
    if ($resultado == true) {
      // Regres
      return $this->obtenerSubTemaPorID($nuevoSubTema->id);
    } else {
      return null;
    }
  }

  // Función para eliminar un subtema en la base de datos.
  public function eliminarSubTema($id_subtema_a_eliminar)
  {
    // Creamos la consulta.
    $consulta = "DELETE FROM subtemas WHERE id=" . $id_subtema_a_eliminar . ";";

    // Ejecutamos la consulta.
    $resultado = $this->conexion->query($consulta);

    // Regresamos el resultado (boolean)
    return $resultado;
  }

  // Función para insertar un subtema en la base de datos.
  public function insertarSubTema($nuevoSubTema)
  {
    // Creamos la consulta.
    $consulta = "INSERT INTO subtemas (nombre,descripcion,id_tema) VALUES (\"" . $nuevoSubTema->nombre . "\",\"" . $nuevoSubTema->descripcion . "\",\"" . $nuevoSubTema->id_tema . "\");";

    // Ejecutamos la consulta.
    $resultado = $this->conexion->query($consulta);

    // Regresamos el resultado (boolean).
    return $resultado;
  }
}
