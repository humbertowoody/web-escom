<?php

// Importamos el servicio de Dudas.
require_once(dirname(dirname(dirname(__FILE__))) . "/src/duda/servicio_duda.php");

// Instanciamos el servicio de la duda.
$servicio = new ServicioDuda();

// Obtenemos el objeto previo.
$duda = $servicio->obtenerDudaPorID($_GET['id']);

// Marcamos como resuelta.
$duda->resuelta = true;

// Realizamos la actualización.
$servicio->actualizarDuda($duda);

// Redirigimos a Perfil.
header('Location: /profesor/dudas.php', true, 302);
die();
