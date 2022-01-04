<?php
// Importar archivo con configuración.
require_once(dirname(dirname(dirname(__FILE__))) . '/src/config.php');

// Importar archivo de gestión de sesión.
require_once(dirname(dirname(dirname(__FILE__))) . '/src/sesion.php');

?>
<!-- Cargamos los estilos para el título -->
<link rel="stylesheet" href="/assets/css/titulo.css">

<div id="titulo">
  <a href="/">
    <img class="logo-titulo" src="/assets/img/logo-escom.png" alt="<?php echo Config::$nombre_proyecto; ?>" />
  </a>
  <h1 class="nombre-titulo"><?php echo Config::$nombre_proyecto; ?></h1>
  <?php
  if ($sesion_iniciada == true) {
  ?>
    <div class="contenedor-usuario">
      <p class="nombre-usuario"><?php echo $sesion_nombre_usuario; ?></p>
      <p class="rol-usuario"><?php echo $sesion_tipo_usuario; ?></p>
      <a class="cerrar-sesion" href="/acciones/cerrar-sesion.php">Cerrar Sesión</a>
    </div>
  <?php } ?>
</div>