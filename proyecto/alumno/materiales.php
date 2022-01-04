<?php
// Importamos archivo de configuración.
require_once(dirname(dirname(__FILE__)) . '/src/config.php');

// Importamos archivo de sesión.
require_once(dirname(dirname(__FILE__)) . '/src/sesion.php');

// Definimos el título de la página.
define('TITULO_PAGINA', 'Alumno - Material');

// Encabezado de la página.
require_once(dirname(dirname(__FILE__)) . '/src/componentes_ui/encabezado.php');

// Cargamos el servicio de usuarios.
require_once(dirname(dirname(__FILE__)) . '/src/usuario/servicio_usuario.php');

// Instanciamos el servicio de usuarios.
$servicio_usuario = new ServicioUsuario();

// Obtenemos el usuario actual.
$usuario = $servicio_usuario->obtenerUsuarioPorID($sesion_id_usuario);

// Cargamos el servicio de materiales.
require_once(dirname(dirname(__FILE__)) . '/src/material/servicio_material.php');

// Instanciamos el servicio.
$servicio_material = new ServicioMaterial();

// Obtenemos los materials.
$materiales = $servicio_material->obtenerMaterialesPorGrupo($usuario->id_grupo);
?>

<link rel="stylesheet" href="/assets/css/materiales.css">
<div id="materiales">
  <h1>Materiales de <?php echo Config::$nombre_proyecto; ?>.</h1>
  <p>
    Aquí puedes consultar todos los materiales disponibles para que estudies y aprendas mucho.
  </p>
  <div class="tabla-materiales">
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Grupo</th>
          <th>Bloque</th>
          <th>Tema</th>
          <th>SubTema</th>
          <th>Nombre</th>
          <th>Descripción</th>
          <th>Tipo</th>
          <th>URL</th>
          <th>Ver Material</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($materiales as $material) {
        ?>
          <tr>
            <td><?php echo $material->id; ?></td>
            <td><?php echo $material->subtema->tema->bloque->grupo->nombre; ?></td>
            <td><?php echo $material->subtema->tema->bloque->nombre; ?></td>
            <td><?php echo $material->subtema->tema->nombre; ?></td>
            <td><?php echo $material->subtema->nombre; ?></td>
            <td><?php echo $material->nombre; ?></td>
            <td><?php echo $material->descripcion; ?></td>
            <td><?php echo $material->tipo; ?></td>
            <td><?php echo $material->url; ?></td>
            <td class="acciones">
              <a href="/alumno/material.php?id=<?php echo $material->id; ?>">👁</a>
            </td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>
</div>

<?php require_once(dirname(dirname(__FILE__)) . '/src/componentes_ui/pie_de_pagina.php'); ?>