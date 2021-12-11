<?php
  /**
   * Conexión a la base de datos
   */
    $servidor="localhost"; // url del servidor
    $usuario="root"; // usuario de la base de datos
    $clave="root"; // contraseña del usuario
    $db="ejemplo_1"; // nombre de la base de datos
    $conexion=mysqli_connect($servidor,$usuario,$clave); // conexión a la base de datos
    mysqli_select_db($conexion,$db); // selección de la base de datos
?>
