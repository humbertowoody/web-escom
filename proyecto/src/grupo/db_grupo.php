<?php
// Importamos la clase grupo.
include_once(dirname(dirname(dirname(__FILE__))) . "/src/grupo/grupo.php");

// Importamos la conexión con la base de datos.
include_once(dirname(dirname(dirname(__FILE__))) . "/src/db.php");

class DBGrupo
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
  private function fila_a_modelo($fila_grupo)
  {
    // Creamos el nuevo objeto.
    $grupo = new Grupo();

    // Asignamos los datos.
    $grupo->id = $fila_grupo["id"];
    $grupo->nombre = $fila_grupo["nombre"];

    // Regresamos el objeto.
    return $grupo;
  }

  public function obtener_todos()
  {
    // Creamos la consulta.
    $consulta = "SELECT * FROM grupos";

    // Ejecutamos la consulta.
    $resultado = $this->conexion->query($consulta);

    // Creamos un array de objetos.
    $grupos = array();

    // Recorremos los resultados.
    while ($fila = $resultado->fetch_assoc()) {
      // Agregamos el objeto a la lista.
      $grupos[] = $this->fila_a_modelo($fila);
    }

    // Regresamos la lista.
    return $grupos;
  }

  // Función para obtener un grupo en función de su ID.
  public function obtenerGrupoPorID($id_grupo)
  {
    // Creamos la consulta.
    $consulta = "SELECT * FROM grupos WHERE id = " . $id_grupo . ";";

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

  // Función para actualizar un grupo en la base de datos.
  public function actualizarGrupo($nuevoGrupo)
  {
    // Creamos la consulta.
    $consulta = "UPDATE grupos SET nombre=\"" . $nuevoGrupo->nombre . "\",ap_pat=\"" . $nuevoGrupo->ap_pat . "\",ap_mat=\"" . $nuevoGrupo->ap_mat . "\",correo_principal=\"" . $nuevoGrupo->correo_principal . "\",correo_secundario=\"" . $nuevoGrupo->correo_secundario . "\",tipo_usuario=\"" . $nuevoGrupo->tipo_usuario . "\",numero_identificador=\"" . $nuevoGrupo->numero_identificador . "\" WHERE id=" . $nuevoGrupo->id . ";";

    // Ejecutamos la consulta.
    $resultado = $this->conexion->query($consulta);

    // Validamos la operación.
    if ($resultado == true) {
      // Regres
      return $this->obtenerGrupoPorID($nuevoGrupo->id);
    } else {
      return null;
    }
  }

  // Función para eliminar un grupo en la base de datos.
  public function eliminarGrupo($id_grupo_a_eliminar)
  {
    // Creamos la consulta.
    $consulta = "DELETE FROM grupos WHERE id=" . $id_grupo_a_eliminar . ";";

    // Ejecutamos la consulta.
    $resultado = $this->conexion->query($consulta);

    // Regresamos el resultado (boolean)
    return $resultado;
  }

  // Función para insertar un grupo en la base de datos.
  public function insertarGrupo($nuevoGrupo)
  {
    // Creamos la consulta.
    $consulta = "INSERT INTO grupo (nombre) VALUES (\"" . $nuevoGrupo->nombre . "\");";

    // Ejecutamos la consulta.
    $resultado = $this->conexion->query($consulta);

    // Regresamos el resultado (boolean).
    return $resultado;
  }
}
