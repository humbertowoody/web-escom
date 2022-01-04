<?php
// Importamos el archivo de configuración general.
require_once(dirname(dirname(__FILE__)) . '/src/config.php');

// Importamos el servicio de materiales.
require_once(dirname(dirname(__FILE__)) . '/src/material/servicio_material.php');

// Instanciamos el servicio de materiales.
$servicio = new ServicioMaterial();

// Importamos el servicio de subtemas.
require_once(dirname(dirname(__FILE__)) . '/src/subtema/servicio_subtema.php');

// Instanciamos el servicio de subtemas.
$servicio_subtema = new ServicioSubTema();

// Obtenemos todos los subtemas.
$subtemas = $servicio_subtema->obtenerSubTemas();

// Definimos el título de la página.
define('TITULO_PAGINA', 'Profesor - Materiales');

// Encabezado de la página.
require_once(dirname(dirname(__FILE__)) . '/src/componentes_ui/encabezado.php');

// Bandera para modo de formulario.
$editar_material = isset($_GET['id']);

// Creamos objeto.
$material = new Material();

// Si la bandera de edición está activa, cargamos datos.
if ($editar_material) {
  $material = $servicio->obtenerMaterialPorID($_GET["id"]);
}

?>

<link rel="stylesheet" href="/assets/css/formulario-material.css">
<div id="formulario-material">
  <h1><?php if ($editar_material) {
        echo "Editar Material";
      } else {
        echo "Agregar Material";
      } ?></h1>
  <p>Para volver, <a href="/profesor/materiales.php">haz click aquí.</a></p>
  <form action="/acciones/profesor/<?php if ($editar_material) {
                                      echo "editar-material.php?id=" . $_GET['id'];
                                    } else {
                                      echo "crear-material.php";
                                    } ?>" method="post">
    <p>
      Nombre: <input class="campo" type="text" name="nombre" id="nombre" value="<?php if ($editar_material) {
                                                                                  echo $material->nombre;
                                                                                } ?>">
    </p>
    <p>
      Descripción: <input class="campo" type="text" name="descripcion" id="descripcion" value="<?php if ($editar_material) {
                                                                                                  echo $material->descripcion;
                                                                                                } ?>">
    </p>
    <p>
      URL: <input class="campo" type="url" name="url" id="url" value="<?php if ($editar_material) {
                                                                        echo $material->url;
                                                                      } ?>">
    </p>
    <p>
      Tipo: <select name="tipo" id="tipo">
        <option value="" disabled>Selecciona un tipo de material...</option>
        <option value="<?php echo Config::$material_pdf; ?>" <?php if ($editar_material && $material->tipo == Config::$material_pdf) {
                                                                echo "selected";
                                                              } ?>>Documento PDF</option>
        <option value="<?php echo Config::$material_url; ?>" <?php if ($editar_material && $material->tipo == Config::$material_url) {
                                                                echo "selected";
                                                              } ?>>URL Genérica</option>
        <option value="<?php echo Config::$material_video; ?>" <?php if ($editar_material && $material->tipo == Config::$material_video) {
                                                                  echo "selected";
                                                                } ?>>Video de YouTube</option>
      </select>
    </p>
    <p>
      SubTema: <select name="id_subtema" id="id_subtema">
        <option value="" disabled>Selecciona un subtema...</option>
        <?php
        foreach ($subtemas as $subtema) {
        ?>
          <option value="<?php echo $subtema->id; ?>" <?php if ($editar_material && $material->id_subtema == $subtema->id) {
                                                        echo "selected";
                                                      } ?>><?php echo $subtema->nombre . "(" . $subtema->id . ")"; ?></option>
        <?php
        }
        ?>
      </select>
    </p>
    <hr>
    <input type="submit" value="<?php if ($editar_material) {
                                  echo "Editar";
                                } else {
                                  echo "Agregar";
                                } ?> Material">
  </form>
</div>


<?php require_once(dirname(dirname(__FILE__)) . '/src/componentes_ui/pie_de_pagina.php'); ?>