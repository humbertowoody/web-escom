<?php
// Importamos archivo de configuración.
require_once(dirname(dirname(__FILE__)) . '/src/config.php');

// Definimos el título de la página.
define('TITULO_PAGINA', 'Profesor - Grupos');

// Encabezado de la página.
require_once(dirname(dirname(__FILE__)) . '/src/componentes_ui/encabezado.php');

// Cargamos el servicio de grupos.
require_once(dirname(dirname(__FILE__)) . '/src/grupo/servicio_grupo.php');

// Instanciamos el servicio.
$servicio = new ServicioGrupo();

// Obtenemos los grupos.
$grupos = $servicio->obtenerGrupos();
?>

<link rel="stylesheet" href="/assets/css/grupos.css">
<div id="grupos">
  <h1>Grupos de <?php echo Config::$nombre_proyecto; ?>.</h1>
  <p>
    En esta sección se presenta un CRUD básico de grupos en la plataforma.
  </p>
  <div class="tabla-grupos">
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($grupos as $grupo) {
        ?>
          <tr>
            <td><?php echo $grupo->id; ?></td>
            <td><?php echo $grupo->nombre; ?></td>
            <td class="acciones">
              <a href="/acciones/profesor/eliminar-grupo.php?id=<?php echo $grupo->id; ?>">❌</a>
              <a href="/profesor/formulario-grupo.php?id=<?php echo $grupo->id; ?>">✏️</a>
            </td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>
  <p>Para agregar un nuevo grupo a la plataforma, haz click en el siguiente botón:</p>
  <a class="agregar-grupo" href="/profesor/formulario-grupo.php">➕ Agregar Grupo</a>
</div>



<?php require_once(dirname(dirname(__FILE__)) . '/src/componentes_ui/pie_de_pagina.php'); ?>