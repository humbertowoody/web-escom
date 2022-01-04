<?php
// Importamos el archivo de configuración general.
require_once(dirname(dirname(__FILE__)) . '/src/config.php');

// Importamos el servicio de subtemas.
require_once(dirname(dirname(__FILE__)) . '/src/subtema/servicio_subtema.php');

// Instanciamos el servicio de subtemas.
$servicio = new ServicioSubTema();

// Importamos el servicio de temas.
require_once(dirname(dirname(__FILE__)) . '/src/tema/servicio_tema.php');

// Instanciamos el servicio de temas.
$servicio_tema = new ServicioTema();

// Obtenemos todos los temas.
$temas = $servicio_tema->obtenerTemas();

// Definimos el título de la página.
define('TITULO_PAGINA', 'Admin - SubTemas');

// Encabezado de la página.
require_once(dirname(dirname(__FILE__)) . '/src/componentes_ui/encabezado.php');

// Bandera para modo de formulario.
$editar_subtema = isset($_GET['id']);

// Creamos objeto.
$subtema = new SubTema();

// Si la bandera de edición está activa, cargamos datos.
if ($editar_subtema) {
  $subtema = $servicio->obtenerSubTemaPorID($_GET["id"]);
}

?>

<link rel="stylesheet" href="/assets/css/formulario-subtema.css">
<div id="formulario-subtema">
  <h1><?php if ($editar_subtema) {
        echo "Editar SubTema";
      } else {
        echo "Agregar SubTema";
      } ?></h1>
  <p>Para volver, <a href="/admin/subtemas.php">haz click aquí.</a></p>
  <form action="/acciones/admin/<?php if ($editar_subtema) {
                                  echo "editar-subtema.php?id=" . $_GET['id'];
                                } else {
                                  echo "crear-subtema.php";
                                } ?>" method="post">
    <p>
      Nombre: <input class="campo" type="text" name="nombre" id="nombre" value="<?php if ($editar_subtema) {
                                                                                  echo $subtema->nombre;
                                                                                } ?>">
    </p>
    <p>
      Descripción: <input class="campo" type="text" name="descripcion" id="descripcion" value="<?php if ($editar_subtema) {
                                                                                                  echo $subtema->descripcion;
                                                                                                } ?>">
    </p>
    <p>
      Tema: <select name="id_tema" id="id_tema">
        <option value="" disabled>Selecciona un tema...</option>
        <?php
        foreach ($temas as $tema) {
        ?>
          <option value="<?php echo $tema->id; ?>" <?php if ($editar_subtema && $subtema->id_tema == $tema->id) {
                                                      echo "selected";
                                                    } ?>><?php echo $tema->nombre . "(" . $tema->id . ")"; ?></option>
        <?php
        }
        ?>
      </select>
    </p>
    <hr>
    <input type="submit" value="<?php if ($editar_subtema) {
                                  echo "Editar";
                                } else {
                                  echo "Agregar";
                                } ?> SubTema">
  </form>
</div>


<?php require_once(dirname(dirname(__FILE__)) . '/src/componentes_ui/pie_de_pagina.php'); ?>