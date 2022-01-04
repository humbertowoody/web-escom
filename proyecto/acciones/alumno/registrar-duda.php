<?php
// Importamos la sesión actual.
require_once(dirname(dirname(dirname(__FILE__))) . "/src/sesion.php");

// Importamos el servicio de Material.
require_once(dirname(dirname(dirname(__FILE__))) . "/src/material/servicio_material.php");

// Importamos el servicio de Duda.
require_once(dirname(dirname(dirname(__FILE__))) . "/src/duda/servicio_duda.php");

// Importamos el servicio de Usuario.
require_once(dirname(dirname(dirname(__FILE__))) . "/src/usuario/servicio_usuario.php");

// Instanciamos el servicio de usuarios.
$servicio_usuario = new ServicioUsuario();

// Instanciamos el servicio de dudas.
$servicio_duda = new ServicioDuda();

// Instanciamos el servicio de materiales.
$servicio_material = new ServicioMaterial();

// Obtenemos el usuario loggeado.
$usuario = $servicio_usuario->obtenerUsuarioPorID($sesion_id_usuario);

// Obtenemos el material referenciado.
$material = $servicio_material->obtenerMaterialPorID($_GET["id"]);

// Creamos el duda.
$duda = new Duda();

// Extraemos parámetros y generamos objeto.
$duda->nombre = $usuario->nombre . " " . $usuario->ap_pat . " " . $usuario->ap_mat;
$duda->correo_electronico = $usuario->correo_principal;
$duda->asunto = "Duda con " . $material->nombre . " [" . $material->id . "]";
$duda->descripcion = $_POST["descripcion"];

// Creamos la duda.
$servicio_duda->crearDuda($duda);

// Redirigimos a Dudas.
header('Location: /alumno/dudas.php', true, 302);
die();
