<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Herramienta
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar($idcategoria_herramienta,$codigo,$nombre,$stock,$descripcion,$observacion,$imagen)
	{
		$sql="INSERT INTO herramienta (idcategoria_herramienta,codigo,nombre,stock,descripcion,observacion,condicion,imagen)
		VALUES ('$idcategoria_herramienta','$codigo','$nombre','$stock','$descripcion','$observacion','$imagen','1')";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar($idherramienta,$idcategoria_herramienta,$codigo,$nombre,$stock,$descripcion,$observacion,$imagen)
	{
		$sql="UPDATE herramienta SET idcategoria_herramienta='$idcategoria_herramienta',codigo='$codigo',nombre='$nombre',stock='$stock',descripcion='$descripcion',observacion='$observacion',imagen='$imagen' WHERE idherramienta='$idherramienta'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para desactivar registros
	public function desactivar($idherramienta)
	{
		$sql="UPDATE herramienta SET condicion='0' WHERE idherramienta='$idherramienta'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar registros
	public function activar($idherramienta)
	{
		$sql="UPDATE herramienta SET condicion='1' WHERE idherramienta='$idherramienta'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($idherramienta)
	{
		$sql="SELECT * FROM herramienta WHERE idherramienta='$idherramienta'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT a.idherramienta,a.idcategoria_herramienta,c.nombre as categoria_herramienta,a.codigo,a.nombre,a.stock,a.descripcion,a.observacion,a.imagen,a.condicion FROM herramienta a INNER JOIN categoria_herramienta c ON a.idcategoria_herramienta=c.idcategoria_herramienta";
		return ejecutarConsulta($sql);		
	}

	//Implementar un método para listar los registros activos
	public function listarActivos()
	{
		$sql="SELECT a.idherramienta,a.idcategoria_herramienta,c.nombre as categoria_herramienta,a.codigo,a.nombre,a.stock,a.descripcion,a.observacion,a.imagen,a.condicion FROM herramienta a INNER JOIN categoria_herramienta c ON a.idcategoria_herramienta=c.idcategoria_herramienta WHERE a.condicion='1'";
		return ejecutarConsulta($sql);		
	}

	//Implementar un método para listar los registros activos, su último precio y el stock (vamos a unir con el último registro de la tabla detalle_ingreso)
	public function listarActivossalida_herramienta()
	{
		$sql="SELECT a.idherramienta,a.idcategoria_herramienta,c.nombre as categoria_herramienta,a.codigo,a.nombre,a.stock,a.descripcion,a.observacion,a.imagen,a.condicion FROM herramienta a INNER JOIN categoria_herramienta c ON a.idcategoria_herramienta=c.idcategoria_herramienta WHERE a.condicion='1'";
		return ejecutarConsulta($sql);		
	}
}

?>