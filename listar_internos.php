<?php
include("conexion.php");

$datos = [];

$sql = "SELECT * FROM internos";
$resultado = $conn->query($sql);

if ($resultado) {
    while ($fila = $resultado->fetch_assoc()) {
        $datos[] = $fila;
    }
}

echo json_encode($datos);
?>