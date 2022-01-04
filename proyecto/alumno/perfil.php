<?php
// Importamos archivo de configuración.
require_once(dirname(dirname(__FILE__)) . '/src/config.php');

// Definimos el título de la página.
define('TITULO_PAGINA', 'Alumno - Perfil');

// Encabezado de la página.
require_once(dirname(dirname(__FILE__)) . '/src/componentes_ui/encabezado.php');

// Importamos el control de sesiones.
require_once(dirname(dirname(__FILE__)) . '/src/sesion.php');

// Importamos el servicio de usuarios.
require_once(dirname(dirname(__FILE__)) . '/src/usuario/servicio_usuario.php');

// Obtenemos los datos del usuario actual.
if ($sesion_iniciada == true) {
  // Instanciamos el servicio de usuario.
  $servicio = new ServicioUsuario();

  // Obtenemos el usuario completo.
  $usuario = $servicio->obtenerUsuarioPorID($sesion_id_usuario);
} else {
  // Si la sesión no está iniciada redirigimos a inicio.
  header('Location: /index.php', true, 302);
}
?>

<link rel="stylesheet" href="/assets/css/perfil.css">
<div id="perfil">
  <h1>Actualizar mis datos.</h1>
  <p>En el siguiente formulario puedes realizar una actualización a tu perfil dentro de la plataforma.</p>
  <form action="/acciones/alumno/actualizar-perfil.php" method="post">
    <div class="fila">
      <div class="columna">
        <p>
          Nombre: <input class="campo" type="text" name="nombre" id="nombre" value="<?php echo $usuario->nombre; ?>">
        </p>
        <p>
          Apellido Paterno: <input class="campo" type="text" name="ap_pat" id="ap_pat" value="<?php echo $usuario->ap_pat; ?>">
        </p>
        <p>
          Apellido Materno: <input class="campo" type="text" name="ap_mat" id="ap_mat" value="<?php echo $usuario->ap_mat; ?>">
        </p>
      </div>
      <div class="columna">
        <p>
          Correo Principal: <input class="campo" type="email" name="correo_principal" id="correo_principal" value="<?php echo $usuario->correo_principal; ?>">
        </p>
        <p>
          Correo Secundario: <input class="campo" type="text" name="correo_secundario" id="correo_secundario" value="<?php echo $usuario->correo_secundario; ?>">
        </p>
        <p>
          Numero Identificador: <input class="campo" type="text" name="numero_identificador" id="numero_identificador" value="<?php echo $usuario->numero_identificador; ?>">
        </p>
      </div>
    </div>
    <hr>
    <input type="submit" value="Actualizar Mis Datos">
  </form>
</div>



<?php require_once(dirname(dirname(__FILE__)) . '/src/componentes_ui/pie_de_pagina.php'); ?>