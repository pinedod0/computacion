<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado de Ingreso - Hardware</title>
    <link rel="stylesheet" href="../css/style.css"> 
    
</head>
<body>

    <div class="panel-container">
        <div class="panel-header">
            <h2>SYS_INV::RESULTADO_REGISTRO</h2>
            <span class="status-indicator"></span>
        </div>

        <div class="terminal-output">
            <?php
            /** @var mysqli $conexion */
            include("../db/connection.php");

            //Recoger los datos del formulario
                $nombre=$_REQUEST['fnombre'];
                $descripcion=$_REQUEST['fdescripcion'];
                $precio=$_REQUEST['fprecio'];
                $cantidad=$_REQUEST['fcantidad'];

                //insertar los datos en la tabla
                $sql="INSERT INTO productos (nombre,descripcion,precio,cantidad) VALUES('$nombre','$descripcion','$precio','$cantidad')";

                $result=mysqli_query($conexion,$sql);
                

                if($result){

                    // Obtener el código del producto recién insertado
                $nuevoCodigo = mysqli_insert_id($conexion);
                
                echo "<p class='text-success' style='font-size: 1.1rem; margin-top: 10px; border-top: 1px dashed var(--border-color); padding-top: 10px;'>";
                echo "📋 Código del nuevo producto: <strong style='font-size: 1.3rem;'>#{$nuevoCodigo}</strong>";
                echo "</p>";
                
                // Mostrar resumen de los datos insertados
                echo "<div style='margin-top: 10px; padding: 10px; background-color: rgba(0,255,204,0.05); border-radius: 4px;'>";
                echo "<p style='margin: 4px 0; color: #8b949e;'>📝 Nombre: <span style='color: var(--text-main);'>{$nombre}</span></p>";
                echo "<p style='margin: 4px 0; color: #8b949e;'>📄 Descripción: <span style='color: var(--text-main);'>{$descripcion}</span></p>";
                echo "<p style='margin: 4px 0; color: #8b949e;'>💰 Precio: <span style='color: var(--text-main);'>{$precio} €</span></p>";
                echo "<p style='margin: 4px 0; color: #8b949e;'>📦 Cantidad: <span style='color: var(--text-main);'>{$cantidad} unidades</span></p>";
                echo "</div>";
                    echo "<p class='text-success'>>_ Registro completado con éxito.</p>";
                }else{
                   // Cambiar el borde a rojo si falla
                echo "<script>document.querySelector('.terminal-output').style.borderLeftColor = 'var(--error-color)';</script>";
                echo "<p class='text-error'>>_ Problemas en la conexión o al insertar los datos.</p>";
                echo "<p class='text-error' style='font-size: 0.8rem;'>Error: " . mysqli_error($conexion) . "</p>";
                }
                          
                //cerrar conexion
                mysqli_close($conexion);
            ?>
        </div>

        <a href="../formularios/registrar.html" class="btn-link">[ INGRESAR_OTRO_PRODUCTO ]</a>
    </div>

</body>
</html>