<?php
// Importamos archivo de configuración.
require_once(dirname(dirname(__FILE__)) . '/src/config.php');

// Definimos el título de la página.
define('TITULO_PAGINA', 'Profesor - Bloques');

// Encabezado de la página.
require_once(dirname(dirname(__FILE__)) . '/src/componentes_ui/encabezado.php');

// Cargamos el servicio de bloques.
require_once(dirname(dirname(__FILE__)) . '/src/bloque/servicio_bloque.php');

// Instanciamos el servicio.
$servicio = new ServicioBloque();

// Obtenemos los bloques.
$bloques = $servicio->obtenerBloques();
?>

<link rel="stylesheet" href="/assets/css/bloques.css">
<div id="bloques">
  <h1>Bloques de <?php echo Config::$nombre_proyecto; ?>.</h1>
  <p>
    En esta sección se presenta un CRUD básico de bloques en la plataforma.
  </p>
  <div class="tabla-bloques">
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Descripción</th>
          <th>Grupo</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($bloques as $bloque) {
        ?>
          <tr>
            <td><?php echo $bloque->id; ?></td>
            <td><?php echo $bloque->nombre; ?></td>
            <td><?php echo $bloque->descripcion; ?></td>
            <td><?php echo $bloque->grupo->nombre; ?></td>
            <td class="acciones">
              <a href="/acciones/profesor/eliminar-bloque.php?id=<?php echo $bloque->id; ?>">❌</a>
              <a href="/profesor/formulario-bloque.php?id=<?php echo $bloque->id; ?>">✏️</a>
            </td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>
  <p>Para agregar un nuevo bloque a la plataforma, haz click en el siguiente botón:</p>
  <a class="agregar-bloque" href="/profesor/formulario-bloque.php">➕ Agregar Bloque</a>
</div>



<?php require_once(dirname(dirname(__FILE__)) . '/src/componentes_ui/pie_de_pagina.php'); ?>