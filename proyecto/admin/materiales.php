<?php
// Importamos archivo de configuración.
require_once(dirname(dirname(__FILE__)) . '/src/config.php');

// Definimos el título de la página.
define('TITULO_PAGINA', 'Admin - Materiales');

// Encabezado de la página.
require_once(dirname(dirname(__FILE__)) . '/src/componentes_ui/encabezado.php');

// Cargamos el servicio de materiales.
require_once(dirname(dirname(__FILE__)) . '/src/material/servicio_material.php');

// Instanciamos el servicio.
$servicio = new ServicioMaterial();

// Obtenemos los materiales.
$materiales = $servicio->obtenerMateriales();
?>

<link rel="stylesheet" href="/assets/css/materiales.css">
<div id="materiales">
  <h1>Materiales de <?php echo Config::$nombre_proyecto; ?>.</h1>
  <p>
    En esta sección se presenta un CRUD básico de materiales en la plataforma.
  </p>
  <div class="tabla-materiales">
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Descripción</th>
          <th>Tipo</th>
          <th>URL</th>
          <th>SubTema</th>
          <th>Tema</th>
          <th>Bloque</th>
          <th>Grupo</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($materiales as $material) {
        ?>
          <tr>
            <td><?php echo $material->id; ?></td>
            <td><?php echo $material->nombre; ?></td>
            <td><?php echo $material->descripcion; ?></td>
            <td><?php echo $material->tipo; ?></td>
            <td><?php echo $material->url; ?></td>
            <td><?php echo $material->subtema->nombre; ?></td>
            <td><?php echo $material->subtema->tema->nombre; ?></td>
            <td><?php echo $material->subtema->tema->bloque->nombre; ?></td>
            <td><?php echo $material->subtema->tema->bloque->grupo->nombre; ?></td>
            <td class="acciones">
              <a href="/acciones/admin/eliminar-material.php?id=<?php echo $material->id; ?>">❌</a>
              <a href="/admin/formulario-material.php?id=<?php echo $material->id; ?>">✏️</a>
            </td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>
  <p>Para agregar un nuevo material a la plataforma, haz click en el siguiente botón:</p>
  <a class="agregar-material" href="/admin/formulario-material.php">➕ Agregar Material</a>
</div>



<?php require_once(dirname(dirname(__FILE__)) . '/src/componentes_ui/pie_de_pagina.php'); ?>