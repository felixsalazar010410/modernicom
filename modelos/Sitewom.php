<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Sitewom
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar($codigo,$nombre,$regional,$torrero,$especialista,$auditor,$imagen,$imagen2,$imagen3,$imagen4,$imagen5)
	{
		$sql="INSERT INTO sitewom(codigo,nombre,regional,torrero,especialista,auditor,imagen,imagen2,imagen3,imagen4,imagen5,condicion)
		VALUES ('$codigo','$nombre','$regional','$torrero','$especialista','$auditor','$imagen','$imagen2','$imagen3','$imagen4','$imagen5','1')";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar($idsitewom,$codigo,$nombre,$regional,$torrero,$especialista,$auditor,$imagen,$imagen2,$imagen3,$imagen4,$imagen5)
	{
		$sql="UPDATE sitewom SET codigo='$codigo',nombre='$nombre',regional='$regional',torrero='$torrero',especialista='$especialista',auditor='$auditor',imagen='$imagen',imagen2='$imagen2',imagen3='$imagen3',imagen4='$imagen4',imagen5='$imagen5' WHERE idsitewom='$idsitewom'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para desactivar registros
	public function desactivar($idsitewom)
	{
		$sql="UPDATE sitewom SET condicion='0' WHERE idsitewom='$idsitewom'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar registros
	public function activar($idsitewom)
	{
		$sql="UPDATE sitewom SET condicion='1' WHERE idsitewom='$idsitewom'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($idsitewom)
	{
		$sql="SELECT * FROM sitewom WHERE idsitewom='$idsitewom'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT a.idsitewom,a.codigo,a.nombre,a.regional,a.torrero,a.especialista,a.auditor,a.imagen,a.imagen2,a.imagen3,a.imagen4,a.imagen5,a.condicion FROM sitewom a";
		return ejecutarConsulta($sql);		
	}

	
}

?>