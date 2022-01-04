<?php
// Importamos el archivo de configuración.
require_once(dirname(__FILE__) . '/src/config.php');

// Definimos el título de la página.
define('TITULO_PAGINA', 'Ayuda');

// Encabezado de la página.
require_once(dirname(__FILE__) . '/src/componentes_ui/encabezado.php');
?>

<link rel="stylesheet" href="/assets/css/ayuda.css">
<div id="ayuda">
  <h1>Ayuda</h1>
  <p>
    Esta aplicación ayudará a profesores para subir sus materiales y poder insertar
    sus actividades para que el, la o los alumnos puedan realizar por medio de formularios
    o juegos de dichas actividades.
  </p>
  <hr>
  <p>
    Si olvidaste tu usuario y/o contraseña puedes visitar la sección de <a href="/contacto.php">Contacto</a>
    para que un administrador te pueda ayudar a seguir el proceso.
  </p>
</div>


<?php require_once(dirname(__FILE__) . '/src/componentes_ui/pie_de_pagina.php'); ?>