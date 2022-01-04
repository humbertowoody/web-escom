<?php

// Cargamos el servicio de Materiales.
require_once(dirname(dirname(dirname(__FILE__))) . '/src/material/servicio_material.php');

// Instanciamos un nuevo servicio de material.
$servicio = new ServicioMaterial();

// Obtenemos el parámetro.
$id_a_eliminar = $_GET["id"];

// Validamos que el material exista.
$material_existente = $servicio->obtenerMaterialPorID($id_a_eliminar);

// Si el material no existe, redirigimos.
if ($material_existente != null) {
  // Usamos el servicio para eliminar el material.
  $servicio->eliminarMaterial($id_a_eliminar);
}

// En cualquier caso redirigimos al CRUD de materiales.
header('Location: /admin/materiales.php', true, 302);
die();
