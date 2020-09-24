<?php
  require 'conexion.php';
  $datos=array();
  $conexion=new Conexion();
  $datos['id_evento']=$_POST['id'];
  $datos['fec_inicio']=$_POST['start_date'];
  $datos['hora_inicio']=$_POST['start_hour'];
  $datos['fec_fin']=$_POST['end_date'];
  $datos['hora_fin']=$_POST['end_hour'];
  try {
    $conexion->actualizarEvento($datos);
    $result['msg']="OK";
  } catch (Exception $e) {
    $result['msg']="El evento se actualizó, disculpa";
  }
    echo json_encode($result);



 ?>
