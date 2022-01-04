<?php

// Importamos el servicio de Materiales.
require_once(dirname(dirname(dirname(__FILE__))) . "/src/material/servicio_material.php");

// Creamos el material.
$material = new Material();

// Extraemos parámetros y generamos objeto.
$material->id = $_GET['id'];
$material->tipo = $_POST['tipo'];
$material->nombre = $_POST["nombre"];
$material->descripcion = $_POST["descripcion"];
$material->url = $_POST['url'];
$material->id_subtema = $_POST["id_subtema"];

// Instanciamos el servicio del material.
$servicio = new ServicioMaterial();

// Realizamos la actualización.
$servicio->actualizarMaterial($material);

// Redirigimos a Perfil.
header('Location: /admin/materiales.php', true, 302);
die();
