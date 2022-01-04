<?php
// Importamos archivo de configuración.
require_once(dirname(dirname(__FILE__)) . '/src/config.php');

// Definimos el título de la página.
define('TITULO_PAGINA', 'Admin - Progresos');

// Encabezado de la página.
require_once(dirname(dirname(__FILE__)) . '/src/componentes_ui/encabezado.php');

// Cargamos el servicio de progresos.
require_once(dirname(dirname(__FILE__)) . '/src/progreso/servicio_progreso.php');

// Instanciamos el servicio.
$servicio = new ServicioProgreso();

// Obtenemos los progresos.
$progresos = $servicio->obtenerProgresos();
?>

<link rel="stylesheet" href="/assets/css/progresos.css">
<div id="progresos">
  <h1>Progresos de <?php echo Config::$nombre_proyecto; ?>.</h1>
  <p>
    En esta sección se presenta un CRUD básico de progresos en la plataforma.
  </p>
  <div class="tabla-progresos">
    <table>
      <thead>
        <tr>
          <th>Usuario</th>
          <th>Material</th>
          <th>SubTema</th>
          <th>Tema</th>
          <th>Bloque</th>
          <th>Grupo</th>
          <th>Fecha</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($progresos as $progreso) {
        ?>
          <tr>
            <td><?php echo $progreso->usuario->nombre; ?></td>
            <td><?php echo $progreso->material->nombre; ?></td>
            <td><?php echo $progreso->material->subtema->nombre; ?></td>
            <td><?php echo $progreso->material->subtema->tema->nombre; ?></td>
            <td><?php echo $progreso->material->subtema->tema->bloque->nombre; ?></td>
            <td><?php echo $progreso->material->subtema->tema->bloque->grupo->nombre; ?></td>
            <td><?php echo $progreso->fecha; ?></td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>
</div>



<?php require_once(dirname(dirname(__FILE__)) . '/src/componentes_ui/pie_de_pagina.php'); ?>