<?php

// Cargamos el servicio de SubTemas.
require_once(dirname(dirname(dirname(__FILE__))) . '/src/subtema/servicio_subtema.php');

// Instanciamos un nuevo servicio de subtema.
$servicio = new ServicioSubTema();

// Obtenemos el parámetro.
$id_a_eliminar = $_GET["id"];

// Validamos que el subtema exista.
$subtema_existente = $servicio->obtenerSubTemaPorID($id_a_eliminar);

// Si el subtema no existe, redirigimos.
if ($subtema_existente != null) {
  // Usamos el servicio para eliminar el subtema.
  $servicio->eliminarSubTema($id_a_eliminar);
}

// En cualquier caso redirigimos al CRUD de subtemas.
header('Location: /profesor/subtemas.php', true, 302);
die();
