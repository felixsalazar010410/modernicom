<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Womhw
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar($idsite,$idsite2,$documento,$num_documento,$indicador,$idcapex,$codigo,$elemento,$serial,$estado,$despachado,$instalado,$bodega,$movido,$devuelto,$ubicacion,$sitiofinal,$observacion,$imagen,$imagen2)
	{
		$sql="INSERT INTO womhw (idsite,idsite2,documento,num_documento,indicador,idcapex,codigo,elemento,serial,estado,ubicacion,sitiofinal,observacion,imagen,imagen2,condicion)
		VALUES ('$idsite','$idsite2','$documento','$num_documento','$indicador','$idcapex','$codigo','$elemento','$serial','$estado','$despachado','$instalado','$bodega','$movido','$devuelto','$ubicacion','$sitiofinal','$observacion','$imagen','$imagen2','1')";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar($idwomhw,$idsite,$idsite2,$documento,$num_documento,$indicador,$idcapex,$codigo,$elemento,$serial,$estado,$despachado,$instalado,$bodega,$movido,$devuelto,$ubicacion,$sitiofinal,$observacion,$imagen,$imagen2)
	{
		$sql="UPDATE womhw SET idsite='$idsite',idsite2='$idsite2',documento='$documento',num_documento='$num_documento',indicador='$indicador',idcapex='$idcapex',codigo='$codigo',elemento='$elemento',serial='$serial',estado='$estado',despachado='$despachado',instalado='$instalado',bodega='$bodega',movido='$movido',devuelto='$devuelto',ubicacion='$ubicacion',sitiofinal='$sitiofinal',observacion='$observacion',imagen='$imagen',imagen2='$imagen2' WHERE idwomhw='$idwomhw'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para desactivar registros
	public function desactivar($idwomhw)
	{
		$sql="UPDATE womhw SET condicion='0' WHERE idwomhw='$idwomhw'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar registros
	public function activar($idwomhw)
	{
		$sql="UPDATE womhw SET condicion='1' WHERE idwomhw='$idwomhw'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($idwomhw)
	{
		$sql="SELECT * FROM womhw WHERE idwomhw='$idwomhw'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT a.idwomhw,a.idsite,c.nombre as site,a.documento,a.num_documento,a.indicador,a.idcapex,d.nombre as capex,a.elemento,a.serial,a.codigo,d.codigo as capexx, a.elemento,a.serial,a.estado,a.ubicacion,a.sitiofinal,c.nombre as site2,a.imagen,a.imagen2,a.condicion FROM womhw a INNER JOIN site c ON a.idsite=c.idsite INNER JOIN capex d ON a.idcapex=d.idcapex  ORDER BY a.idsite DESC";

		return ejecutarConsulta($sql);		
	}


	// public function listar2()
	// {
	// 	$sql="SELECT a.idwomhw,a.idsite,c.nombre as site,a.documento,a.num_documento,a.indicador,a.idcapex,d.nombre as capex,a.elemento,a.serial,a.codigo,d.codigo as capexx, a.elemento,a.serial,a.estado,a.ubicacion,a.sitiofinal,c.nombre as site2,a.imagen,a.condicion FROM womhw a INNER JOIN site c ON a.idsite=c.idsite INNER JOIN capex d ON a.idcapex=d.idcapex Where documento='SMR' or documento='LSM'";

	// 	return ejecutarConsulta($sql);		
	// }

	public function listar2()
	{
		$sql="SELECT a.idwomhw,a.idsite,c.nombre as site,a.documento,a.num_documento,a.indicador,a.serial,a.codigo,a.elemento,a.serial,a.estado,a.despachado,a.instalado,a.bodega,a.movido,a.devuelto,a.ubicacion,a.sitiofinal,c.nombre as site2,a.imagen,a.imagen2,a.condicion FROM womhw a INNER JOIN site c ON a.idsite=c.idsite  Where documento='SMR' or documento='LSM' ORDER BY a.idsite DESC";

		return ejecutarConsulta($sql);		
	}

	public function listard()
	{
		$sql="SELECT a.idwomhw,a.idsite,c.nombre as site,a.documento,a.num_documento,a.idcapex,d.nombre as capex,a.codigo,d.codigo as capexx, a.elemento,a.imagen,a.imagen2,a.condicion FROM womhw a INNER JOIN site c ON a.idsite=c.idsite INNER JOIN capex d ON a.idcapex=d.idcapex ORDER BY a.idsite DESC";

		return ejecutarConsulta($sql);		
	}


	// public function listarhw($idsite)
	// {
	// 	$sql="SELECT a.idwomhw,a.idsite,c.nombre as site,a.documento,a.num_documento,a.indicador,a.idcapex,d.nombre as capex,a.codigo,d.codigo as capexx, a.elemento,a.serial,a.estado,a.ubicacion,a.observacion,a.sitiofinal,c.nombre as site2,a.imagen,a.condicion FROM womhw a INNER JOIN site c ON a.idsite=c.idsite INNER JOIN capex d ON a.idcapex=d.idcapex WHERE c.nombre='$idsite'";

	// 	return ejecutarConsulta($sql);	
	// }


	public function listarhw($idsite)
	{
		$sql="SELECT a.idwomhw,a.idsite,c.nombre as site,a.documento,a.num_documento,a.indicador,a.idcapex, a.codigo,a.elemento,a.serial,a.estado,a.ubicacion,a.observacion,a.sitiofinal,c.nombre as site2,a.imagen,a.imagen2,a.condicion FROM womhw a INNER JOIN site c ON a.idsite=c.idsite  WHERE c.nombre='$idsite' ORDER BY a.idsite DESC";

		return ejecutarConsulta($sql);	
	}
	public function filtrosite($idsite)
	{
		//  $sql="SELECT a.idwomhw,a.idsite,c.nombre as site,a.documento,a.num_documento,a.indicador,a.idcapex,a.elemento,a.serial as capexx, a.elemento,a.serial,a.estado,a.ubicacion,a.sitiofinal,c.nombre as site2,a.imagen,a.imagen2,a.condicion FROM womhw a INNER JOIN site c ON a.idsite=c.idsite WHERE a.idsite='$idsite'";


	$sql="SELECT a.idwomhw,a.idsite,c.nombre as site,a.documento,a.num_documento,a.indicador,a.serial,a.codigo,a.elemento,a.serial,a.estado,a.despachado,a.instalado,a.bodega,a.movido,a.devuelto,a.ubicacion,a.sitiofinal,c.nombre as site2,a.imagen,a.imagen2,a.condicion FROM womhw a INNER JOIN site c ON a.idsite=c.idsite  Where a.idsite='$idsite' ORDER BY a.idsite DESC";


		return ejecutarConsulta($sql);
	}
	
	
}

?>