<?php
// Importamos el archivo de configuración.
require_once(dirname(dirname(__FILE__)) . '/src/config.php');

// Definimos el título de la página.
define('TITULO_PAGINA', 'Alumno - Ayuda');

// Encabezado de la página.
require_once(dirname(dirname(__FILE__)) . '/src/componentes_ui/encabezado.php');
?>

<link rel="stylesheet" href="/assets/css/ayuda.css">
<div id="ayuda">
  <h1>Ayuda</h1>
  <p>
    Como alumno, si requieres ayuda puedes emplear el formulario de <a href="/alumno/dudas.php">Dudas (Soporte)</a> para
    recibir apoyo por parte de un docente o un administrador de la plataforma.
  </p>
</div>


<?php require_once(dirname(dirname(__FILE__)) . '/src/componentes_ui/pie_de_pagina.php'); ?>