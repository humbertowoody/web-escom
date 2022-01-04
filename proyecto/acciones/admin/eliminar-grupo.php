<?php

// Cargamos el servicio de Grupos.
require_once(dirname(dirname(dirname(__FILE__))) . '/src/grupo/servicio_grupo.php');

// Instanciamos un nuevo servicio de grupo.
$servicio = new ServicioGrupo();

// Obtenemos el parámetro.
$id_a_eliminar = $_GET["id"];

// Validamos que el grupo exista.
$grupo_existente = $servicio->obtenerGrupoPorID($id_a_eliminar);

// Si el grupo no existe, redirigimos.
if ($grupo_existente != null) {
  // Usamos el servicio para eliminar el grupo.
  $servicio->eliminarGrupo($id_a_eliminar);
}

// En cualquier caso redirigimos al CRUD de grupos.
header('Location: /admin/grupos.php', true, 302);
die();
