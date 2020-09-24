<?php
  session_start();
  require 'conexion.php';
    $id_evento=$_POST['id'];
    $conexion=new Conexion();
  try {
    $conexion->eliminarEvento($id_evento);
    $result['msg']="OK";
  } catch (Exception $e) {
    $result['msg']="El evento no se eliminó, disculpa";
  }
    echo json_encode($result);

 ?>
