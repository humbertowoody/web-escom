<?php
// Importamos el archivo de configuración.
require_once(dirname(__FILE__) . '/src/config.php');

// Definimos el título de la página.
define('TITULO_PAGINA', 'Preguntas Frecuentes');

// Encabezado de la página.
require_once(dirname(__FILE__) . '/src/componentes_ui/encabezado.php');
?>

<link rel="stylesheet" href="/assets/css/faq.css">
<div id="faq">
  <h1>Preguntas Frecuentes</h1>
  <p>
    A continuación presentamos una lista de preguntas frecuentes. Si requieres soporte
    técnico, visita la sección de <a href="/contacto.php">Contacto</a> o <a href="/ayuda.php">Ayuda</a>
    para poderte brindar mejor atención.
  </p>
  <hr>
  <h3>¿Olvidaste tu usuario o contraseña?</h3>
  <p>
    Si olvidaste tu usuario o contraseña puedes visitar la sección de <a href="/contacto.php">Contacto</a>
    solicitando un restablecimiento y un administrador de la plataforma se pondrá en contacto contigo para
    llevar a cabo el procedimiento correspondiente.
  </p>
  <h3>Quiero registrarme en la plataforma ¿cómo lo hago?</h3>
  <p>
    Los administradores de la plataforma son los únicos con la capacidad de crear nuevos usuarios, si requieres
    acceso, visita la sección de <a href="/contacto.php">Contacto</a> para solicitar tu registro y un
    administrador de la plataforma se pondrá en contacto contigo para llevar a cabo el proceso de registro.
  </p>
</div>


<?php require_once(dirname(__FILE__) . '/src/componentes_ui/pie_de_pagina.php'); ?>