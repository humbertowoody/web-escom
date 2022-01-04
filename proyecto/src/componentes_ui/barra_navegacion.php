<?php
// Importamos la configuración general.
require_once(dirname(dirname(dirname(__FILE__))) . '/src/config.php');

// Importamos el archivo de sesión para saber si hay
// o no un usuario loggeado, y de haberlo, el nivel
// de acceso.
require_once(dirname(dirname(dirname(__FILE__))) . '/src/sesion.php');

?>
<link rel="stylesheet" href="/assets/css/barra_navegacion.css">
<div id="barra-navegacion">
  <?php
  // Si se ha iniciado sesión.
  if ($sesion_iniciada == true) {
    // Contenido si el usuario es un administrador.
    if ($sesion_tipo_usuario == Config::$rol_admin) {
  ?>
      <a class="elemento-menu <?php if (TITULO_PAGINA == 'Admin - Inicio') {
                                echo "elemento-menu-actual";
                              } ?>" href="/admin/index.php">Inicio</a>
      <div class="dropdown">
        <div class="elemento-menu <?php if (TITULO_PAGINA == 'Admin - Usuarios' || TITULO_PAGINA == 'Admin - Grupos' || TITULO_PAGINA == 'Admin - Progresos') {
                                    echo "elemento-menu-actual";
                                  } ?>">Gestión de Miembros y Grupos</div>
        <div class="dropdown-content">
          <a href="/admin/usuarios.php">Usuarios</a>
          <a href="/admin/grupos.php">Grupos</a>
          <a href="/admin/progresos.php">Progresos</a>
        </div>
      </div>
      <div class="dropdown">
        <div class="elemento-menu <?php if (TITULO_PAGINA == 'Admin - Bloques' || TITULO_PAGINA == 'Admin - Temas' || TITULO_PAGINA == 'Admin - SubTemas' || TITULO_PAGINA == 'Admin - Materiales') {
                                    echo "elemento-menu-actual";
                                  } ?>">Gestión de Contenido</div>
        <div class="dropdown-content">
          <a href="/admin/bloques.php">Bloques</a>
          <a href="/admin/temas.php">Temas</a>
          <a href="/admin/subtemas.php">Subtemas</a>
          <a href="/admin/materiales.php">Materiales</a>
        </div>
      </div>

      <a class="elemento-menu <?php if (TITULO_PAGINA == 'Admin - Perfil') {
                                echo "elemento-menu-actual";
                              } ?>" href="/admin/perfil.php">Perfil</a>
      <a class="elemento-menu <?php if (TITULO_PAGINA == 'Admin - Dudas') {
                                echo "elemento-menu-actual";
                              } ?>" href="/admin/dudas.php">Dudas (Soporte)</a>
      <a class="elemento-menu <?php if (TITULO_PAGINA == 'Admin - Ayuda') {
                                echo "elemento-menu-actual";
                              } ?>" href="/admin/ayuda.php">Ayuda</a>
    <?php
    } elseif ($sesion_tipo_usuario == Config::$rol_profesor) {
      // Contenido si el usuario es un maestro.
    } else {
      // Contenido si el usuario es un alumno.
    }
  } else {
    // En caso de que no haya sesión inciada.
    ?>
    <a class="elemento-menu <?php if (TITULO_PAGINA == 'Inicio') {
                              echo "elemento-menu-actual";
                            } ?>" href="/">Principal</a>
    <a class="elemento-menu <?php if (TITULO_PAGINA == 'Acerca De') {
                              echo "elemento-menu-actual";
                            } ?>" href="/acerca-de.php">Acerca De</a>
    <a class="elemento-menu <?php if (TITULO_PAGINA == 'Preguntas Frecuentes') {
                              echo "elemento-menu-actual";
                            } ?>" href="/faq.php">Preguntas Frecuentes</a>
    <a class="elemento-menu <?php if (TITULO_PAGINA == 'Contacto') {
                              echo "elemento-menu-actual";
                            } ?>" href="/contacto.php">Contacto</a>
    <a class="elemento-menu <?php if (TITULO_PAGINA == 'Ayuda') {
                              echo "elemento-menu-actual";
                            } ?>" href="/ayuda.php">Ayuda</a>
  <?php
  }
  ?>
</div>