<?php
// Importar la configuración general de la aplicación.
require_once(dirname(dirname(dirname(__FILE__))) . '/src/config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Proyecto Final - Tecnologías Web 2021, Equipo 4">
  <meta name="author" content="xxxx" />
  <meta name="keywords" content="e-learning,saes,administracion,escom,alumnos" />
  <meta name="copyright" content="© Equipo 4, Tecnologías para la Web, 2021" />
  <title>
    <?php
    if (defined('TITULO_PAGINA')) {
      echo TITULO_PAGINA;
    } else {
      echo ucfirst(basename(__FILE__, '.php'));
    }
    ?> :: <?php echo Config::$nombre_proyecto; ?>
  </title>
  <!-- Importamos el CSS con definiciones de estilo generales para la aplicación -->
  <link rel="stylesheet" href="/assets/css/general.css">
</head>

<body>
  <?php require_once(dirname(dirname(dirname(__FILE__))) . '/src/componentes_ui/titulo.php'); ?>
  <?php require_once(dirname(dirname(dirname(__FILE__))) . '/src/componentes_ui/barra_navegacion.php'); ?>