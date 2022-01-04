<?php
// Importamos el archivo de configuración general.
require_once(dirname(dirname(__FILE__)) . '/src/config.php');

// Importamos el servicio de temas.
require_once(dirname(dirname(__FILE__)) . '/src/tema/servicio_tema.php');

// Instanciamos el servicio de temas.
$servicio = new ServicioTema();

// Importamos el servicio de bloques.
require_once(dirname(dirname(__FILE__)) . '/src/bloque/servicio_bloque.php');

// Instanciamos el servicio de bloques.
$servicio_bloque = new ServicioBloque();

// Obtenemos todos los bloques.
$bloques = $servicio_bloque->obtenerBloques();

// Definimos el título de la página.
define('TITULO_PAGINA', 'Admin - Temas');

// Encabezado de la página.
require_once(dirname(dirname(__FILE__)) . '/src/componentes_ui/encabezado.php');

// Bandera para modo de formulario.
$editar_tema = isset($_GET['id']);

// Creamos objeto.
$tema = new Tema();

// Si la bandera de edición está activa, cargamos datos.
if ($editar_tema) {
  $tema = $servicio->obtenerTemaPorID($_GET["id"]);
}

?>

<link rel="stylesheet" href="/assets/css/formulario-tema.css">
<div id="formulario-tema">
  <h1><?php if ($editar_tema) {
        echo "Editar Tema";
      } else {
        echo "Agregar Tema";
      } ?></h1>
  <p>Para volver, <a href="/admin/temas.php">haz click aquí.</a></p>
  <form action="/acciones/admin/<?php if ($editar_tema) {
                                  echo "editar-tema.php?id=" . $_GET['id'];
                                } else {
                                  echo "crear-tema.php";
                                } ?>" method="post">
    <p>
      Nombre: <input class="campo" type="text" name="nombre" id="nombre" value="<?php if ($editar_tema) {
                                                                                  echo $tema->nombre;
                                                                                } ?>">
    </p>
    <p>
      Descripción: <input class="campo" type="text" name="descripcion" id="descripcion" value="<?php if ($editar_tema) {
                                                                                                  echo $tema->descripcion;
                                                                                                } ?>">
    </p>
    <p>
      Bloque: <select name="id_bloque" id="id_bloque">
        <option value="" disabled>Selecciona un bloque...</option>
        <?php
        foreach ($bloques as $bloque) {
        ?>
          <option value="<?php echo $bloque->id; ?>" <?php if ($editar_tema && $tema->id_bloque == $bloque->id) {
                                                        echo "selected";
                                                      } ?>><?php echo $bloque->nombre . "(" . $bloque->id . ")"; ?></option>
        <?php
        }
        ?>
      </select>
    </p>
    <hr>
    <input type="submit" value="<?php if ($editar_tema) {
                                  echo "Editar";
                                } else {
                                  echo "Agregar";
                                } ?> Tema">
  </form>
</div>


<?php require_once(dirname(dirname(__FILE__)) . '/src/componentes_ui/pie_de_pagina.php'); ?>