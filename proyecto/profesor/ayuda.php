<?php
// Importamos el archivo de configuración.
require_once(dirname(dirname(__FILE__)) . '/src/config.php');

// Definimos el título de la página.
define('TITULO_PAGINA', 'Profesor - Ayuda');

// Encabezado de la página.
require_once(dirname(dirname(__FILE__)) . '/src/componentes_ui/encabezado.php');
?>

<link rel="stylesheet" href="/assets/css/ayuda.css">
<div id="ayuda">
  <h1>Ayuda</h1>
  <p>
    Como profesor, aquí podrás llevar a cabo la gestión de alumnos y sus grupos, así como de los bloques,
    temas, subtemas y materiales de la plataforma.
  </p>
</div>


<?php require_once(dirname(dirname(__FILE__)) . '/src/componentes_ui/pie_de_pagina.php'); ?>