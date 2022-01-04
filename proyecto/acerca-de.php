<?php
// Importamos el archivo de configuración general.
require_once(dirname(__FILE__) . '/src/config.php');

// Definimos el título de la página.
define('TITULO_PAGINA', 'Acerca De');

// Encabezado de la página.
require_once(dirname(__FILE__) . '/src/componentes_ui/encabezado.php');
?>

<link rel="stylesheet" href="/assets/css/acerca-de.css">
<div id="acerca-de">
  <h1>¿Qué es <?php echo Config::$nombre_proyecto; ?>?</h1>
  <p>
    Esta es la plataforma de E-Learning para la ESCOM desarrollada por el equipo #4 para
    la materia de <i>Desarrollo Web</i> en la Escuela Superior de Cómputo del Instituto
    Politécnico Nacional.
  </p>
  <p>
    En esta plataforma proponemos un esquema de gestión, seguimiento y desarrollo del
    conocimiento para alumnos, profesores y personal administrativo. Algunas de las
    funcionalidades son:
  <ul>
    <li>Registro de personal docente.</li>
    <li>Registro de personal administrativo.</li>
    <li>Registro de alumnado.</li>
    <li>Gestión de grupos.</li>
    <li>Gestión de bloques.</li>
    <li>Gestión de temas y subtemas.</li>
    <li>Gestión de material de estudio.</li>
    <li>Seguimiento del alumnado.</li>
  </ul>
  </p>
  <p>
    Se acotan los objetivos antes mencionados a los requisitos planteados para el desarrollo
    del proyecto.
  </p>
  <p>
    Este proyecto fue realizado por el <b>Equipo #4</b> conformado por:
  </p>
  <ul>
    <li>Vanessa</li>
    <li>Max</li>
    <li>Carlo</li>
    <li>Diego</li>
    <li>Humberto Alejandro Ortega Alcocer <i>(2016630495)</i> - <a href="mailto:humbertoalejandroortegalcocer@gmail.com">humbertoalejandroortegalcocer@gmail.com</a></li>
  </ul>
</div>


<?php require_once(dirname(__FILE__) . '/src/componentes_ui/pie_de_pagina.php'); ?>