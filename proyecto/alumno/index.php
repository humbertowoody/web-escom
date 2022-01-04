<?php
// Importamos archivo de configuración.
require_once(dirname(dirname(__FILE__)) . '/src/config.php');

// Definimos el título de la página.
define('TITULO_PAGINA', 'Alumno - Inicio');

// Encabezado de la página.
require_once(dirname(dirname(__FILE__)) . '/src/componentes_ui/encabezado.php');
?>

<link rel="stylesheet" href="/assets/css/index.css">
<div id="pagina-principal">
  <h1><?php echo Config::$nombre_proyecto; ?>, una nueva forma de aprender.</h1>
  <p>
    Plataforma de E-Learning integrado para la <b>Escuela Superior de Cómputo</b> del
    <b>Instituto Politécnico Nacional</b>.
  </p>
  <p>
    Vista de Alumno.
  </p>
  <img src="/assets/img/mural.jpeg" alt="Mural de la Escuela Superior de Cómputo">
</div>



<?php require_once(dirname(dirname(__FILE__)) . '/src/componentes_ui/pie_de_pagina.php'); ?>