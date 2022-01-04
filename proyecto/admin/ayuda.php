<?php
// Importamos el archivo de configuración.
require_once(dirname(dirname(__FILE__)) . '/src/config.php');

// Definimos el título de la página.
define('TITULO_PAGINA', 'Admin - Ayuda');

// Encabezado de la página.
require_once(dirname(dirname(__FILE__)) . '/src/componentes_ui/encabezado.php');
?>

<link rel="stylesheet" href="/assets/css/ayuda.css">
<div id="ayuda">
  <h1>Ayuda</h1>
  <p>
    Como administrador, aquí puedes llevar a cabo operaciones de gestión y seguimiento
    a profesores y alumnos, así como a los Grupos, Bloques, Temas, Subtemas y Materiales.
  </p>
  <hr>
  <p>
    Ante cualquier situación, no olvides que eres <i>el administrador</i> y hay que comportarse
    a la altura de la investidura.
  </p>
</div>


<?php require_once(dirname(dirname(__FILE__)) . '/src/componentes_ui/pie_de_pagina.php'); ?>