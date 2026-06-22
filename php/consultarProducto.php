<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado de Consulta - Hardware</title>
    <link rel="stylesheet" href="../css/style.css">
    
</head>
<body>

    <div class="panel-container">
        <div class="panel-header">
            <h2>SYS_INV::RESULTADO_CONSULTA</h2>
            <span class="status-indicator"></span>
        </div>

        <div class="terminal-output">
            <?php
            /** @var mysqli $conexion */
            include ("../db/connection.php");
            
            $consulta = "select * from productos where codigo='$_REQUEST[fcodigo]'";
            $registros = mysqli_query($conexion, $consulta) or die("problemas en la conexión, intente más tarde");
            
            $numRegistros = mysqli_num_rows($registros);
            
            // ===== SECCIÓN MODIFICADA CON TABLA =====
            if($reg = mysqli_fetch_array($registros)){
                // Mostrar datos en tabla
                echo "<table class='results-table'>";
                echo "<thead><tr>";
                echo "<th>Código</th>";
                echo "<th>Nombre</th>";
                echo "<th>Precio</th>";
                echo "<th>Cantidad</th>";
                echo "</tr></thead>";
                echo "<tbody>";
                echo "<tr>";
                echo "<td>$reg[codigo]</td>";
                echo "<td>$reg[nombre]</td>";
                echo "<td>$reg[precio]</td>";
                echo "<td>$reg[cantidad]</td>";
                echo "</tr>";
                echo "</tbody></table>";
            } else {
                echo "<p class='text-error'> Este producto no existe!</p>";
            }
            // ===== FIN SECCIÓN MODIFICADA =====
            
            mysqli_close($conexion);
            ?>
        </div>

        <a href="../formularios/consultar.html" class="btn-link">[ REALIZAR_OTRA_CONSULTA ]</a>
    </div>

</body>
</html>