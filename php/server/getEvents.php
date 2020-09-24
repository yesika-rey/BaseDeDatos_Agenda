<?php
header('content-Type:application/json');
session_start();
    require('conexion.php');
    $conexion=new Conexion();
    $id_usuario=$_SESSION['id_usuario'];
    $eventos=array();
    $resultado=$conexion->cargarEventos($id_usuario);
    if (count($resultado)>0 ) {
      foreach ($resultado as $fila) {
        $evento=array(
         'id'=>$fila['id_evento'],
         'fk_usuario'=>$fila['fk_usuario'],
         'title'=>$fila['titulo'],
         'start'=>$fila['fec_inicio'].' '.$fila['hora_inicio'],
         'end'=>$fila['fec_fin'].' '.$fila['hora_fin'],
         'allday'=>$fila['duracion']);
          array_push($eventos, $evento);
      }
        $response['eventos']=$eventos;
        $response['msg']='OK';

    }else{
      $response['msg']='No tienes eventos en la agenda';
    }
      echo json_encode($response);
 ?>
