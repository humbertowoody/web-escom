<?php
// Importamos archivo de configuración.
require_once(dirname(dirname(__FILE__)) . '/src/config.php');

// Importamos archivo de sesión.
require_once(dirname(dirname(__FILE__)) . '/src/sesion.php');

// Importamos el servicio de usuario.
require_once(dirname(dirname(__FILE__)) . '/src/usuario/servicio_usuario.php');

// Instanciamos el servicio de usuario.
$servicio_usuario = new ServicioUsuario();

// Obtenemos el usuario correspondiente.
$usuario = $servicio_usuario->obtenerUsuarioPorID($sesion_id_usuario);

// Definimos el título de la página.
define('TITULO_PAGINA', 'Alumno - Dudas');

// Encabezado de la página.
require_once(dirname(dirname(__FILE__)) . '/src/componentes_ui/encabezado.php');

// Cargamos el servicio de dudas.
require_once(dirname(dirname(__FILE__)) . '/src/duda/servicio_duda.php');

// Instanciamos el servicio.
$servicio = new ServicioDuda();

// Obtenemos los dudas.
$dudas = $servicio->obtenerDudas();
?>

<link rel="stylesheet" href="/assets/css/dudas.css">
<div id="dudas">
  <h1>Dudas en <?php echo Config::$nombre_proyecto; ?>.</h1>
  <p>
    En esta sección puedes consultar tus dudas y si ya han sido resueltas mediante
    una comunicación por correo electrónico por parte de tu profesor o un administrador..
  </p>
  <div class="tabla-dudas">
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Asunto</th>
          <th>Descripcion</th>
          <th>Resuelta</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($dudas as $duda) {
          if ($duda->correo_electronico == $usuario->correo_principal || $duda->correo_electronico == $usuario->correo_secundario) {
        ?>
            <tr>
              <td><?php echo $duda->id; ?></td>
              <td><?php echo $duda->asunto; ?></td>
              <td><?php echo $duda->descripcion; ?></td>
              <td><?php echo $duda->resuelta ? '✅' : '❌'; ?></td>
            </tr>
        <?php
          }
        }
        ?>
      </tbody>
    </table>
  </div>
</div>



<?php require_once(dirname(dirname(__FILE__)) . '/src/componentes_ui/pie_de_pagina.php'); ?>