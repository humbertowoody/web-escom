<?php

// Cargamos el servicio de Bloques.
require_once(dirname(dirname(dirname(__FILE__))) . '/src/bloque/servicio_bloque.php');

// Instanciamos un nuevo servicio de bloque.
$servicio = new ServicioBloque();

// Obtenemos el parámetro.
$id_a_eliminar = $_GET["id"];

// Validamos que el bloque exista.
$bloque_existente = $servicio->obtenerBloquePorID($id_a_eliminar);

// Si el bloque no existe, redirigimos.
if ($bloque_existente != null) {
  // Usamos el servicio para eliminar el bloque.
  $servicio->eliminarBloque($id_a_eliminar);
}

// En cualquier caso redirigimos al CRUD de bloques.
header('Location: /profesor/bloques.php', true, 302);
die();
