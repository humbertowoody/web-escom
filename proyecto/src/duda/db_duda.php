<?php
// Importamos la clase duda.
include_once(dirname(dirname(dirname(__FILE__))) . "/src/duda/duda.php");

// Importamos la conexión con la base de datos.
include_once(dirname(dirname(dirname(__FILE__))) . "/src/db.php");

class DBDuda
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
  private function fila_a_modelo($fila_duda)
  {
    // Creamos el nuevo objeto.
    $duda = new Duda();

    // Asignamos los datos.
    $duda->id = $fila_duda["id"];
    $duda->nombre = $fila_duda["nombre"];
    $duda->correo_electronico = $fila_duda["correo_electronico"];
    $duda->asunto = $fila_duda["asunto"];
    $duda->descripcion = $fila_duda["descripcion"];
    $duda->resuelta = $fila_duda["resuelta"];


    // Regresamos el objeto.
    return $duda;
  }

  public function obtener_todos()
  {
    // Creamos la consulta.
    $consulta = "SELECT * FROM dudas";

    // Ejecutamos la consulta.
    $resultado = $this->conexion->query($consulta);

    // Creamos un array de objetos.
    $dudas = array();

    // Recorremos los resultados.
    while ($fila = $resultado->fetch_assoc()) {
      // Agregamos el objeto a la lista.
      $dudas[] = $this->fila_a_modelo($fila);
    }

    // Regresamos la lista.
    return $dudas;
  }

  // Función para obtener un duda en función de su ID.
  public function obtenerDudaPorID($id_duda)
  {
    // Creamos la consulta.
    $consulta = "SELECT * FROM dudas WHERE id = " . $id_duda . ";";

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

  // Función para actualizar un duda en la base de datos.
  public function actualizarDuda($nuevoDuda)
  {
    // Creamos la consulta.
    $consulta = "UPDATE dudas SET resuelta=\"" . $nuevoDuda->resuelta . "\" WHERE id=" . $nuevoDuda->id . ";";

    // Ejecutamos la consulta.
    $resultado = $this->conexion->query($consulta);

    // Validamos la operación.
    if ($resultado == true) {
      // Regres
      return $this->obtenerDudaPorID($nuevoDuda->id);
    } else {
      return null;
    }
  }


  // Función para insertar un duda en la base de datos.
  public function insertarDuda($nuevoDuda)
  {
    // Creamos la consulta.
    $consulta = "INSERT INTO dudas (nombre,correo_electronico,asunto,descripcion) VALUES (\"" . $nuevoDuda->nombre . "\",\"" . $nuevoDuda->correo_electronico . "\",\"" . $nuevoDuda->asunto . "\",\"" . $nuevoDuda->descripcion . "\");";

    // Ejecutamos la consulta.
    $resultado = $this->conexion->query($consulta);

    // Regresamos el resultado (boolean).
    return $resultado;
  }
}
