<html>
    <head>
        <title>Insertar - CRUD PHP + MySQL</title>
        <meta name="keywords" content="insertar,crud,php,mysql">
        <meta name="description" content="Función de insertar en un CRUD de PHP + MySQL">
        <meta name="author" content="Humberto Alejandro Ortega Alcocer">
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    </head>
    <body>
        <?php
            // Incluimos el archivo que contiene la conexión con la base de datos
            include("conexion.php");
        ?>
        <h1>Agregar nuevo registro</h1>
        <form action="" method="POST">
            usuario: <input type="text" name="user"><br>
            contraseña: <input type="text" name="password"><br>
            puesto: <input type="text" name="role"><br>
            <input type="submit" name="enviar" value="enviar">
        </form>

        <?php
            // Comprobamos si se ha enviado el formulario
            if($_POST){  
                // Guardamos los datos en variables
                $nombre=$_POST['user'];
                $contraseña=$_POST['password'];
                $puesto=$_POST['role'];
                // Insertamos los datos en la tabla usuarios
                mysqli_query($conexion,"INSERT INTO usuario(user,password,role) VALUES('$nombre','$contraseña','$puesto')") or die(mysqli_error($conexion));
                // Mostramos un mensaje de confirmación
                echo "<h2>dato guardado</h2>";
            }
        ?>
        <br><br><a href="index.php">Consultar registros</a>
        &nbsp;&nbsp;&nbsp;&nbsp;
        <a href="eliminar.php">Eliminar registros</a>
        &nbsp;&nbsp;&nbsp;&nbsp;
        <a href="modificar.php">Modificar registros</a>
    </body>
</html>
