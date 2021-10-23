<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

 Class Site
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}
		public function insertar700($idproyecto,$codigo,$nombre,$lider_cuadrilla,$estado_campo,$actividad,$observaciones_campo,$documentador,$doc_pre,$doc_post,$observaciones_doc,$auditor,$estado_nokia,$observaciones_nokia,$imagen,$imagen2,$imagen3,$imagen4,$imagen5,$imagen6,$imagen7,$imagen8,$imagen9,$imagen10,$imagen11,$imagen12,$imagen13)
	{
		$sql="INSERT INTO site (idproyecto,codigo,nombre,lider_cuadrilla,estado_campo,actividad,observaciones_campo,documentador,doc_pre,doc_post,observaciones_doc,auditor,estado_nokia,observaciones_nokia,imagen,imagen2,imagen3,imagen4,imagen5,imagen6,imagen7,imagen8,imagen9,imagen10,imagen11,imagen12,imagen13,condicion)

		VALUES ('$idproyecto','$codigo','$nombre','$lider_cuadrilla','$estado_campo','$actividad','$observaciones_campo','$documentador','$doc_pre','$doc_post','$observaciones_doc','$auditor','$estado_nokia','$observaciones_nokia','$imagen','$imagen2','$imagen3','$imagen4','$imagen5','$imagen6','$imagen7','$imagen8','$imagen9','$imagen10','$imagen11','$imagen12','$imagen13','0')";
		return ejecutarConsulta($sql);
	}


		//Implementamos un método para editar registros
		public function editar700($idsite,$idproyecto,$codigo,$nombre,$lider_cuadrilla,$estado_campo,$actividad,$observaciones_campo,$documentador,$doc_pre,$doc_post,$observaciones_doc,$auditor,$estado_nokia,$observaciones_nokia,$imagen,$imagen2,$imagen3,$imagen4,$imagen5,$imagen6,$imagen7,$imagen8,$imagen9,$imagen10,$imagen11,$imagen12,$imagen13)
		{
			$sql="UPDATE site SET idproyecto='$idproyecto',codigo='$codigo',nombre='$nombre',lider_cuadrilla='$lider_cuadrilla',estado_campo='$estado_campo',actividad='$actividad',observaciones_campo='$observaciones_campo',documentador='$documentador',doc_pre='$doc_pre',doc_post='$doc_post',observaciones_doc='$observaciones_doc',auditor='$auditor',estado_nokia='$estado_nokia',observaciones_nokia='$observaciones_nokia',imagen='$imagen',imagen2='$imagen2',imagen3='$imagen3',imagen4='$imagen4',imagen5='$imagen5',imagen6='$imagen6',imagen7='$imagen7',imagen8='$imagen8',imagen9='$imagen9',imagen10='$imagen10',imagen11='$imagen11',imagen12='$imagen12',imagen13='$imagen13' WHERE idsite='$idsite'";
			return ejecutarConsulta($sql); 
		}


		public function insertar7002($idproyecto,$codigo,$nombre,$lider_cuadrilla,$estado_campo,$actividad,$observaciones_campo,$doc_pre,$doc_post,$observaciones_doc,$auditor,$estado_nokia,$observaciones_nokia,$imagen,$imagen2,$imagen3,$imagen4,$imagen5,$imagen6,$imagen7,$imagen8,$imagen9,$imagen10,$imagen11,$imagen12,$imagen13)
		{
			$sql="INSERT INTO site (idproyecto,codigo,nombre,lider_cuadrilla,estado_campo,actividad,observaciones_campo,doc_pre,doc_post,observaciones_doc,auditor,estado_nokia,observaciones_nokia,imagen,imagen2,imagen3,imagen4,imagen5,imagen6,imagen7,imagen8,imagen9,imagen10,imagen11,imagen12,imagen13,condicion)

		VALUES ('$idproyecto','$codigo','$nombre','$lider_cuadrilla','$estado_campo','$actividad','$observaciones_campo','$doc_pre','$doc_post','$observaciones_doc','$auditor','$estado_nokia','$observaciones_nokia','$imagen','$imagen2','$imagen3','$imagen4','$imagen5','$imagen6','$imagen7','$imagen8','$imagen9','$imagen10','$imagen11','$imagen12','$imagen13','1')";
		return ejecutarConsulta($sql);
		}
	

		public function editar7002($idsite,$doc_pre,$doc_post,$observaciones_campo,$observaciones_doc,$imagen,$imagen2,$imagen3,$imagen4,$imagen5,$imagen6,$imagen7,$imagen8,$imagen9,$imagen10,$imagen11,$imagen12,$imagen13)
		{
			$sql="UPDATE site SET doc_pre='$doc_pre',doc_post='$doc_post',observaciones_campo='$observaciones_campo',observaciones_doc='$observaciones_doc',imagen='$imagen',imagen2='$imagen2',imagen3='$imagen3',imagen4='$imagen4',imagen5='$imagen5',imagen6='$imagen6',imagen7='$imagen7',imagen8='$imagen8',imagen9='$imagen9',imagen10='$imagen10',imagen11='$imagen11',imagen12='$imagen12',imagen13='$imagen13' WHERE idsite='$idsite'";
			return ejecutarConsulta($sql); 
		}
	
	//Implementamos un método para desactivar registros
	public function desactivar($idsite)
	{
		$sql="UPDATE site SET condicion='0' WHERE idsite='$idsite'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar registros
	public function activar($idsite)
	{
		$sql="UPDATE site SET condicion='1' WHERE idsite='$idsite'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($idsite)
	{
		$sql="SELECT * FROM site WHERE idsite='$idsite'";
		return ejecutarConsultaSimpleFila($sql);
	}
	public function mostrar700($idsite)
	{
		$sql="SELECT * FROM site WHERE nombre='$idsite'";

	   return ejecutarConsultaSimpleFila($sql);
	}
 

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT a.idsite,a.idproyecto,c.nombre as proyecto,a.codigo,a.nombre,a.regional,a.direccion,a.lider_cuadrilla,a.fecha_inicio,a.documentador,b.nombre as persona,a.estado_sitio,a.descripcion,a.imagen,a.imagen2,a.imagen3,a.imagen4,a.imagen5,a.imagen6,a.condicion FROM site a INNER JOIN proyecto c ON a.idproyecto=c.idproyecto INNER JOIN persona b ON a.lider_cuadrilla=b.idpersona";
		return ejecutarConsulta($sql);		
	}


	public function listartecnico($idsite)
	{
		$sql="SELECT a.idsite,a.idproyecto,c.nombre as proyecto,a.codigo,a.nombre,a.regional,a.direccion,a.lider_cuadrilla,a.fecha_inicio,a.documentador,a.estado_sitio,a.descripcion,a.estado1,a.correcion1,a.comentario1,a.imagen,a.imagen2,a.condicion FROM site a INNER JOIN proyecto c ON a.idproyecto=c.idproyecto WHERE a.lider_cuadrilla='$idsite'";
		return ejecutarConsulta($sql);		
	}

	public function listarDocumentador($idsite)
	{
		$sql="SELECT a.idsite,a.idproyecto,c.nombre as proyecto,a.codigo,a.nombre,a.lider_cuadrilla,a.fecha_inicio,a.documentador,a.estado_sitio,a.descripcion,a.correcion1,a.comentario1,a.imagen,a.imagen2,a.condicion FROM site a INNER JOIN proyecto c ON a.idproyecto=c.idproyecto WHERE a.documentador='$idsite'";
		return ejecutarConsulta($sql);	
		

	}



	
	public function listarhw($idsite)
	{
		$sql="SELECT a.idwomhw,a.idsite,c.nombre as site,a.documento,a.num_documento,a.idcapex,d.nombre as capex,a.codigo,d.codigo as capexx, a.elemento,a.imagen,a.condicion FROM womhw a INNER JOIN site c ON a.idsite=c.idsite INNER JOIN capex d ON a.idcapex=d.idcapex WHERE a.idsite='$idsite'";

		return ejecutarConsulta($sql);	
	}

	public function listarsite($idsite)
	{
		$sql="SELECT a.idsite,a.idproyecto,c.nombre as proyecto,a.nombre,a.regional,a.direccion,a.lider_cuadrilla,a.estado_sitio,a.descripcion,a.imagen,a.imagen2,a.condicion FROM site a INNER JOIN proyecto c ON a.idproyecto=c.idproyecto WHERE a.nombre='$idsite'";
		return ejecutarConsulta($sql);	

	}


	public function listar700()
	{
	
		$sql="SELECT a.codigo,a.idsite,a.idproyecto,c.cliente as cliente, c.nombre as proyecto,a.nombre,a.lider_cuadrilla,p.nombre as supervisor,a.observaciones_campo,a.documentador,b.nombre as doc,a.observaciones_doc,a.auditor,a.estado_nokia,a.imagen,a.idusuario,a.imagen2,a.imagen3,a.imagen4,a.imagen5,a.imagen6,a.imagen7,a.imagen8,a.imagen9,a.imagen10,a.imagen11,a.imagen12,a.imagen13,a.condicion FROM site a INNER JOIN proyecto c ON a.idproyecto=c.idproyecto INNER JOIN persona b ON a.documentador=b.idpersona  INNER JOIN persona p ON a.lider_cuadrilla=p.idpersona where cliente='OFG' ORDER BY idsite DESC";

		return ejecutarConsulta($sql);		
	}

	public function listar700syf()
	{
	
		$sql="SELECT a.codigo,a.idsite,a.idproyecto,c.cliente as cliente, c.nombre as proyecto,a.nombre,a.lider_cuadrilla,p.nombre as supervisor,a.observaciones_campo,a.documentador,b.nombre as doc,a.observaciones_doc,a.auditor,a.estado_nokia,a.imagen,a.idusuario,a.imagen2,a.imagen3,a.imagen4,a.imagen5,a.imagen6,a.imagen7,a.imagen8,a.imagen9,a.imagen10,a.imagen11,a.imagen12,a.imagen13,a.condicion FROM site a INNER JOIN proyecto c ON a.idproyecto=c.idproyecto INNER JOIN persona b ON a.documentador=b.idpersona  INNER JOIN persona p ON a.lider_cuadrilla=p.idpersona where cliente='SYF' ORDER BY idsite DESC";

		return ejecutarConsulta($sql);		
	}

	public function listar700syfDominion()
	{
	
		$sql="SELECT a.codigo,a.idsite,a.idproyecto,c.cliente as cliente, c.nombre as proyecto,a.nombre,a.lider_cuadrilla,p.nombre as supervisor,a.observaciones_campo,a.documentador,b.nombre as doc,a.observaciones_doc,a.auditor,a.estado_nokia,a.imagen,a.idusuario,a.imagen2,a.imagen3,a.imagen4,a.imagen5,a.imagen6,a.imagen7,a.imagen8,a.imagen9,a.imagen10,a.imagen11,a.imagen12,a.imagen13,a.condicion FROM site a INNER JOIN proyecto c ON a.idproyecto=c.idproyecto INNER JOIN persona b ON a.documentador=b.idpersona  INNER JOIN persona p ON a.lider_cuadrilla=p.idpersona where cliente='SYF' AND operador='CLARO'  ORDER BY idsite DESC";

		return ejecutarConsulta($sql);		
	}

	public function listar2600()
	{
	
		$sql="SELECT a.codigo,a.idsite,a.idproyecto,c.nombre as proyecto,a.nombre,a.lider_cuadrilla,p.nombre as supervisor,a.documentador,b.nombre as doc,a.observaciones_doc,a.imagen,a.idusuario,a.imagen2,a.imagen3,a.imagen4,a.imagen5,a.imagen6,a.imagen7,a.imagen8,a.imagen9,a.imagen10,a.imagen11,a.imagen12,a.imagen13,a.condicion FROM site a INNER JOIN proyecto c ON a.idproyecto=c.idproyecto INNER JOIN persona b ON a.documentador=b.idpersona  INNER JOIN persona p ON a.lider_cuadrilla=p.idpersona WHERE a.idproyecto='3' ORDER BY idsite DESC";

		return ejecutarConsulta($sql);		
	}


	

	public function listar700documentador($idsite)

	{
	
		$sql="SELECT a.codigo,a.idsite,a.idproyecto,c.cliente as cliente,c.nombre as proyecto,a.nombre,a.lider_cuadrilla,p.nombre as supervisor,a.documentador,b.nombre as personad,a.observaciones_campo,a.observaciones_doc,a.imagen,a.idusuario,a.imagen2,a.imagen3,a.imagen4,a.imagen5,a.imagen6,a.imagen7,a.imagen8,a.imagen9,a.imagen10,a.imagen11,a.imagen12,a.imagen13,a.condicion FROM site a INNER JOIN proyecto c ON a.idproyecto=c.idproyecto INNER JOIN persona b ON a.documentador=b.idpersona INNER JOIN persona p ON a.lider_cuadrilla=p.idpersona WHERE cliente='SERVITEL' OR b.nombre='$idsite' OR p.nombre='$idsite'  ORDER BY idsite DESC";

		return ejecutarConsulta($sql);		
	}

	public function listar2600documentador($idsite)

	{
	
		$sql="SELECT a.codigo,a.idsite,a.idproyecto,c.nombre as proyecto,a.nombre,a.lider_cuadrilla,p.nombre as supervisor,a.documentador,b.nombre as personad,a.observaciones_doc,a.imagen,a.idusuario,a.imagen2,a.imagen3,a.imagen4,a.imagen5,a.imagen6,a.imagen7,a.imagen8,a.imagen9,a.imagen10,a.imagen11,a.imagen12,a.imagen13,a.condicion FROM site a INNER JOIN proyecto c ON a.idproyecto=c.idproyecto INNER JOIN persona b ON a.documentador=b.idpersona INNER JOIN persona p ON a.lider_cuadrilla=p.idpersona WHERE a.idproyecto='3'and b.nombre='$idsite' OR p.nombre='$idsite' ORDER BY idsite DESC";

		return ejecutarConsulta($sql);		
	}

	
	public function listar700documentadorultratel($idsite)

	{
	
		$sql="SELECT a.codigo,a.idsite,a.idproyecto,c.nombre as proyecto,a.nombre,a.lider_cuadrilla,p.nombre as supervisor,a.documentador,b.nombre as personad,a.observaciones_doc,a.imagen,a.idusuario,a.imagen2,a.imagen3,a.imagen4,a.imagen5,a.imagen6,a.imagen7,a.imagen8,a.imagen9,a.imagen10,a.imagen11,a.imagen12,a.imagen13,a.condicion FROM site a INNER JOIN proyecto c ON a.idproyecto=c.idproyecto INNER JOIN persona b ON a.documentador=b.idpersona INNER JOIN persona p ON a.lider_cuadrilla=p.idpersona WHERE a.idproyecto='4'and b.nombre='$idsite' ORDER BY idsite DESC";

		return ejecutarConsulta($sql);		
	}

	public function listar700documentadorsyf($idsite)

	{
	
		$sql="SELECT a.codigo,a.idsite,a.idproyecto,c.nombre as proyecto,a.nombre,a.lider_cuadrilla,p.nombre as supervisor,a.documentador,b.nombre as personad,a.observaciones_doc,a.imagen,a.idusuario,a.imagen2,a.imagen3,a.imagen4,a.imagen5,a.imagen6,a.imagen7,a.imagen8,a.imagen9,a.imagen10,a.imagen11,a.imagen12,a.imagen13,a.condicion FROM site a INNER JOIN proyecto c ON a.idproyecto=c.idproyecto INNER JOIN persona b ON a.documentador=b.idpersona INNER JOIN persona p ON a.lider_cuadrilla=p.idpersona WHERE a.idproyecto='4'and b.nombre='$idsite' ORDER BY idsite DESC";

		return ejecutarConsulta($sql);		
	}


	public function selectsite()
	{
		$sql="SELECT * FROM site";
		return ejecutarConsulta($sql);		
	}

	public function select($idproyecto)
	{
		$sql="SELECT * FROM site where idproyecto='$idproyecto' and condicion=1";
		return ejecutarConsulta($sql);		
	}

	public function selectt()
	{
		$sql="SELECT * FROM site where idproyecto='1'";
		return ejecutarConsulta($sql);		
	}

	public function selectt2()
	{
		$sql="SELECT * FROM site where idproyecto='2'";
		return ejecutarConsulta($sql);		
	}


	

	


	

	
}

?>