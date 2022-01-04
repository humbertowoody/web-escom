<?php
// Importamos archivo de configuración.
require_once(dirname(__FILE__) . '/src/config.php');

// Definimos el título de la página.
define('TITULO_PAGINA', 'Inicio');

// Encabezado de la página.
require_once('src/componentes_ui/encabezado.php');
?>

<link rel="stylesheet" href="assets/css/index.css">
<div id="pagina-principal">
  <h1><?php echo Config::$nombre_proyecto; ?>, una nueva forma de aprender.</h1>
  <p>
    Plataforma de E-Learning integrado para la <b>Escuela Superior de Cómputo</b> del
    <b>Instituto Politécnico Nacional</b>.
  </p>
  <form action="/acciones/iniciar-sesion.php" method="post">
    <h3>¡Identifícate!</h3>
    <p>
      Nombre de usuario:
      <input type="text" name="usuario" id="usuario" required />
    </p>
    <p>
      Contraseña:
      <input type="password" name="password" id="password" required />
    </p>
    <input class="boton-iniciar-sesion" type="submit" value="Iniciar Sesión">
    <hr>
    <a href="/faq.php">¿No cuentas con usuario? El proceso de registro es muy simple, haz click aquí para conocer más.</a>
    <hr>
    <a href="/faq.php">¿Olvidaste tu usuario o contraseña? ¡Aquí te explicamos cómo recuperarlos!</a>
  </form>
  <img src="/assets/img/mural.jpeg" alt="Mural de la Escuela Superior de Cómputo">
</div>



<?php require_once(dirname(__FILE__) . '/src/componentes_ui/pie_de_pagina.php'); ?>