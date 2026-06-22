<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado de BORRADO - Hardware</title>
    <link rel="stylesheet" href="../css/style.css"> 
    
</head>
<body>

    <div class="panel-container">
        <div class="panel-header">
            <h2>SYS_INV::RESULTADO_ELMINACION</h2>
            <span class="status-indicator"></span>
        </div>

        <div class="terminal-output">
            <?php 
                /** @var mysqli $conexion */
                include ("../db/connection.php");

                //definir la consulta
                $consulta="select * from productos where codigo='$_REQUEST[fcodigo]'  "; //el string de la consulta
                //ejecutar la consulta
                $registros=mysqli_query($conexion,$consulta)or die("<p>Problemas de conexión</p>");
                if(mysqli_num_rows($registros)>0){
                        $consulta="delete from productos where codigo='$_REQUEST[fcodigo]'";
                        mysqli_query($conexion,$consulta)or die("<p>Problemas con el proceso de borrado</p>");
                        echo "<p class='text-success'>Hemos borrado la entrada $_REQUEST[fcodigo]</p>";
                }else{
                    //este producto no existe en la base de datos
                    echo "<p>Este producto no existe en la base de datos</p>";
                }
                //salida de consulta
                mysqli_close($conexion);
            ?>
        </div>

        <a href="../formularios/borrar.html" class="btn-link">[ ELIMINAR_OTRO_PRODUCTO ]</a>
    </div>

</body>
</html>