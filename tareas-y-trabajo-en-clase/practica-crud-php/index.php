<html>
    <head>
        <title>Conexion a BD PHP</title>
    </head>
    <body>
        
    <?php
    // Obtenemos los datos de conexion de la base de datos
    $conexion=mysqli_connect('localhost','root','root','ejemplo_1');
    // Comprobamos la conexion
    if(!$conexion){
        echo 'Error';
    }
    // Confirmación de conexión a la base de datos
    echo 'Conectado a la base de datos';
    ?>
    <table border="1">
        <tr>
            <td colspan="4">MySQL, PHP SELECT QUERY</td>
        </tr>
        <tr>
            <td>id</td>
            <td>user</td>
            <td>password</td>
            <td>role</td>
        </tr>

        <?php
        // Obtenemos el resultado de la consulta
        $result = mysqli_query($conexion,"SELECT * FROM usuario");
        // Recorremos el resultado de la consulta
        while($row = mysqli_fetch_array($result)){
            // Mostramos los datos de la consulta
            ?>
            <tr>
                <td><?php echo $row["id"]; ?></td>
                <td><?php echo $row["user"]; ?></td>
                <td><?php echo $row["password"]; ?></td>
                <td><?php echo $row["role"]; ?></td>
            </tr>
        <?php    
        }
        ?>
        
    </table>
    <br><br><a href="insertar.php">Insertar nuevo registro</a>
    &nbsp;&nbsp;&nbsp;&nbsp;
    <a href="eliminar.php">Eliminar registros</a>
    &nbsp;&nbsp;&nbsp;&nbsp;
    <a href="modificar.php">Modificar registros</a>
    </body>
</html>