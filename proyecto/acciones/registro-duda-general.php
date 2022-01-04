<?php

// Importamos el servicio de Dudas.
require_once(dirname(dirname(__FILE__)) . "/src/duda/servicio_duda.php");

// Creamos la Duda.
$duda = new Duda();

// Extraemos parámetros y generamos objeto.
$duda->nombre = $_POST["nombre"];
$duda->correo_electronico = $_POST["correo_electronico"];
$duda->asunto = $_POST["asunto"];
$duda->descripcion = $_POST["descripcion"];

// Instanciamos el servicio de la duda.
$servicio = new ServicioDuda();

// Realizamos la actualización.
$servicio->crearDuda($duda);

// Redirigimos a Perfil.
header('Location: /index.php', true, 302);
die();
