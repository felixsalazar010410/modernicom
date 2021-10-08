<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Videos
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar($site,$dec_nombre,$observaciones,$imagen)
	{
		$sql="INSERT INTO videos(site,dec_nombre,observaciones,imagen,condicion)VALUES ('$site','$dec_nombre','$observaciones','$imagen','1')";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar($idvideos,$site,$dec_nombre,$observaciones,$imagen)
	{
		$sql="UPDATE videos SET site='$site',dec_nombre='$dec_nombre',observaciones='$observaciones',imagen='$imagen' WHERE idvideos='$idvideos'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para desactivar categorías
	public function desactivar($idvideos)
	{
		$sql="UPDATE videos SET condicion='0' WHERE idvideos='$idvideos'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar categorías
	public function activar($idvideos)
	{
		$sql="UPDATE videos SET condicion='1' WHERE idvideos='$idvideos'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($idvideos)
	{
		$sql="SELECT * FROM videos WHERE idvideos='$idvideos'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT * FROM videos";

		
		return ejecutarConsulta($sql);		
	}
	//Implementar un método para listar los registros y mostrar en el select
	public function select()
	{
		$sql="SELECT * FROM videos";
		return ejecutarConsulta($sql);		
	}
}

?>