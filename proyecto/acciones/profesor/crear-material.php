<?php

// Importamos el servicio de Materiales.
require_once(dirname(dirname(dirname(__FILE__))) . "/src/material/servicio_material.php");

// Creamos el material.
$material = new Material();

// Extraemos parámetros y generamos objeto.
$material->tipo = $_POST['tipo'];
$material->nombre = $_POST["nombre"];
$material->descripcion = $_POST["descripcion"];
$material->url = $_POST['url'];
$material->id_subtema = $_POST["id_subtema"];

// Instanciamos el servicio del material.
$servicio = new ServicioMaterial();

// Realizamos la actualización.
$servicio->crearMaterial($material);

// Redirigimos a Perfil.
header('Location: /profesor/materiales.php', true, 302);
die();
