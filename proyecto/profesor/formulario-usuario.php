<?php
// Importamos el archivo de configuración general.
require_once(dirname(dirname(__FILE__)) . '/src/config.php');

// Importamos el servicio de usuarios.
require_once(dirname(dirname(__FILE__)) . '/src/usuario/servicio_usuario.php');

// Instanciamos el servicio de usuarios.
$servicio = new ServicioUsuario();

// Importamos el servicio de grupos.
require_once(dirname(dirname(__FILE__)) . '/src/grupo/servicio_grupo.php');

// Instanciamos el servicio de grupos.
$servicio_grupo = new ServicioGrupo();

// Obtenemos todos los grupos.
$grupos = $servicio_grupo->obtenerGrupos();

// Definimos el título de la página.
define('TITULO_PAGINA', 'Profesor - Usuarios');

// Encabezado de la página.
require_once(dirname(dirname(__FILE__)) . '/src/componentes_ui/encabezado.php');

// Bandera para modo de formulario.
$editar_usuario = isset($_GET['id']);

// Creamos objeto.
$usuario = new Usuario();

// Si la bandera de edición está activa, cargamos datos.
if ($editar_usuario) {
  $usuario = $servicio->obtenerUsuarioPorID($_GET["id"]);
}

?>

<link rel="stylesheet" href="/assets/css/formulario-usuario.css">
<div id="formulario-usuario">
  <h1><?php if ($editar_usuario) {
        echo "Editar Usuario";
      } else {
        echo "Agregar Usuario";
      } ?></h1>
  <p>Para volver, <a href="/profesor/usuarios.php">haz click aquí.</a></p>
  <form action="/acciones/profesor/<?php if ($editar_usuario) {
                                      echo "editar-usuario.php?id=" . $_GET['id'];
                                    } else {
                                      echo "crear-usuario.php";
                                    } ?>" method="post">
    <div class="fila">
      <div class="columna">
        <p>
          Nombre: <input class="campo" type="text" name="nombre" id="nombre" value="<?php if ($editar_usuario) {
                                                                                      echo $usuario->nombre;
                                                                                    } ?>">
        </p>
        <p>
          Apellido Paterno: <input class="campo" type="text" name="ap_pat" id="ap_pat" value="<?php if ($editar_usuario) {
                                                                                                echo $usuario->ap_pat;
                                                                                              } ?>">
        </p>
        <p>
          Apellido Materno: <input class="campo" type="text" name="ap_mat" id="ap_mat" value="<?php if ($editar_usuario) {
                                                                                                echo $usuario->ap_mat;
                                                                                              } ?>">
        </p>
      </div>
      <div class="columna">
        <p>
          Correo Principal: <input class="campo" type="email" name="correo_principal" id="correo_principal" value="<?php if ($editar_usuario) {
                                                                                                                      echo $usuario->correo_principal;
                                                                                                                    } ?>">
        </p>
        <p>
          Correo Secundario: <input class="campo" type="email" name="correo_secundario" id="correo_secundario" value="<?php if ($editar_usuario) {
                                                                                                                        echo $usuario->correo_secundario;
                                                                                                                      } ?>">
        </p>
        <p>
          Numero Identificador: <input class="campo" type="text" name="numero_identificador" id="numero_identificador" value="<?php if ($editar_usuario) {
                                                                                                                                echo $usuario->numero_identificador;
                                                                                                                              } ?>">
        </p>
        <p>
          Grupo: <select name="id_grupo" id="id_grupo">
            <option value="" disabled>Selecciona un grupo...</option>
            <?php
            foreach ($grupos as $grupo) {
            ?>
              <option value="<?php echo $grupo->id; ?>" <?php if ($editar_usuario && $usuario->id_grupo == $grupo->id) {
                                                          echo "selected";
                                                        } ?>><?php echo $grupo->nombre . "(" . $grupo->id . ")"; ?></option>
            <?php
            }
            ?>
          </select>
        </p>
      </div>
    </div>
    <hr>
    <input type="submit" value="<?php if ($editar_usuario) {
                                  echo "Editar";
                                } else {
                                  echo "Agregar";
                                } ?> Usuario">
  </form>
</div>


<?php require_once(dirname(dirname(__FILE__)) . '/src/componentes_ui/pie_de_pagina.php'); ?>