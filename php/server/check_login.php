<?php
  session_start();
  require 'conexion.php';
  $usuario=$_POST['username'];
  $clave=$_POST['password'];
  $conexion=new Conexion();
  $resultado=$conexion->checLogin($usuario, $clave);
  if (count($resultado)>0 && password_verify($clave,$resultado[0]['clave'])) {

      $_SESSION['id_usuario']=$resultado[0]['id_usuario'];
      $_SESSION['nom_usuario']=$resultado[0]['nombre'];
      $_SESSION['usuario']=$resultado[0]['usuario'];
      $response['msg']='OK';

  }else{
      $response['msg']='Algo ingresaste mal';
  }
  echo(json_encode($response));


 ?>
