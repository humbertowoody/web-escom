<?php
// Importamos el archivo de configuración general.
require_once(dirname(dirname(__FILE__)) . '/src/config.php');

// Importamos el servicio de grupos.
require_once(dirname(dirname(__FILE__)) . '/src/grupo/servicio_grupo.php');

// Instanciamos el servicio de grupos.
$servicio = new ServicioGrupo();

// Definimos el título de la página.
define('TITULO_PAGINA', 'Admin - Grupos');

// Encabezado de la página.
require_once(dirname(dirname(__FILE__)) . '/src/componentes_ui/encabezado.php');

// Bandera para modo de formulario.
$editar_grupo = isset($_GET['id']);

// Creamos objeto.
$grupo = new Grupo();

// Si la bandera de edición está activa, cargamos datos.
if ($editar_grupo) {
  $grupo = $servicio->obtenerGrupoPorID($_GET["id"]);
}

?>

<link rel="stylesheet" href="/assets/css/formulario-grupo.css">
<div id="formulario-grupo">
  <h1><?php if ($editar_grupo) {
        echo "Editar Grupo";
      } else {
        echo "Agregar Grupo";
      } ?></h1>
  <p>Para volver, <a href="/admin/grupos.php">haz click aquí.</a></p>
  <form action="/acciones/admin/<?php if ($editar_grupo) {
                                  echo "editar-grupo.php?id=" . $_GET['id'];
                                } else {
                                  echo "crear-grupo.php";
                                } ?>" method="post">
    <p>
      Nombre: <input class="campo" type="text" name="nombre" id="nombre" value="<?php if ($editar_grupo) {
                                                                                  echo $grupo->nombre;
                                                                                } ?>">
    </p>
    <hr>
    <input type="submit" value="<?php if ($editar_grupo) {
                                  echo "Editar";
                                } else {
                                  echo "Agregar";
                                } ?> Grupo">
  </form>
</div>


<?php require_once(dirname(dirname(__FILE__)) . '/src/componentes_ui/pie_de_pagina.php'); ?>