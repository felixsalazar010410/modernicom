<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class cronograma
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar($fecha,$site,$banda,$actividad,$chg,$lider,$telefono)
	{
		$sql="INSERT INTO cronograma (fecha,site,banda,actividad,chg,lider,telefono,condicion)
		VALUES ('$fecha','$site','$banda','$actividad','$chg','$lider','$telefono','1')";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar($idcronograma,$fecha,$site,$banda,$actividad,$chg,$lider,$telefono)
	{
		$sql="UPDATE cronograma SET fecha='$fecha',site='$site',banda='$banda',actividad='$actividad',chg='$chg',lider='$lider',telefono='$telefono' WHERE idcronograma='$idcronograma'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para desactivar categorías
	public function desactivar($idcronograma)
	{
		$sql="UPDATE cronograma SET condicion='0' WHERE idcronograma='$idcronograma'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar categorías
	public function activar($idcronograma)
	{
		$sql="UPDATE cronograma SET condicion='1' WHERE idcronograma='$idcronograma'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($idcronograma)
	{
		$sql="SELECT * FROM cronograma";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT * FROM cronograma";
		return ejecutarConsulta($sql);		
	}
	//Implementar un método para listar los registros y mostrar en el select
	public function select()
	{
		$sql="SELECT * FROM cronograma where condicion=1";
		return ejecutarConsulta($sql);		
	}
}

?>