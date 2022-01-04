<?php
// Importamos archivo de configuración.
require_once(dirname(dirname(__FILE__)) . '/src/config.php');

// Definimos el título de la página.
define('TITULO_PAGINA', 'Admin - SubTemas');

// Encabezado de la página.
require_once(dirname(dirname(__FILE__)) . '/src/componentes_ui/encabezado.php');

// Cargamos el servicio de subtemas.
require_once(dirname(dirname(__FILE__)) . '/src/subtema/servicio_subtema.php');

// Instanciamos el servicio.
$servicio = new ServicioSubTema();

// Obtenemos los subtemas.
$subtemas = $servicio->obtenerSubTemas();
?>

<link rel="stylesheet" href="/assets/css/subtemas.css">
<div id="subtemas">
  <h1>SubTemas de <?php echo Config::$nombre_proyecto; ?>.</h1>
  <p>
    En esta sección se presenta un CRUD básico de subtemas en la plataforma.
  </p>
  <div class="tabla-subtemas">
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Descripción</th>
          <th>Tema</th>
          <th>Bloque</th>
          <th>Grupo</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($subtemas as $subtema) {
        ?>
          <tr>
            <td><?php echo $subtema->id; ?></td>
            <td><?php echo $subtema->nombre; ?></td>
            <td><?php echo $subtema->descripcion; ?></td>
            <td><?php echo $subtema->tema->nombre; ?></td>
            <td><?php echo $subtema->tema->bloque->nombre; ?></td>
            <td><?php echo $subtema->tema->bloque->grupo->nombre; ?></td>
            <td class="acciones">
              <a href="/acciones/admin/eliminar-subtema.php?id=<?php echo $subtema->id; ?>">❌</a>
              <a href="/admin/formulario-subtema.php?id=<?php echo $subtema->id; ?>">✏️</a>
            </td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>
  <p>Para agregar un nuevo subtema a la plataforma, haz click en el siguiente botón:</p>
  <a class="agregar-subtema" href="/admin/formulario-subtema.php">➕ Agregar SubTema</a>
</div>



<?php require_once(dirname(dirname(__FILE__)) . '/src/componentes_ui/pie_de_pagina.php'); ?>