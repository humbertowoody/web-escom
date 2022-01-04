<?php

// Importamos el servicio de Grupos.
require_once(dirname(dirname(dirname(__FILE__))) . "/src/grupo/servicio_grupo.php");

// Creamos el grupo.
$grupo = new Grupo();

// Extraemos parámetros y generamos objeto.
$grupo->nombre = $_POST["nombre"];

// Instanciamos el servicio del grupo.
$servicio = new ServicioGrupo();

// Realizamos la actualización.
$servicio->crearGrupo($grupo);

// Redirigimos a Perfil.
header('Location: /admin/grupos.php', true, 302);
die();
