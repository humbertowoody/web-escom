<html>
    <head>
        <title>Eliminar - CRUD PHP + MySQL</title>
        <meta name="keywords" content="eliminar,crud,php,mysql">
        <meta name="description" content="Función de eliminar en un CRUD de PHP + MySQL">
        <meta name="author" content="Humberto Alejandro Ortega Alcocer">
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    </head>
    <body>
        <?php
            // Incluimos el archivo que contiene la conexión a la base de datos
            include("conexion.php");
        ?>
        <h1>Eliminar un registro</h1>
        <form action="" method="POST">
            Ingresa el id del registro a eliminar: <input type="text" name="id"><br>
            <input type="submit" name="eliminar" value="Eliminar">
        </form>
        <?php
            // Si se ha enviado el formulario
            if($_POST){
                // Se recoge el id del registro a eliminar y se ejecuta la consulta
                $reg=mysqli_query($conexion,"SELECT id FROM usuario WHERE id='$_POST[id]'");
                // Si el registro existe
                if($re=mysqli_fetch_array($reg)){
                    // Se ejecuta la consulta para eliminar el registro
                    mysqli_query($conexion,"DELETE FROM usuario WHERE id='$_POST[id]'") or die(mysqli_error($conexion));
                    // Se muestra un mensaje de confirmación
                    echo "<h2>Registro eliminado</h2>";
                }
                else{
                    // Si no existe el registro se muestra un mensaje de error
                    echo "<h2>Registro no eliminado o no existente</h2>";
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