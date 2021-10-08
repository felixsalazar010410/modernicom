<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Failure
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar($site,$equipo,$serial,$codigo,$version,$fecha_falla,$fecha_envio,$descripcion,$devolver,$imagen,$imagen2)
	{
		$sql="INSERT INTO failure (site,equipo,serial,codigo,version,fecha_falla,fecha_envio,descripcion,devolver,imagen,imagen2,condicion)

		VALUES ('$site','$equipo','$serial','$codigo','$version','$fecha_falla','$fecha_envio','$descripcion','$devolver','$imagen','$imagen2','1')";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar($idfailure,$site,$equipo,$serial,$codigo,$version,$fecha_falla,$fecha_envio,$descripcion,$devolver,$imagen,$imagen2)
	{
		$sql="UPDATE failure SET site='$site',equipo='$equipo',serial='$serial',codigo='$codigo',version='$version',fecha_falla='$fecha_falla',fecha_envio='$fecha_envio',descripcion='$descripcion',devolver='$devolver',imagen='$imagen',imagen2='$imagen2' WHERE idfailure='$idfailure'";
		return ejecutarConsulta($sql);
	}
	public function editar2($idfailure,$site,$equipo,$serial,$codigo,$version,$fecha_falla,$fecha_envio,$descripcion,$devolver,$imagen2)
	{
		$sql="UPDATE failure SET site='$site',equipo='$equipo',serial='$serial',codigo='$codigo',version='$version',fecha_falla='$fecha_falla',fecha_envio='$fecha_envio',descripcion='$descripcion',devolver='$devolver',imagen2='$imagen2' WHERE idfailure='$idfailure'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para desactivar categorías
	public function desactivar($idfailure)
	{
		$sql="UPDATE failure SET condicion='0' WHERE idfailure='$idfailure'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar categorías
	public function activar($idfailure)
	{
		$sql="UPDATE failure SET condicion='1' WHERE idfailure='$idfailure'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($idfailure)
	{
		$sql="SELECT * FROM failure WHERE idfailure='$idfailure'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT * FROM failure ORDER BY idfailure	 DESC";
		return ejecutarConsulta($sql);		
	}
	//Implementar un método para listar los registros y mostrar en el select
	public function select()
	{
		$sql="SELECT * FROM failure where condicion=1";
		return ejecutarConsulta($sql);		
	}
}

?>