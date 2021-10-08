<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class categoria_herramienta
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar($nombre,$descripcion)
	{
		$sql="INSERT INTO categoria_herramienta (nombre,descripcion,condicion)
		VALUES ('$nombre','$descripcion','1')";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar($idcategoria_herramienta,$nombre,$descripcion)
	{
		$sql="UPDATE categoria_herramienta SET nombre='$nombre',descripcion='$descripcion' WHERE idcategoria_herramienta='$idcategoria_herramienta'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para desactivar categorías
	public function desactivar($idcategoria_herramienta)
	{
		$sql="UPDATE categoria_herramienta SET condicion='0' WHERE idcategoria_herramienta='$idcategoria_herramienta'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar categorías
	public function activar($idcategoria_herramienta)
	{
		$sql="UPDATE categoria_herramienta SET condicion='1' WHERE idcategoria_herramienta='$idcategoria_herramienta'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($idcategoria_herramienta)
	{
		$sql="SELECT * FROM categoria_herramienta WHERE idcategoria_herramienta='$idcategoria_herramienta'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT * FROM categoria_herramienta";
		return ejecutarConsulta($sql);		
	}
	//Implementar un método para listar los registros y mostrar en el select
	public function select()
	{
		$sql="SELECT * FROM categoria_herramienta where condicion=1";
		return ejecutarConsulta($sql);		
	}
}

?>