<?php

// Importamos el servicio de SubTemas.
require_once(dirname(dirname(dirname(__FILE__))) . "/src/subtema/servicio_subtema.php");

// Creamos el subtema.
$subtema = new SubTema();

// Extraemos parámetros y generamos objeto.
$subtema->id = $_GET['id'];
$subtema->nombre = $_POST["nombre"];
$subtema->descripcion = $_POST["descripcion"];
$subtema->id_tema = $_POST["id_tema"];

// Instanciamos el servicio del subtema.
$servicio = new ServicioSubTema();

// Realizamos la actualización.
$servicio->actualizarSubTema($subtema);

// Redirigimos a Perfil.
header('Location: /profesor/subtemas.php', true, 302);
die();
