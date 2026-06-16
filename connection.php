<?php
mysqli_report(MYSQLI_REPORT_OFF);
          
include("varProductos.php");

$conexion=@mysqli_connect($servidor,$usuario,$contrasenha,$bd);
?>