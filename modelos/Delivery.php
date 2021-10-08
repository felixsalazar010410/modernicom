<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Delivery
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar($sitename,$codigo,$proceso,$smp,$smr,$el_delivery,$el_inventario,$estado,$equipo,$cantidad,$imagen)
	{
		$sql="INSERT INTO delivery(sitename,codigo,proceso,smp,smr,el_delivery,el_inventario,estado,equipo,cantidad,imagen,condicion)
		VALUES ('$sitename','$codigo','$proceso','$smp','$smr','$el_delivery','$el_inventario','$estado','$equipo','$cantidad','$imagen','1')";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar($iddelivery,$sitename,$codigo,$proceso,$smp,$smr,$el_delivery,$el_inventario,$estado,$equipo,$cantidad,$imagen)
	{
		$sql="UPDATE delivery SET sitename='$sitename',codigo='$codigo',proceso='$proceso',smp='$smp',smr='$smr',el_delivery='$el_delivery',el_inventario='$el_inventario',estado='$estado',equipo='$equipo',cantidad='$cantidad',imagen='$imagen' WHERE iddelivery='$iddelivery'";
		return ejecutarConsulta($sql);
	}
	public function editar2($iddelivery,$imagen)
	{
		$sql="UPDATE delivery SET imagen='$imagen' WHERE iddelivery='$iddelivery'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para desactivar categorías
	public function desactivar($iddelivery)
	{
		$sql="UPDATE delivery SET condicion='0' WHERE iddelivery='$iddelivery'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar categorías
	public function activar($iddelivery)
	{
		$sql="UPDATE delivery SET condicion='1' WHERE iddelivery='$iddelivery'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($iddelivery)
	{
		$sql="SELECT * FROM delivery WHERE iddelivery='$iddelivery'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT * FROM delivery ORDER BY iddelivery DESC";
		return ejecutarConsulta($sql);		
	}
	//Implementar un método para listar los registros y mostrar en el select
	public function select()
	{
		$sql="SELECT * FROM delivery where condicion=1";
		return ejecutarConsulta($sql);		
	}
}

?>