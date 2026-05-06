<?php
include("conexion.php");

$data = json_decode(file_get_contents("php://input"));
$id = $data->id ?? 0;

$sql = "DELETE FROM internos WHERE id='$id'";

if($conn->query($sql)){
  echo json_encode(["success"=>true,"message"=>"Eliminado correctamente"]);
}else{
  echo json_encode(["success"=>false,"message"=>"Error al eliminar"]);
}
?>