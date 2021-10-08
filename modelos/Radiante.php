<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Radiante
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar($site,$dec_nombre,$documentador,$observaciones,$imagen,$imagen2)
	{
		$sql="INSERT INTO radiante(site,dec_nombre,documentador,observaciones,imagen,imagen2,condicion)VALUES ('$site','$dec_nombre','$documentador','$observaciones','$imagen','$imagen2','0')";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar($idradiante,$site,$dec_nombre,$documentador,$observaciones,$imagen,$imagen2)
	{
		$sql="UPDATE radiante SET site='$site',dec_nombre='$dec_nombre',documentador='$documentador',observaciones='$observaciones',imagen='$imagen',imagen2='$imagen2' WHERE idradiante='$idradiante'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para desactivar categorías
	public function desactivar($idradiante)
	{
		$sql="UPDATE radiante SET condicion='0' WHERE idradiante='$idradiante'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar categorías
	public function activar($idradiante)
	{
		$sql="UPDATE radiante SET condicion='1' WHERE idradiante='$idradiante'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($idradiante)
	{
		$sql="SELECT * FROM radiante WHERE idradiante='$idradiante'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT * FROM radiante";

		
		return ejecutarConsulta($sql);		
	}
	//Implementar un método para listar los registros y mostrar en el select
	public function select()
	{
		$sql="SELECT * FROM radiante";
		return ejecutarConsulta($sql);		
	}
}

?>