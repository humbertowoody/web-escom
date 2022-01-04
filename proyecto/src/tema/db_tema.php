<?php
// Importamos la clase tema.
include_once(dirname(dirname(dirname(__FILE__))) . "/src/tema/tema.php");

// Importamos la conexión con la base de datos.
include_once(dirname(dirname(dirname(__FILE__))) . "/src/db.php");

// Importamos el servicio de Bloques (para referencias).
include_once(dirname(dirname(dirname(__FILE__))) . "/src/bloque/servicio_bloque.php");

class DBTema
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
  private function fila_a_modelo($fila_tema)
  {
    // Creamos el nuevo objeto.
    $tema = new Tema();

    // Asignamos los datos.
    $tema->id = $fila_tema["id"];
    $tema->nombre = $fila_tema["nombre"];
    $tema->descripcion = $fila_tema["descripcion"];
    $tema->id_bloque = $fila_tema["id_bloque"];

    // Para obtener el Bloque referenciado.
    $servicio_bloque = new ServicioBloque();

    // Obtener el bloque refeerenciado.
    $tema->bloque = $servicio_bloque->obtenerBloquePorID($tema->id_bloque);

    // Regresamos el objeto.
    return $tema;
  }

  // Función para obtener todos los temas de la base de datos.
  public function obtener_todos()
  {
    // Creamos la consulta.
    $consulta = "SELECT * FROM temas";

    // Ejecutamos la consulta.
    $resultado = $this->conexion->query($consulta);

    // Creamos un array de objetos.
    $temas = array();

    // Recorremos los resultados.
    while ($fila = $resultado->fetch_assoc()) {
      // Agregamos el objeto a la lista.
      $temas[] = $this->fila_a_modelo($fila);
    }

    // Regresamos la lista.
    return $temas;
  }

  // Función para obtener un tema en función de su ID.
  public function obtenerTemaPorID($id_tema)
  {
    // Creamos la consulta.
    $consulta = "SELECT * FROM temas WHERE id = " . $id_tema . ";";

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

  // Función para actualizar un tema en la base de datos.
  public function actualizarTema($nuevoTema)
  {
    // Creamos la consulta.
    $consulta = "UPDATE temas SET nombre=\"" . $nuevoTema->nombre . "\",descripcion=\"" . $nuevoTema->descripcion . "\",id_bloque=\"" . $nuevoTema->id_bloque . "\" WHERE id=" . $nuevoTema->id . ";";

    // Ejecutamos la consulta.
    $resultado = $this->conexion->query($consulta);

    // Validamos la operación.
    if ($resultado == true) {
      // Regres
      return $this->obtenerTemaPorID($nuevoTema->id);
    } else {
      return null;
    }
  }

  // Función para eliminar un tema en la base de datos.
  public function eliminarTema($id_tema_a_eliminar)
  {
    // Creamos la consulta.
    $consulta = "DELETE FROM temas WHERE id=" . $id_tema_a_eliminar . ";";

    // Ejecutamos la consulta.
    $resultado = $this->conexion->query($consulta);

    // Regresamos el resultado (boolean)
    return $resultado;
  }

  // Función para insertar un tema en la base de datos.
  public function insertarTema($nuevoTema)
  {
    // Creamos la consulta.
    $consulta = "INSERT INTO temas (nombre,descripcion,id_bloque) VALUES (\"" . $nuevoTema->nombre . "\",\"" . $nuevoTema->descripcion . "\",\"" . $nuevoTema->id_bloque . "\");";

    // Ejecutamos la consulta.
    $resultado = $this->conexion->query($consulta);

    // Regresamos el resultado (boolean).
    return $resultado;
  }
}
