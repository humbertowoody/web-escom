<html>
    <head>
        <title>Modificar - CRUD PHP + MySQL</title>
        <meta name="keywords" content="modificar,crud,php,mysql">
        <meta name="description" content="Función de modificar en un CRUD de PHP + MySQL">
        <meta name="author" content="Humberto Alejandro Ortega Alcocer">
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    </head>
    <body>
        <?php
          // Incluimos el archivo que contiene la conexión a la base de datos
          include("conexion.php");
        ?>
        <h1>Modificar un registro</h1>
        <form action="" method="POST">
            <input type="text" name="id" placeholder="Ingrese el id del registro a modificar"><br>
            <input type="text" name="newuser" placeholder="Ingrese el nuevo usuario"><br>
            <input type="text" name="newpassword" placeholder="Ingrese la nueva contraseña"><br>
            <input type="text" name="newrole" placeholder="Ingrese el nuevo role"><br>
            <input type="submit" name="actualizar" value="Actualizar">
        </form>

        <?php
          // Si se ha enviado el formulario
            if($_POST){
              // Ejecutamos la consulta
                $reg=mysqli_query($conexion,"SELECT id FROM usuario WHERE id='$_POST[id]'");
                // Si el registro existe
                if($re=mysqli_fetch_array($reg)){
                  // Descomponemos los resultados de la consulta en variables.
                    $id= $_POST['id'];
                    $user= $_POST['newuser'];
                    $password= $_POST['newpassword'];
                    $role= $_POST['newrole'];
                    // Seleccionamos la base de datos para confirmar que la conexión con la DB siga activa.
                    mysqli_select_db($conexion,$db) or die(mysqli_error($conexion));
                    // Ejecutamos la consulta de actualización.
                    mysqli_query($conexion,"UPDATE usuario SET user='$user', password='$password', role='$role' WHERE id='$id'");
                    // Mostramos una confirmación de que se ha actualizado el registro.
                    echo "<h2>registro actualizado</h2>";
                }
                else{
                  // Si no existe el registro mostramos un mensaje de error.
                    echo "<h2>Registro no actualizado o no existente</h2>";
                }
            }

        ?>

        <br><br><a href="index.php">Consultar registros</a>
        &nbsp;&nbsp;&nbsp;&nbsp;
        <a href="insertar.php">Añadir registros</a>
        &nbsp;&nbsp;&nbsp;&nbsp;
        <a href="modificar.php">Modificar registros</a>
    </body>
</html>