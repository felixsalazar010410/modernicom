<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Consultas
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	public function comprasfecha($fecha_inicio,$fecha_fin)
	{
		$sql="SELECT DATE(i.fecha_hora) as fecha,u.nombre as usuario, p.nombre as proveedor,i.tipo_comprobante,i.serie_comprobante,i.num_comprobante,i.total_compra,i.impuesto,i.estado FROM ingreso i INNER JOIN persona p ON i.idproveedor=p.idpersona INNER JOIN usuario u ON i.idusuario=u.idusuario WHERE DATE(i.fecha_hora)>='$fecha_inicio' AND DATE(i.fecha_hora)<='$fecha_fin'";
		return ejecutarConsulta($sql);		
	}

	public function ventasfechacliente($fecha_inicio,$fecha_fin,$idcliente)
	{
		$sql="SELECT DATE(v.fecha_hora) as fecha,u.nombre as usuario, p.nombre as cliente,v.tipo_comprobante,v.serie_comprobante,v.num_comprobante,v.total_venta,v.estado FROM venta v INNER JOIN site p ON v.idsite=p.idsite INNER JOIN usuario u ON v.idusuario=u.idusuario WHERE DATE(v.fecha_hora)>='$fecha_inicio' AND DATE(v.fecha_hora)<='$fecha_fin'";
		return ejecutarConsulta($sql);
		
		

		// $sql="SELECT DATE(v.fecha_hora) as fecha,u.nombre as usuario, p.nombre as cliente,v.tipo_comprobante,v.serie_comprobante,v.num_comprobante,v.total_venta,v.estado FROM venta v INNER JOIN site p ON v.idsite=p.idsite INNER JOIN usuario u ON v.idusuario=u.idusuario WHERE DATE(v.fecha_hora)>='$fecha_inicio' AND DATE(v.fecha_hora)<='$fecha_fin' AND v.isite='$idcliente'";
		// return ejecutarConsulta($sql);	
	}

	public function totalcomprahoy()
	{
		$sql="SELECT IFNULL(SUM(total_compra),0) as total_compra FROM ingreso WHERE DATE(fecha_hora)=curdate()";
		return ejecutarConsulta($sql);
	}

	public function totalventahoy()
	{
		$sql="SELECT IFNULL(SUM(total_venta),0) as total_venta FROM venta WHERE DATE(fecha_hora)=curdate()";
		return ejecutarConsulta($sql);
	}

	public function totalsitehoy()
	{
		$sql="SELECT IFNULL(SUM(idsite),0) as total_site FROM site WHERE DATE(fecha_hora)=curdate()";
		return ejecutarConsulta($sql);
	}

	public function estado_de_proyectos()
	{
		$sql="SELECT idproyecto as sitios,SUM(nombre) as total FROM site GROUP by idproyecto ORDER BY idproyecto DESC";
		return ejecutarConsulta($sql);
	}

	public function comprasultimos_10dias()
	{
		$sql="SELECT CONCAT(DAY(fecha_hora),'-',MONTH(fecha_hora)) as fecha,SUM(total_compra) as total FROM ingreso GROUP by fecha_hora ORDER BY fecha_hora DESC limit 0,10";

		
		
		return ejecutarConsulta($sql);
	}


	public function sitesultimos_10dias()
	{
		$sql="SELECT CONCAT(idproyecto),'-',(nombre) as sitios FROM site GROUP by regional ORDER BY nombre";
		return ejecutarConsulta($sql);
	}
	public function ventasultimos_12meses()
	{
		$sql="SELECT DATE_FORMAT(fecha_hora,'%M') as fecha,SUM(total_venta) as total FROM venta GROUP by MONTH(fecha_hora) ORDER BY fecha_hora DESC limit 0,10";
		return ejecutarConsulta($sql);
	}

	public function listarwom()
	{
		$sql="SELECT a.idsite,a.idproyecto,c.nombre as proyecto,a.nombre,a.regional,a.lider_cuadrilla,b.nombre as persona,a.estado_sitio,a.descripcion,a.imagen,a.condicion FROM site a INNER JOIN proyecto c ON a.idproyecto=c.idproyecto INNER JOIN persona b ON a.lider_cuadrilla=b.idpersona WHERE a.idproyecto='5'";
		return ejecutarConsulta($sql);		
	}

	

	public function sumsran()
	{
		$sql="SELECT count(*) as total from site WHERE idproyecto='1' and condicion='1'";
		return ejecutarConsulta($sql);
	}


	public function sumsranp()
	{
		$sql="SELECT count(*) as total from site WHERE idproyecto='1' and condicion='0'";
		return ejecutarConsulta($sql);
	}
	public function sumpabis()
	{
		$sql="SELECT count(*) as total from site WHERE idproyecto='2'";
		return ejecutarConsulta($sql);
	}
	public function sum5g()
	{
		$sql="SELECT count(*) as total from site WHERE idproyecto='3'";
		return ejecutarConsulta($sql);
	}
	public function sum700()
	{
		$sql="SELECT count(*) as total from site WHERE idproyecto='4'";
		return ejecutarConsulta($sql);
	}

	public function sumwom()
	{
		$sql="SELECT count(*) as total from site WHERE idproyecto='5'";
		return ejecutarConsulta($sql);
	}
	

	public function sumescuelas()
	{
		$sql="SELECT count(*) as total from site WHERE idproyecto='6'";
		return ejecutarConsulta($sql);
	}
    //SRAN
	public function ConsultaAprobado()
	{
		$sql="SELECT count(*) as total from site WHERE idproyecto='1' and condicion='1'";
		return ejecutarConsulta($sql);
	}

	public function suma700aprobados($idsite)
	{
		$sql="SELECT count(*) as total, a.codigo,a.idsite,a.idproyecto,c.nombre as proyecto,a.nombre,a.departamento,a.documentador,b.nombre as personad ,a.direccion,a.descripcion,a.imagen,a.idusuario,a.imagen2,a.imagen3,a.imagen4,a.imagen5,a.imagen6,a.imagen7,a.imagen8,a.imagen9,a.condicion FROM site a INNER JOIN proyecto c ON a.idproyecto=c.idproyecto INNER JOIN persona b ON a.documentador=b.idpersona  WHERE a.idproyecto='2' and a.condicion='1' and b.nombre='$idsite'";
		return ejecutarConsulta($sql);
	}


	public function suma700procceso($idsite)
	{
		$sql="SELECT count(*) as total, a.codigo,a.idsite,a.idproyecto,c.nombre as proyecto,a.nombre,a.departamento,a.documentador,b.nombre as personad ,a.direccion,a.descripcion,a.imagen,a.idusuario,a.imagen2,a.imagen3,a.imagen4,a.imagen5,a.imagen6,a.imagen7,a.imagen8,a.imagen9,a.condicion FROM site a INNER JOIN proyecto c ON a.idproyecto=c.idproyecto INNER JOIN persona b ON a.documentador=b.idpersona  WHERE a.idproyecto='2' and a.condicion='0' and b.nombre='$idsite'";
		return ejecutarConsulta($sql);
	}

	



}

?>