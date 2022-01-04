<?php
// Importar la configuración general de la aplicación.
require_once(dirname(dirname(dirname(__FILE__))) . '/src/config.php');

// Importar el control de sesiones.
require_once(dirname(dirname(dirname(__FILE__))) . '/src/sesion.php');
?>
<link rel="stylesheet" href="/assets/css/footer.css">
<footer>
  <p>Copyright &copy; <?php echo date('Y'); ?></p>
  <p><?php echo Config::$nombre_proyecto; ?></p>
  <p>Todos los derechos reservados</p>
  <?php
  if ($sesion_iniciada == true) {
  ?>
    <p>Usuario: <?php echo $sesion_nombre_usuario . "(" . $sesion_tipo_usuario . ")"; ?></p>
  <?php } else { ?>
    <p>Equipo 4 - Desarrollo de Aplicaciones Web</p>
  <?php } ?>
  <p>
    <?php
    $fecha = date("d/m/Y");
    echo $fecha;
    ?>
  </p>
</footer>

<!-- cerramos contenido -->
</body>

</html>