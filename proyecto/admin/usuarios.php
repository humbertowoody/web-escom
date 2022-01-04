<?php
// Importamos archivo de configuración.
require_once(dirname(dirname(__FILE__)) . '/src/config.php');

// Definimos el título de la página.
define('TITULO_PAGINA', 'Admin - Usuarios');

// Encabezado de la página.
require_once(dirname(dirname(__FILE__)) . '/src/componentes_ui/encabezado.php');

// Cargamos el servicio de usuarios.
require_once(dirname(dirname(__FILE__)) . '/src/usuario/servicio_usuario.php');

// Instanciamos el servicio.
$servicio = new ServicioUsuario();

// Obtenemos los usuarios.
$usuarios = $servicio->obtenerUsuarios();
?>

<link rel="stylesheet" href="/assets/css/usuarios.css">
<div id="usuarios">
  <h1>Usuarios de <?php echo Config::$nombre_proyecto; ?>.</h1>
  <p>
    En esta sección se presenta un CRUD básico de usuarios en la plataforma.
  </p>
  <div class="tabla-usuarios">
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Apellido P.</th>
          <th>Apellido M.</th>
          <th>Tipo Usuario</th>
          <th>Email</th>
          <th>Email Secundario</th>
          <th>Número de Control</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($usuarios as $usuario) {
        ?>
          <tr>
            <td><?php echo $usuario->id; ?></td>
            <td><?php echo $usuario->nombre; ?></td>
            <td><?php echo $usuario->ap_pat; ?></td>
            <td><?php echo $usuario->ap_mat; ?></td>
            <td><?php echo $usuario->tipo_usuario; ?></td>
            <td><?php echo $usuario->correo_principal; ?></td>
            <td><?php echo $usuario->correo_secundario; ?></td>
            <td><?php echo $usuario->numero_identificador; ?></td>
            <td class="acciones">
              <a href="/acciones/admin/eliminar-usuario.php?id=<?php echo $usuario->id; ?>">❌</a>
              <a href="/admin/formulario-usuario.php?id=<?php echo $usuario->id; ?>">✏️</a>
            </td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>
  <p>Para agregar un nuevo usuario a la plataforma, haz click en el siguiente botón:</p>
  <a class="agregar-usuario" href="/admin/formulario-usuario.php">➕ Agregar Usuario</a>
</div>



<?php require_once(dirname(dirname(__FILE__)) . '/src/componentes_ui/pie_de_pagina.php'); ?>