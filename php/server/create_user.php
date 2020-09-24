<?php
#Codigo para crear los usuarios
$conexion =
new mysqli('localhost', 'root','','miagenda')or die (mysqli_errno($conexion));
$sql="INSERT INTO usuario(nombre,usuario,clave,fec_nacimiento) values(?,?,?,?)";
$insert=$conexion->prepare($sql);
$insert->bind_param("ssss",$nombre,$usuario,$clave,$fec_nacimiento);

$nombre="d81";
$usuario="d81@mail.com";
$clave=password_hash("12345", PASSWORD_DEFAULT);
$fec_nacimiento="1995-09-06";
$insert->	;

$nombre="d82";
$usuario="d82@mail.com";
$clave=password_hash("12345", PASSWORD_DEFAULT);
$fec_nacimiento="1995-09-06";
$insert->execute();

$nombre="d83";
$usuario="d83@mail.com";
$clave=password_hash("12345", PASSWORD_DEFAULT);
$fec_nacimiento="1995-09-06";
$insert->execute();

$conexion->close();

 ?>
