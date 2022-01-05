<?php
// Importamos el archivo de gestión de sesiones.
require_once(dirname(dirname(dirname(__FILE__))) . "/src/sesion.php");

// Importamos el servicio de Usuarios.
require_once(dirname(dirname(dirname(__FILE__))) . "/src/usuario/servicio_usuario.php");

// Instanciamos el servicio del usuario.
$servicio = new ServicioUsuario();

// Creamos el usuario.
$usuario = $servicio->obtenerUsuarioPorID($sesion_id_usuario);

// Extraemos parámetros y generamos objeto.
$usuario->nombre = $_POST["nombre"];
$usuario->ap_pat = $_POST["ap_pat"];
$usuario->ap_mat = $_POST["ap_mat"];
$usuario->correo_principal = $_POST["correo_principal"];
$usuario->correo_secundario = $_POST["correo_secundario"];
$usuario->numero_identificador = $_POST["numero_identificador"];

// Realizamos la actualización.
$servicio->actualizarUsuario($usuario);

// Redirigimos a Perfil.
header('Location: /alumno/perfil.php', true, 302);
die();
