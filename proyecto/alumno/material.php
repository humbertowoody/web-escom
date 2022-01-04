<?php
// Configuración general.
require_once(dirname(dirname(__FILE__)) . '/src/config.php');

// Definimos el título de la página.
define('TITULO_PAGINA', 'Alumno - Material');

// Encabezado de la página.
require_once(dirname(dirname(__FILE__)) . '/src/componentes_ui/encabezado.php');

// Cargamos el servicio de materiales.
require_once(dirname(dirname(__FILE__)) . '/src/material/servicio_material.php');

// Instanciamos el servicio.
$servicio_material = new ServicioMaterial();

// Obtenemos los materials.
$material = $servicio_material->obtenerMaterialPorID($_GET["id"]);
?>

<link rel="stylesheet" href="/assets/css/material.css">
<div id="material">
  <p class="navegacion"><?php echo $material->subtema->tema->bloque->nombre . " > " . $material->subtema->tema->nombre . " > " . $material->subtema->nombre; ?></p>
  <h1><?php echo $material->nombre; ?></h1>
  <p><?php echo $material->descripcion; ?></p>
  <?php
  // Mostramos distintos contenidos en función del material.
  if ($material->tipo == Config::$material_url) {
    // En caso de que sea una URL, mostramos un iframe con la página y un botón para visitar.
  ?>
    <iframe src="<?php echo $material->url; ?>" frameborder="0"></iframe>
  <?php
  } elseif ($material->tipo == Config::$material_video) {
    // En caso de que sea un video, mostramos un iframe con el video.
  ?>
    <iframe width="560" height="315" src="<?php echo $material->url; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
  <?php
  } else {
  ?>
    <iframe src="<?php echo $material->url; ?>" frameborder="0"></iframe>
  <?php
  }
  ?>
  <a class="registrar-progreso" href="/acciones/alumno/registrar-progreso.php?id=<?php echo $material->id; ?>">Marcar como visto</a>
  <a class="regresar" href="/alumno/materiales.php">Volver</a>
  <hr>
  <form action="/acciones/alumno/registrar-duda.php?id=<?php echo $material->id; ?>" method="post">
    <h4>¿Tienes alguna duda?</h4>
    <p>
      Escríbela a continuación y un docente o un administrador se pondrá en contacto contigo vía correo electrónico.
    </p>
    <textarea name="descripcion" id="descripcion" cols="30" rows="10">Mi pregunta es...</textarea>
    <button type="submit">Enviar Duda</button>
  </form>
</div>

<?php require_once(dirname(dirname(__FILE__)) . '/src/componentes_ui/pie_de_pagina.php'); ?>