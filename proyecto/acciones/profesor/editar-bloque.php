<?php

// Importamos el servicio de Bloques.
require_once(dirname(dirname(dirname(__FILE__))) . "/src/bloque/servicio_bloque.php");

// Creamos el bloque.
$bloque = new Bloque();

// Extraemos parámetros y generamos objeto.
$bloque->id = $_GET['id'];
$bloque->nombre = $_POST["nombre"];
$bloque->descripcion = $_POST["descripcion"];
$bloque->id_grupo = $_POST["id_grupo"];

// Instanciamos el servicio del bloque.
$servicio = new ServicioBloque();

// Realizamos la actualización.
$servicio->actualizarBloque($bloque);

// Redirigimos a Perfil.
header('Location: /profesor/bloques.php', true, 302);
die();
