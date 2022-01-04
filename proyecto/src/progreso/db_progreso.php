<?php
// Importamos la clase progreso.
include_once(dirname(dirname(dirname(__FILE__))) . "/src/progreso/progreso.php");

// Importamos la conexión con la base de datos.
include_once(dirname(dirname(dirname(__FILE__))) . "/src/db.php");

// Importamos el servicio de usuario para las referencias.
include_once(dirname(dirname(dirname(__FILE__))) . "/src/usuario/servicio_usuario.php");

// Importamos el servicio de material para las referencias.
include_once(dirname(dirname(dirname(__FILE__))) . "/src/material/servicio_material.php");

class DBProgreso
{
  // Variable para la conexión con la DB.
  private $conexion;

  public function __construct()
  {
    $claseConexion = new Conexion();

    $this->conexion = $claseConexion->obtenerConexion();
  }

  // Función para convertir una respuesta de la DB en objeto.
  private function fila_a_modelo($fila_progreso)
  {
    // Creamos el nuevo objeto.
    $progreso = new Progreso();

    // Asignamos los datos.
    $progreso->id_usuario = $fila_progreso["id_usuario"];
    $progreso->id_material = $fila_progreso["id_material"];
    $progreso->fecha = $fila_progreso["fecha"];

    // Instanciamos el servicio de usuario para la referencia.
    $servicio_usuario = new ServicioUsuario();

    // Instanciamos el servicio de material para la referencia.
    $servicio_material = new ServicioMaterial();

    // Asignamos el usuario.
    $progreso->usuario = $servicio_usuario->obtenerUsuarioPorID($progreso->id_usuario);

    // Asignamos el material.
    $progreso->material = $servicio_material->obtenerMaterialPorID($progreso->id_material);


    // Regresamos el objeto.
    return $progreso;
  }

  public function obtener_todos()
  {
    // Creamos la consulta.
    $consulta = "SELECT * FROM progresos";

    // Ejecutamos la consulta.
    $resultado = $this->conexion->query($consulta);

    // Creamos un array de objetos.
    $progresos = array();

    // Recorremos los resultados.
    while ($fila = $resultado->fetch_assoc()) {
      // Agregamos el objeto a la lista.
      $progresos[] = $this->fila_a_modelo($fila);
    }

    // Regresamos la lista.
    return $progresos;
  }

  // Función para obtener un progreso en función de su ID.
  public function obtenerProgresoPorID($id_progreso)
  {
    // Creamos la consulta.
    $consulta = "SELECT * FROM progresos WHERE id = " . $id_progreso . ";";

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

  // Función para actualizar un progreso en la base de datos.
  public function actualizarProgreso($nuevoProgreso)
  {
    // Creamos la consulta.
    $consulta = "UPDATE progresos SET resuelta=\"" . $nuevoProgreso->resuelta . "\" WHERE id=" . $nuevoProgreso->id . ";";

    // Ejecutamos la consulta.
    $resultado = $this->conexion->query($consulta);

    // Validamos la operación.
    if ($resultado == true) {
      // Regres
      return $this->obtenerProgresoPorID($nuevoProgreso->id);
    } else {
      return null;
    }
  }


  // Función para insertar un progreso en la base de datos.
  public function insertarProgreso($nuevoProgreso)
  {
    // Creamos la consulta.
    $consulta = "INSERT INTO progresos (nombre,correo_electronico,asunto,descripcion) VALUES (\"" . $nuevoProgreso->nombre . "\",\"" . $nuevoProgreso->correo_electronico . "\",\"" . $nuevoProgreso->asunto . "\",\"" . $nuevoProgreso->descripcion . "\");";

    // Ejecutamos la consulta.
    $resultado = $this->conexion->query($consulta);

    // Regresamos el resultado (boolean).
    return $resultado;
  }
}
