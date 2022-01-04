<?php

// Importamos el servicio de usuarios.
require_once(dirname(dirname(__FILE__)) . '/src/usuario/servicio_usuario.php');

// Verificamos que sea una llamada POST.
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["usuario"]) && isset($_POST["password"])) {
  // Extraemos los datos del formulario.
  $usuario = $_POST["usuario"];
  $pass = $_POST["password"];

  // Instanciamos el servicio del usuario.
  $servicio_usuario = new ServicioUsuario();

  // Llamamos a la función del servicio que nos permite hacer login.
  $usuario_autenticado = $servicio_usuario->obtenerUsuarioPorCorreoPrincipalYPassword($usuario, $pass);

  // Verificamos el inicio de sesión exitoso.
  if (!is_null($usuario_autenticado)) {
    // Iniciamos la sesión.
    session_start();

    // Ajustamos las variables generales de sesión.
    $_SESSION["sesion_iniciada"] = true;
    $_SESSION["nombre_usuario"] = $usuario_autenticado->nombre;
    $_SESSION["id_usuario"] = $usuario_autenticado->id;

    // Verificamos tipo de usuario.
    if ($usuario_autenticado->tipo_usuario == Config::$rol_admin) {
      // Ajustamos la variable de sesión de tipo de usuario.
      $_SESSION["tipo_usuario"] = Config::$rol_admin;

      // Redirigimos a la página de administrador.
      header('Location: /admin/index.php', true, 302);
    } elseif ($usuario_autenticado->tipo_usuario == Config::$rol_profesor) {
      // Ajustamos la variable de sesión de tipo de usuario.
      $_SESSION["tipo_usuario"] = Config::$rol_profesor;

      // Redirigimos a la sección de profesores.
      header('Location: /profesor/index.php', true, 302);
    } else {
      // Ajustamos la variable de sesión de tipo de usuario.
      $_SESSION["tipo_usuario"] = Config::$rol_alumno;

      // Redirigimos a la sección de alumnos.
      header('Location: /alumno/index.php', true, 302);
    }
  } else {
    // El usuario no fue encontrado, redirigimos a página principal.
    header('Location: /index.php', true, 302);
  }
  // Finalizamos el proceso, por seguridad.
  die();
} else {
  // En cualquier otro caso, redirigimos a la página principal.
  header('Location: /index.php', true, 302);
  die();
}
