<?php
// Cargamos o inicializamos la sesión.
session_start();

// Obtenemos si la sesión está iniciada.
$sesion_iniciada = isset($_SESSION["sesion_iniciada"]);

// Obtenemos el tipo de usuario (si hay sesión)
$sesion_tipo_usuario = $sesion_iniciada ? $_SESSION["tipo_usuario"] : null;

// Obtenemos el nombre del usuario (si hay sesión)
$sesion_nombre_usuario = $sesion_iniciada ? $_SESSION["nombre_usuario"] : null;

// Obtenemos el ID del usuario.
$sesion_id_usuario = $sesion_iniciada ? $_SESSION["id_usuario"] : null;
