<?php
mysqli_report(MYSQLI_REPORT_OFF);
          
include("varProductos.php");

$conexion=@mysqli_connect($servidor,$usuario,$contrasenha,$bd);
if($conexion){
    echo "<p>✅</p>";
}else{
    echo "<p>Conexion Fallida</p>";
}

?>