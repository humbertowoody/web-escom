<?php

// Clase para almacenar la configuración general de la aplicación.
class Config
{

  // Configuración de la base de datos.
  public static $db_host = 'localhost';
  public static $db_name = 'proyecto_web';
  public static $db_user = 'root';
  public static $db_pass = 'root';

  // Configuración de la aplicación.
  public static $nombre_proyecto = "SAES+";

  // Configuración de roles de usuario.
  public static $rol_admin = 'ADMINISTRADOR';
  public static $rol_profesor = 'PROFESOR';
  public static $rol_alumno = 'ALUMNO';

  // Configuración de tipos de material.
  public static $material_url = 'URL';
  public static $material_video = 'VIDEO';
  public static $material_pdf = 'PDF';
}
