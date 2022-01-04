<?php
// Incluimos la conexión con la base de datos.
include_once(dirname(dirname(dirname(__FILE__))) . "/src/grupo/db_grupo.php");

// Incluimos el modelo del grupo
include_once(dirname(dirname(dirname(__FILE__))) . "/src/grupo/grupo.php");

class ServicioGrupo
{
  // Variable para almacenar la conexión con la DB.
  private $db_grupo;

  // Constructor de la clase.
  public function __construct()
  {
    // Instancia de clase para SQL de Grupo.
    $this->db_grupo = new DBGrupo();
  }

  // Función para obtener un grupo a partir del ID.
  public function obtenerGrupoPorID($id_grupo)
  {
    // Obtenemos el grupo (o nulo).
    $grupo = $this->db_grupo->obtenerGrupoPorID($id_grupo);

    // Regresamos el resultado.
    return $grupo;
  }

  // Función para actualizar un grupo.
  public function actualizarGrupo($grupo)
  {
    // Validamos que el grupo exista.
    $grupo_encontrado = $this->db_grupo->obtenerGrupoPorID($grupo->id);
    if ($grupo_encontrado == null) {
      // El grupo no existe, regresamos null.
      return null;
    }

    // Actualizamos el grupo en la base de datos.
    $grupo_actualizado = $this->db_grupo->actualizarGrupo($grupo);

    // Regresamos el grupo actualizado.
    return $grupo_actualizado;
  }

  // Función para obtener todos los grupos.
  public function obtenerGrupos()
  {
    // Obtenemos todos los grupos de la DB.
    return $this->db_grupo->obtener_todos();
  }

  // Función para eliminar un grupo en función de su ID.
  public function eliminarGrupo($id_grupo)
  {
    // Ejecutamos la operación en la base de datos.
    return $this->db_grupo->eliminarGrupo($id_grupo);
  }

  // Función para crear un grupo
  public function crearGrupo($grupo_nuevo)
  {
    // Validación

    // Si es válido, insertamos en la DB.
    return $this->db_grupo->insertarGrupo($grupo_nuevo);
  }
}
