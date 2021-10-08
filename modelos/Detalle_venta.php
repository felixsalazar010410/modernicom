<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Detalle_venta
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar($idventa,$idproyecto,$idsite,$idarticulo,$cantidad,$precio_venta,$descuento)
	{
		$sql="INSERT INTO detalle_venta(idventa,idproyecto,idsite,idarticulo,cantidad,precio_venta,descuento)
		VALUES ('$idventa','$idproyecto','$idsite','$idarticulo','$cantidad','$precio_venta','$descuento')";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar($iddetalle_venta,$idventa,$idproyecto,$idsite,$idarticulo,$cantidad,$precio_venta,$descuento)
	{
		$sql="UPDATE detalle_venta SET idventa='$idventa',idproyecto='$idproyecto',idsite='$idsite',idarticulo ='$idarticulo ',cantidad='$cantidad',precio_venta='$precio_venta',descuento='$descuento' WHERE iddetalle_venta='$iddetalle_venta'";
		return ejecutarConsulta($sql);
	}


	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT a.iddetalle_venta,a.idventa,a.idproyecto,p.nombre as project,a.idarticulo,c.nombre as elemento,a.idsite,s.nombre as sitio,a.cantidad,a.adicional,a.fecha_solicitud,a.fecha_salida,a.solicitante,a.descuento FROM detalle_venta a INNER JOIN articulo c ON a.idarticulo=c.idarticulo INNER JOIN site s ON a.idsite=s.idsite INNER JOIN proyecto p ON a.idproyecto=p.idproyecto";
		return ejecutarConsulta($sql);		
	}

	public function filtrosite($idsite)
	{
		$sql="SELECT a.iddetalle_venta,a.idventa,a.idproyecto,p.nombre as project,a.idarticulo,c.nombre as elemento,a.idsite,s.nombre as sitio,a.cantidad,a.adicional,a.fecha_solicitud,a.fecha_salida,a.solicitante,a.descuento FROM detalle_venta a INNER JOIN articulo c ON a.idarticulo=c.idarticulo INNER JOIN site s ON a.idsite=s.idsite INNER JOIN proyecto p ON a.idproyecto=p.idproyecto WHERE a.idsite=$idsite";
		return ejecutarConsulta($sql);
		
		

		// $sql="SELECT DATE(v.fecha_hora) as fecha,u.nombre as usuario, p.nombre as cliente,v.tipo_comprobante,v.serie_comprobante,v.num_comprobante,v.total_venta,v.estado FROM venta v INNER JOIN site p ON v.idsite=p.idsite INNER JOIN usuario u ON v.idusuario=u.idusuario WHERE DATE(v.fecha_hora)>='$fecha_inicio' AND DATE(v.fecha_hora)<='$fecha_fin' AND v.isite='$idcliente'";
		// return ejecutarConsulta($sql);	
	}


	public function listarActivosVenta()
	{
		$sql="SELECT a.iddetalle_venta,a.idventa,c.idarticulo  as categoria,a.idsite,a.idarticulo ,a.cantidad,a.precio_venta,(SELECT precio_venta FROM detalle_ingreso WHERE iddetalle_venta=a.iddetalle_venta order by iddetalle_ingreso desc limit 0,1) as precio_venta,a.descuento,a.imagen,a.condicion FROM detalle_venta a INNER JOIN categoria c ON a.idventa=c.idventa WHERE a.condicion='1'";
		return ejecutarConsulta($sql);		
	}
}

?>