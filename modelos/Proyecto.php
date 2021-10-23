<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class proyecto
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar($operador,$cliente,$nombre,$descripcion)
	{
		$sql="INSERT INTO proyecto (operador,cliente,nombre,descripcion,condicion)
		VALUES ('$operador','$cliente','$nombre','$descripcion','1')";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar($idproyecto,$operador,$cliente,$nombre,$descripcion)
	{
		$sql="UPDATE proyecto SET operador='$operador',cliente='$cliente',nombre='$nombre',descripcion='$descripcion' WHERE idproyecto='$idproyecto'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para desactivar categorías
	public function desactivar($idproyecto)
	{
		$sql="UPDATE proyecto SET condicion='0' WHERE idproyecto='$idproyecto'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar categorías
	public function activar($idproyecto)
	{
		$sql="UPDATE proyecto SET condicion='1' WHERE idproyecto='$idproyecto' ";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($idproyecto)
	{
		$sql="SELECT * FROM proyecto WHERE idproyecto='$idproyecto'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT * FROM proyecto";
		return ejecutarConsulta($sql);		
	}
	//Implementar un método para listar los registros y mostrar en el select
	public function select()
	{
		$sql="SELECT * FROM proyecto where cliente='OFG' ";
		return ejecutarConsulta($sql);		
	}
	public function selectsyf()
	{
		$sql="SELECT * FROM proyecto where operador='NOKIA' AND cliente='SYF'  ";
		return ejecutarConsulta($sql);		
	}
	public function selectsyfDominion()
	{
		$sql="SELECT * FROM proyecto where operador='CLARO' AND cliente='SYF' ";
		return ejecutarConsulta($sql);		
	}
}

?>