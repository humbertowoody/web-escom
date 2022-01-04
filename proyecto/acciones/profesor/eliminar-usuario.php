<?php

// Cargamos el servicio de Usuarios.
require_once(dirname(dirname(dirname(__FILE__))) . '/src/usuario/servicio_usuario.php');

// Instanciamos un nuevo servicio de usuario.
$servicio = new ServicioUsuario();

// Obtenemos el parámetro.
$id_a_eliminar = $_GET["id"];

// Validamos que el usuario exista.
$usuario_existente = $servicio->obtenerUsuarioPorID($id_a_eliminar);

// Si el usuario no existe, redirigimos.
if ($usuario_existente != null) {
  // Usamos el servicio para eliminar el usuario.
  $servicio->eliminarUsuario($id_a_eliminar);
}

// En cualquier caso redirigimos al CRUD de usuarios.
header('Location: /profesor/usuarios.php', true, 302);
die();
