<?php
include("conexion.php");

$data = json_decode(file_get_contents("php://input"));

$nombre   = $data->nombre ?? '';
$ci       = $data->ci ?? '';
$delito   = $data->delito ?? '';
$condena  = $data->condena ?? '';
$conducta = $data->conducta ?? '';

$sql = "INSERT INTO internos(nombre, ci, delito, condena, conducta)
VALUES('$nombre','$ci','$delito','$condena','$conducta')";

if ($conn->query($sql)) {
    echo json_encode([
        "success" => true,
        "message" => "Interno registrado"
    ]);
} else {
    echo json_encode([
        "success" => false,
        "message" => "Error al guardar"
    ]);
}
?>