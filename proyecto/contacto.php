<?php
// Importamos el archivo de configuración general.
require_once(dirname(__FILE__) . '/src/config.php');

// Definimos el título de la página.
define('TITULO_PAGINA', 'Contacto');

// Encabezado de la página.
require_once(dirname(__FILE__) . '/src/componentes_ui/encabezado.php');
?>

<link rel="stylesheet" href="/assets/css/contacto.css">
<div id="contacto">
  <h1>Contacto</h1>
  <p>
    Si requieres atención técnica por parte de nuestro equipo, llena el formulario a continuación
    y un administrador se pondrá en contacto contigo.
  </p>
  <form action="/acciones/registro_contacto.php" method="post">
    <p>
      Nombre:
      <input type="text" name="nombre" id="nombre">
    </p>
    <p>
      Correo Electrónico:
      <input type="email" name="correo" id="correo">
    </p>
    <p>
      Asunto:
      <input type="text" name="asunto" id="asunto">
    </p>
    <p>
      Descripción:
    </p>
    <textarea name="descripcion" id="descripcion" cols="60" rows="5">Me gustaría saber más acerca de...</textarea>
    <hr>
    <input class="boton-enviar-contacto" type="submit" value="Enviar mensaje de contacto">
  </form>
</div>


<?php require_once(dirname(__FILE__) . '/src/componentes_ui/pie_de_pagina.php'); ?>