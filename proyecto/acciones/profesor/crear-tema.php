<?php

// Importamos el servicio de Temas.
require_once(dirname(dirname(dirname(__FILE__))) . "/src/tema/servicio_tema.php");

// Creamos el tema.
$tema = new Tema();

// Extraemos parámetros y generamos objeto.
$tema->nombre = $_POST["nombre"];
$tema->descripcion = $_POST["descripcion"];
$tema->id_bloque = $_POST["id_bloque"];

// Instanciamos el servicio del tema.
$servicio = new ServicioTema();

// Realizamos la actualización.
$servicio->crearTema($tema);

// Redirigimos a Perfil.
header('Location: /profesor/temas.php', true, 302);
die();
