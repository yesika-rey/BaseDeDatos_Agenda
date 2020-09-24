<?php
session_start();
require 'conexion.php';
$conexion=new Conexion();
$datos=Array();
$id_usuario=$_SESSION['id_usuario'];
$datos['titulo']=$_POST['titulo'];
$datos['fec_inicio']=$_POST['start_date'];
$datos['duracion']=$_POST['allDay'];
$datos['fec_fin']=$_POST['end_date'];
$datos['hora_fin']=$_POST['end_hour'];
$datos['hora_inicio']=$_POST['start_hour'];
$datos["fk_usuario"]=$id_usuario;
try {
  $conexion->crearEvento($datos);
  $result['msg']="OK";

} catch (Exception $e) {
    $result['msg']=$e;
}
echo json_encode($result);


 ?>
