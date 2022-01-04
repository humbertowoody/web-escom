<?php

// Importamos el servicio de Usuarios.
require_once(dirname(dirname(dirname(__FILE__))) . "/src/usuario/servicio_usuario.php");

// Creamos el usuario.
$usuario = new Usuario();

// Extraemos parámetros y generamos objeto.
$usuario->nombre = $_POST["nombre"];
$usuario->ap_pat = $_POST["ap_pat"];
$usuario->ap_mat = $_POST["ap_mat"];
$usuario->correo_principal = $_POST["correo_principal"];
$usuario->correo_secundario = $_POST["correo_secundario"];
$usuario->numero_identificador = $_POST["numero_identificador"];
$usuario->tipo_usuario = $_POST["tipo_usuario"];
$usuario->password = $_POST["password"];

// Instanciamos el servicio del usuario.
$servicio = new ServicioUsuario();

// Realizamos la actualización.
$servicio->crearUsuario($usuario);

// Redirigimos a Perfil.
header('Location: /admin/usuarios.php', true, 302);
die();
