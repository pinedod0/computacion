<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado de Actualizacion - Hardware</title>
    <link rel="stylesheet" href="../css/style.css"> 
    
</head>
<body>

    <div class="panel-container">
        <div class="panel-header">
            <h2>SYS_INV::RESULTADO_ACTUALIZACION</h2>
            <span class="status-indicator"></span>
        </div>

        <div class="terminal-output">
            <?php
            /** @var mysqli $conexion */
            include ("../db/connection.php");

            //defininmos la consulta
            $consulta="select * from productos where codigo='$_REQUEST[fcodigo]'  "; //el string de la consulta

            //efectuamos la consulta
            $registros=mysqli_query($conexion, $consulta) or die("problemas en la conexión, intente más tarde");
            if(mysqli_num_rows($registros)>0){
                $consulta="update productos set precio='$_REQUEST[fprecio]',cantidad='$_REQUEST[fcantidad]' where codigo='$_REQUEST[fcodigo]'";
                mysqli_query($conexion,$consulta)or die("<p>Problemas con la actualización</p>");
                echo "<p class='text-success'>El producto $_REQUEST[fcodigo] ha sido actualizado</p>";
            }else{
                echo "<p> Este producto no existe!</p>";
            }

            mysqli_close($conexion);
            ?>
        </div>

        <a href="../formularios/actualizar.html" class="btn-link">[ ACTUALIZAR_OTRO_PRODUCTO ]</a>
    </div>

</body>
</html>