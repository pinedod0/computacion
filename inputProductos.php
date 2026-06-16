<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado de Ingreso - Hardware</title>
    <link rel="stylesheet" href="css/style.css"> 
    
    <!-- <style>
        .terminal-output {
            background-color: #050505;
            border: 1px solid var(--border-color);
            border-left: 3px solid var(--accent-color);
            padding: 15px;
            margin-bottom: 25px;
            font-family: var(--font-mono);
            color: #8b949e;
            font-size: 0.9rem;
            line-height: 1.5;
        }
        .text-success { color: var(--accent-color); }
        .text-error { color: var(--error-color); }
        .btn-link {
            display: block;
            text-align: center;
            text-decoration: none;
            box-sizing: border-box;
        }
    </style> -->
</head>
<body>

    <div class="panel-container">
        <div class="panel-header">
            <h2>SYS_INV::RESULTADO_OPERACION</h2>
            <span class="status-indicator"></span>
        </div>

        <div class="terminal-output">
            <?php
            include("connection.php");

            //Recoger los datos del formulario
                $nombre=$_REQUEST['fnombre'];
                $descripcion=$_REQUEST['fdescripcion'];
                $precio=$_REQUEST['fprecio'];
                $cantidad=$_REQUEST['fcantidad'];

                //insertar los datos en la tabla
                $sql="INSERT INTO productos (nombre,descripcion,precio,cantidad) VALUES('$nombre','$descripcion','$precio','$cantidad')";

                $result=mysqli_query($conexion,$sql);
                

                if($result){
                    echo"<p>>_ Conexion satisfactoria</p>";
                    echo "<p class='text-success'>>_ Registro completado con éxito.</p>";
                }else{
                    //Cambiar el borde a rojo si falla
                echo "<script>document.querySelector('.terminal-output').style.borderLeftColor = 'var(--error-color)';</script>";
                echo "<p class='text-error'>>_ Problemas en la conexion o al insertar los datos.</p>";
                }
                          
                //cerrar conexion
                mysqli_close($conexion);

                
            // try{
            //     $conexion=mysqli_connect($servidor,$usuario,$contrasenha,$bd);
            //     echo"<p>>_ Conexion satisfactoria</p>";

            //     //Recoger los datos del formulario
            //     $nombre=$_REQUEST['fnombre'];
            //     $descripcion=$_REQUEST['fdescripcion'];
            //     $precio=$_REQUEST['fprecio'];
            //     $cantidad=$_REQUEST['fcantidad'];
                
            //     // Mostrar los datos recibidos (tu línea original adaptada visualmente)
            //     echo "<p>>_ Datos recibidos: " . $nombre . " | " . $descripcion . " | " . $precio . " | " . $cantidad . "</p>";
                
            //     //insertar los datos en la tabla
            //     $sql="INSERT INTO productos (nombre,descripcion,precio,cantidad) VALUES('$nombre','$descripcion','$precio','$cantidad')";
            //     echo "<p>>_ Ejecutando: " . $sql . "</p>";

            //     // ejecuto la consulta $sql en la conexion $conexion
            //     mysqli_query($conexion,$sql);
            //     echo "<p class='text-success'>>_ Registro completado con éxito.</p>";
                
            //     //cerrar conexion
            //     mysqli_close($conexion);
                
            // } catch(mysqli_sql_exception $error){
            //     // Cambiar el borde a rojo si falla
            //     echo "<script>document.querySelector('.terminal-output').style.borderLeftColor = 'var(--error-color)';</script>";
            //     echo "<p class='text-error'>>_ Problemas en la conexion o al insertar los datos.</p>";
            //     // echo "<p>" . $error->getMessage() . "</p>"; //objeto.metodo ->s
            // }
            ?>
        </div>

        <a href="formProductos.html" class="btn-submit btn-link">[ INGRESAR_OTRO_PRODUCTO ]</a>
    </div>

</body>
</html>