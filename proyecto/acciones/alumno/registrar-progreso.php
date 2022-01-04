<?php
// Importamos la sesión actual.
require_once(dirname(dirname(dirname(__FILE__))) . "/src/sesion.php");

// Importamos el servicio de Progreso.
require_once(dirname(dirname(dirname(__FILE__))) . "/src/progreso/servicio_progreso.php");

// Creamos el progreso.
$progreso = new Progreso();

// Extraemos parámetros y generamos objeto.
$progreso->id_usuario = $sesion_id_usuario;
$progreso->id_material = $_GET["id"];

// Instanciamos el servicio del progreso.
$servicio = new ServicioProgreso();

// Realizamos la actualización.
$servicio->crearProgreso($progreso);

// Redirigimos a Perfil.
header('Location: /alumno/materiales.php', true, 302);
die();
