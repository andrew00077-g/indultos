<?php
include("conexion.php");

$data = json_decode(file_get_contents("php://input"));

$id       = $data->id ?? 0;
$nombre   = $data->nombre ?? '';
$ci       = $data->ci ?? '';
$delito   = $data->delito ?? '';
$condena  = $data->condena ?? '';
$conducta = $data->conducta ?? '';

$sql = "UPDATE internos SET
nombre='$nombre',
ci='$ci',
delito='$delito',
condena='$condena',
conducta='$conducta'
WHERE id='$id'";

if($conn->query($sql)){
  echo json_encode(["success"=>true,"message"=>"Actualizado"]);
}else{
  echo json_encode(["success"=>false,"message"=>"Error al editar"]);
}
?>