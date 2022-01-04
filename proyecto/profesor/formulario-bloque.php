<?php
// Importamos el archivo de configuración general.
require_once(dirname(dirname(__FILE__)) . '/src/config.php');

// Importamos el servicio de bloques.
require_once(dirname(dirname(__FILE__)) . '/src/bloque/servicio_bloque.php');

// Instanciamos el servicio de bloques.
$servicio = new ServicioBloque();

// Importamos el servicio de grupos.
require_once(dirname(dirname(__FILE__)) . '/src/grupo/servicio_grupo.php');

// Instanciamos el servicio de grupos.
$servicio_grupo = new ServicioGrupo();

// Obtenemos todos los grupos.
$grupos = $servicio_grupo->obtenerGrupos();

// Definimos el título de la página.
define('TITULO_PAGINA', 'Profesor - Bloques');

// Encabezado de la página.
require_once(dirname(dirname(__FILE__)) . '/src/componentes_ui/encabezado.php');

// Bandera para modo de formulario.
$editar_bloque = isset($_GET['id']);

// Creamos objeto.
$bloque = new Bloque();

// Si la bandera de edición está activa, cargamos datos.
if ($editar_bloque) {
  $bloque = $servicio->obtenerBloquePorID($_GET["id"]);
}

?>

<link rel="stylesheet" href="/assets/css/formulario-bloque.css">
<div id="formulario-bloque">
  <h1><?php if ($editar_bloque) {
        echo "Editar Bloque";
      } else {
        echo "Agregar Bloque";
      } ?></h1>
  <p>Para volver, <a href="/profesor/bloques.php">haz click aquí.</a></p>
  <form action="/acciones/profesor/<?php if ($editar_bloque) {
                                      echo "editar-bloque.php?id=" . $_GET['id'];
                                    } else {
                                      echo "crear-bloque.php";
                                    } ?>" method="post">
    <p>
      Nombre: <input class="campo" type="text" name="nombre" id="nombre" value="<?php if ($editar_bloque) {
                                                                                  echo $bloque->nombre;
                                                                                } ?>">
    </p>
    <p>
      Descripción: <input class="campo" type="text" name="descripcion" id="descripcion" value="<?php if ($editar_bloque) {
                                                                                                  echo $bloque->descripcion;
                                                                                                } ?>">
    </p>
    <p>
      Grupo: <select name="id_grupo" id="id_grupo">
        <option value="" disabled>Selecciona un grupo...</option>
        <?php
        foreach ($grupos as $grupo) {
        ?>
          <option value="<?php echo $grupo->id; ?>" <?php if ($editar_bloque && $bloque->id_grupo == $grupo->id) {
                                                      echo "selected";
                                                    } ?>><?php echo $grupo->nombre . "(" . $grupo->id . ")"; ?></option>
        <?php
        }
        ?>
      </select>
    </p>
    <hr>
    <input type="submit" value="<?php if ($editar_bloque) {
                                  echo "Editar";
                                } else {
                                  echo "Agregar";
                                } ?> Bloque">
  </form>
</div>


<?php require_once(dirname(dirname(__FILE__)) . '/src/componentes_ui/pie_de_pagina.php'); ?>