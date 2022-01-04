<?php

// Cargamos el servicio de Temas.
require_once(dirname(dirname(dirname(__FILE__))) . '/src/tema/servicio_tema.php');

// Instanciamos un nuevo servicio de tema.
$servicio = new ServicioTema();

// Obtenemos el parámetro.
$id_a_eliminar = $_GET["id"];

// Validamos que el tema exista.
$tema_existente = $servicio->obtenerTemaPorID($id_a_eliminar);

// Si el tema no existe, redirigimos.
if ($tema_existente != null) {
  // Usamos el servicio para eliminar el tema.
  $servicio->eliminarTema($id_a_eliminar);
}

// En cualquier caso redirigimos al CRUD de temas.
header('Location: /profesor/temas.php', true, 302);
die();
