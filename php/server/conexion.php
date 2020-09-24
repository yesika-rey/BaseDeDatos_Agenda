<?php

class Conexion
{
  private static $db_host ="localhost";
		private static $db_user = "root";
		private static $db_pass = "";
		protected $db_name = "miagenda";
		protected $query;
		protected $rows = array();
		private $conexion;

    #conectarse a la db
		public function abrir_conexion() {
			$this->conexion =
			   new mysqli(self::$db_host, self::$db_user, self::$db_pass, $this->db_name)or die (mysqli_errno($this->conexion));

		}
    #cerramos la conexion
    public function cerrar_conexion() {
			$this->conexion->close();
		}
    #login
    public function checLogin($usuario='')
    {
        $this->query="SELECT * FROM usuario WHERE usuario='$usuario'";
        $this->abrir_conexion();
        $result = $this->conexion->query($this->query)
        or die(mysqli_errno($this->conexion)." : "
        .mysqli_error($this->conexion)." | Query=".$this->query);
        while ($this->rows[] = $result->fetch_assoc());
        $result->close();
        $this->cerrar_conexion();
        array_pop($this->rows);
        return $this->rows;

    }
    #cargar eventos
    public function cargarEventos($id_usuario='')
    {
        $this->query="SELECT * FROM eventos WHERE fk_usuario='$id_usuario'";
        $this->abrir_conexion();
        $result = $this->conexion->query($this->query)
        or die(mysqli_errno($this->conexion)." : "
        .mysqli_error($this->conexion)." | Query=".$this->query);
        while ($this->rows[] = $result->fetch_assoc());
        $result->close();
        $this->cerrar_conexion();
        array_pop($this->rows);
        return $this->rows;

    }
    #crear eventos nuevos a los usuarios
    public function crearEvento($datos=array())
    {
        foreach ($datos as $campo=>$valor):
  			$$campo = $valor;
  		  endforeach;
        $this->query="INSERT INTO eventos (id_evento, titulo, fec_inicio,
        hora_inicio, fec_fin, hora_fin, fk_usuario, duracion)
        VALUES (NULL, '$titulo', '$fec_inicio', '$hora_inicio','$fec_fin','$hora_fin', '$fk_usuario', '$duracion')";
        $this->abrir_conexion();
      	$this->conexion->query($this->query) or die(mysqli_errno($this->conexion)." : "
        .mysqli_error($this->conexion)."  | Query=".$this->query);
        $this->cerrar_conexion();
    }
    #Funcion para actualizar los eventos
    public function actualizarEvento($datos=array())
    {
       foreach ($datos as $campo=>$valor):
       $$campo=$valor;
       endforeach;
       $this->query="UPDATE eventos SET fec_inicio='$fec_inicio',hora_inicio='$hora_inicio',
       fec_fin='$fec_fin',hora_fin='$hora_fin' WHERE id_evento=$id_evento";
       $this->abrir_conexion();
       $this->conexion->query($this->query)or die(mysqli_errno($this->conexion)." : "
       .mysqli_error($this->conexion)."  | Query=".$this->query);
       $this->cerrar_conexion();
     }
     #Funcion para eliminar eventos
     public function eliminarEvento($id_evento='')
     {
       $this->query="DELETE FROM eventos WHERE id_evento=$id_evento";
       $this->abrir_conexion();
       $this->conexion->query($this->query) or die(mysqli_errno($this->conexion).":"
       .mysqli_error($this->conexion)." | Query=".$this->query);
       $this->cerrar_conexion();
     }
     #se crean los usuarios
     public function crearUsuario($datos=array())
     {
        foreach ($datos as $key => $value):
        $$campo=$valor;
        endforeach;
        $this->query="INSERT INTO usuario(nombre,usuario,clave,fec_nacimiento)
        VALUES(NULL,$nombre,$usuario,$clave,$fec_nacimiento)";
        $this->abrir_conexion();
        $this->conexion->query($this->query)or die(mysqli_errno($this->conexion).":"
        .mysqli_error($this->conexion)."| Query:".$this->query);
        $this->cerrar_conexion();
     }
}
 ?>
