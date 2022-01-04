<?php
// Importamos archivo de configuración.
require_once(dirname(dirname(__FILE__)) . '/src/config.php');

// Definimos el título de la página.
define('TITULO_PAGINA', 'Admin - Temas');

// Encabezado de la página.
require_once(dirname(dirname(__FILE__)) . '/src/componentes_ui/encabezado.php');

// Cargamos el servicio de temas.
require_once(dirname(dirname(__FILE__)) . '/src/tema/servicio_tema.php');

// Instanciamos el servicio.
$servicio = new ServicioTema();

// Obtenemos los temas.
$temas = $servicio->obtenerTemas();
?>

<link rel="stylesheet" href="/assets/css/temas.css">
<div id="temas">
  <h1>Temas de <?php echo Config::$nombre_proyecto; ?>.</h1>
  <p>
    En esta sección se presenta un CRUD básico de temas en la plataforma.
  </p>
  <div class="tabla-temas">
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Descripción</th>
          <th>Bloque</th>
          <th>Grupo</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($temas as $tema) {
        ?>
          <tr>
            <td><?php echo $tema->id; ?></td>
            <td><?php echo $tema->nombre; ?></td>
            <td><?php echo $tema->descripcion; ?></td>
            <td><?php echo $tema->bloque->nombre; ?></td>
            <td><?php echo $tema->bloque->grupo->nombre; ?></td>
            <td class="acciones">
              <a href="/acciones/admin/eliminar-tema.php?id=<?php echo $tema->id; ?>">❌</a>
              <a href="/admin/formulario-tema.php?id=<?php echo $tema->id; ?>">✏️</a>
            </td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>
  <p>Para agregar un nuevo tema a la plataforma, haz click en el siguiente botón:</p>
  <a class="agregar-tema" href="/admin/formulario-tema.php">➕ Agregar Tema</a>
</div>



<?php require_once(dirname(dirname(__FILE__)) . '/src/componentes_ui/pie_de_pagina.php'); ?>