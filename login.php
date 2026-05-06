<?php
include("conexion.php");

$data = json_decode(file_get_contents("php://input"));

if (!$data) {
    echo json_encode([
        "success" => false,
        "message" => "No se recibieron datos"
    ]);
    exit;
}

$usuario = $data->usuario ?? '';
$password = $data->password ?? '';

$sql = "SELECT * FROM usuarios 
        WHERE usuario='$usuario' 
        AND password='$password'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $fila = $result->fetch_assoc();

    echo json_encode([
        "success" => true,
        "usuario" => $fila["nombre"],
        "rol" => $fila["rol"]
    ]);
} else {
    echo json_encode([
        "success" => false,
        "message" => "Credenciales incorrectas"
    ]);
}
?>