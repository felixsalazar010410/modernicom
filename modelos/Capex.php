
<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Capex
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar($codigo,$nombre)
	{
		$sql="INSERT INTO capex (codigo,nombre,condicion)
		VALUES ('$codigo','$nombre','1')";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar($idcapex,$codigo,$nombre)
	{
		$sql="UPDATE capex SET codigo='$codigo',nombre='$nombre' WHERE idcapex='$idcapex'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para desactivar categorías
	public function desactivar($idcapex)
	{
		$sql="UPDATE capex SET condicion='0' WHERE idcapex='$idcapex'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar categorías
	public function activar($idcapex)
	{
		$sql="UPDATE capex SET condicion='1' WHERE idcapex='$idcapex'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($idcapex)
	{
		$sql="SELECT * FROM capex WHERE idcapex='$idcapex'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT * FROM capex";
		return ejecutarConsulta($sql);		
	}
	//Implementar un método para listar los registros y mostrar en el select
	public function select()
	{
		$sql="SELECT * FROM capex where condicion=1";
		return ejecutarConsulta($sql);		
	}
}

?>