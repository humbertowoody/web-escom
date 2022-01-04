<?php
// Incluimos la conexión con la base de datos.
include_once(dirname(dirname(dirname(__FILE__))) . "/src/usuario/db_usuario.php");

// Incluimos el modelo del usuario
include_once(dirname(dirname(dirname(__FILE__))) . "/src/usuario/usuario.php");

class ServicioUsuario
{
  // Variable para almacenar la conexión con la DB.
  private $db_usuario;

  // Constructor de la clase.
  public function __construct()
  {
    // Instancia de clase para SQL de Usuario.
    $this->db_usuario = new DBUsuario();
  }

  // Función para obtener un usuario a partir del ID.
  public function obtenerUsuarioPorID($id_usuario)
  {
    // Obtenemos el usuario (o nulo).
    $usuario = $this->db_usuario->obtenerUsuarioPorID($id_usuario);

    // Regresamos el resultado.
    return $usuario;
  }

  // Función para obtener un usuario a partir de su correo y contraseña.
  public function obtenerUsuarioPorCorreoPrincipalYPassword($correo_principal, $pass)
  {
    // Obtenemos el usuario (o nulo)
    $usuario = $this->db_usuario->obtenerUsuarioPorCorreoPrincipalYPassword($correo_principal, $pass);

    // Regresamos el valor.
    return $usuario;
  }

  // Función para actualizar un usuario.
  public function actualizarUsuario($usuario)
  {
    // Validamos que el usuario exista.
    $usuario_encontrado = $this->db_usuario->obtenerUsuarioPorID($usuario->id);
    if ($usuario_encontrado == null) {
      // El usuario no existe, regresamos null.
      return null;
    }

    // Actualizamos el usuario en la base de datos.
    $usuario_actualizado = $this->db_usuario->actualizarUsuario($usuario);

    // Regresamos el usuario actualizado.
    return $usuario_actualizado;
  }

  // Función para obtener todos los usuarios.
  public function obtenerUsuarios()
  {
    // Obtenemos todos los usuarios de la DB.
    return $this->db_usuario->obtener_todos();
  }

  // Función para eliminar un usuario en función de su ID.
  public function eliminarUsuario($id_usuario)
  {
    // Ejecutamos la operación en la base de datos.
    return $this->db_usuario->eliminarUsuario($id_usuario);
  }

  // Función para crear un Usuario
  public function crearUsuario($usuario_nuevo)
  {
    // Validación

    // Si es válido, insertamos en la DB.
    return $this->db_usuario->insertarUsuario($usuario_nuevo);
  }
}
