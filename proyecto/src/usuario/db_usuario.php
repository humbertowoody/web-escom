<?php
// Importamos la clase Usuario.
include_once(dirname(dirname(dirname(__FILE__))) . "/src/usuario/usuario.php");

// Importamos la conexión con la base de datos.
include_once(dirname(dirname(dirname(__FILE__))) . "/src/db.php");

class DBUsuario
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
  private function fila_a_modelo($fila_usuario)
  {
    // Creamos el nuevo objeto.
    $usuario = new Usuario();

    // Asignamos los datos.
    $usuario->id = $fila_usuario["id"];
    $usuario->nombre = $fila_usuario["nombre"];
    $usuario->ap_pat = $fila_usuario["ap_pat"];
    $usuario->ap_mat = $fila_usuario["ap_mat"];
    $usuario->tipo_usuario = $fila_usuario["tipo_usuario"];
    $usuario->correo_principal = $fila_usuario["correo_principal"];
    $usuario->correo_secundario = $fila_usuario["correo_secundario"];
    $usuario->numero_identificador = $fila_usuario["numero_identificador"];
    $usuario->password = $fila_usuario["password"];

    // Regresamos el objeto.
    return $usuario;
  }

  public function obtener_todos()
  {
    // Creamos la consulta.
    $consulta = "SELECT * FROM usuarios";

    // Ejecutamos la consulta.
    $resultado = $this->conexion->query($consulta);

    // Creamos un array de objetos.
    $usuarios = array();

    // Recorremos los resultados.
    while ($fila = $resultado->fetch_assoc()) {
      // Agregamos el objeto a la lista.
      $usuarios[] = $this->fila_a_modelo($fila);
    }

    // Regresamos la lista.
    return $usuarios;
  }

  // Función para obtener un usuario de la base de datos en función de su 
  // correo principal y su contraseña.
  public function obtenerUsuarioPorCorreoPrincipalYPassword($correo, $pass)
  {
    // Creamos la consulta.
    $consulta = "SELECT * FROM usuarios WHERE correo_principal = \"" . $correo . "\" AND password = \"" . $pass . "\";";

    // Ejecutamos la consulta.
    $resultado = $this->conexion->query($consulta);

    // Verificamos que haya resultados.
    if ($resultado->num_rows <= 0) {
      // Si no hay resultado, regresamos null.
      return null;
    }

    // Regresamos el primer resultado.
    return $this->fila_a_modelo($resultado->fetch_assoc());
  }

  // Función para obtener un usuario en función de su ID.
  public function obtenerUsuarioPorID($id_usuario)
  {
    // Creamos la consulta.
    $consulta = "SELECT * FROM usuarios WHERE id = " . $id_usuario . ";";

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

  // Función para actualizar un usuario en la base de datos.
  public function actualizarUsuario($nuevoUsuario)
  {
    // Creamos la consulta.
    $consulta = "UPDATE usuarios SET nombre=\"" . $nuevoUsuario->nombre . "\",ap_pat=\"" . $nuevoUsuario->ap_pat . "\",ap_mat=\"" . $nuevoUsuario->ap_mat . "\",correo_principal=\"" . $nuevoUsuario->correo_principal . "\",correo_secundario=\"" . $nuevoUsuario->correo_secundario . "\",tipo_usuario=\"" . $nuevoUsuario->tipo_usuario . "\",numero_identificador=\"" . $nuevoUsuario->numero_identificador . "\" WHERE id=" . $nuevoUsuario->id . ";";

    // Ejecutamos la consulta.
    $resultado = $this->conexion->query($consulta);

    // Validamos la operación.
    if ($resultado == true) {
      // Regres
      return $this->obtenerUsuarioPorID($nuevoUsuario->id);
    } else {
      return null;
    }
  }

  // Función para eliminar un usuario en la base de datos.
  public function eliminarUsuario($id_usuario_a_eliminar)
  {
    // Creamos la consulta.
    $consulta = "DELETE FROM usuarios WHERE id=" . $id_usuario_a_eliminar . ";";

    // Ejecutamos la consulta.
    $resultado = $this->conexion->query($consulta);

    // Regresamos el resultado (boolean)
    return $resultado;
  }
}
