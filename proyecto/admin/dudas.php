<?php
// Importamos archivo de configuración.
require_once(dirname(dirname(__FILE__)) . '/src/config.php');

// Definimos el título de la página.
define('TITULO_PAGINA', 'Admin - Dudas');

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
  <h1>Dudas de <?php echo Config::$nombre_proyecto; ?>.</h1>
  <p>
    En esta sección se presenta un CRUD básico de dudas en la plataforma.
  </p>
  <div class="tabla-dudas">
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Correo Electrónico</th>
          <th>Asunto</th>
          <th>Descripcion</th>
          <th>Resuelta</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($dudas as $duda) {
        ?>
          <tr>
            <td><?php echo $duda->id; ?></td>
            <td><?php echo $duda->nombre; ?></td>
            <td><?php echo $duda->correo_electronico; ?></td>
            <td><?php echo $duda->asunto; ?></td>
            <td><?php echo $duda->descripcion; ?></td>
            <td><?php echo $duda->resuelta ? '✅' : '❌'; ?></td>
            <td class="acciones">
              <?php if (!$duda->resuelta) {
              ?>
                <a href="/acciones/admin/resolver-duda.php?id=<?php echo $duda->id; ?>">Marcar como resuelta</a>
                <?php
              } else {
                ?>(Resuelta)<?php
                          }
                            ?>
            </td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>
</div>



<?php require_once(dirname(dirname(__FILE__)) . '/src/componentes_ui/pie_de_pagina.php'); ?>