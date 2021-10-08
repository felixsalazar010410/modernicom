<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Ventaherramienta
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}
	//Implementamos un método para insertar registros
	public function insertar($idpersona,$idusuario,$tipo_comprobante,$solicitante,$fecha_solicitud,$fecha_hora,$comentario,$total_venta,$idarticulo,$cantidad,$precio_venta,$descuento)
	{
		$sql="INSERT INTO ventaherramienta(idpersona,idusuario,tipo_comprobante,solicitante,fecha_solicitud,fecha_hora,comentario,total_venta,estado)
		VALUES ('$idpersona','$idusuario','$tipo_comprobante','$solicitante','$fecha_solicitud','$fecha_hora','$comentario','$total_venta','Aceptado')";
		//return ejecutarConsulta($sql);
		$idventanew=ejecutarConsulta_retornarID($sql);

		$num_elementos=0;
		$sw=true;

		while ($num_elementos < count($idarticulo))
		{
			$sql_detalle = "INSERT INTO detalle_ventaherramienta(idventa,idarticulo,cantidad,fecha_solicitud,fecha_salida,solicitante,precio_venta,descuento) VALUES ('$idventanew','$idarticulo[$num_elementos]','$cantidad[$num_elementos]','$fecha_hora','$fecha_solicitud','$solicitante','0','0')";

			ejecutarConsulta($sql_detalle) or $sw = false;
			$num_elementos=$num_elementos + 1;
		}

		return $sw;
	}

	
	//Implementamos un método para anular la venta
	public function anular($idventa)
	{
		$sql="UPDATE ventaherramienta SET estado='Anulado' WHERE idventa='$idventa'";
		return ejecutarConsulta($sql);
	}


	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($idventa)
	{
		$sql="SELECT v.idventa,DATE(v.fecha_hora) as fecha,v.idpersona,p.nombre as persona,u.idusuario,u.nombre as usuario,v.tipo_comprobante,v.solicitante,v.fecha_solicitud,v.total_venta,v.comentario,v.estado FROM ventaherramienta v INNER JOIN persona p ON v.idpersona=p.idpersona INNER JOIN usuario u ON v.idusuario=u.idusuario WHERE v.idventa='$idventa'";
		return ejecutarConsultaSimpleFila($sql);
	}

	// public function listarDetalle($idventa)
	// {
	// 	$sql="SELECT dv.idventa,dv.idarticulo,a.nombre,dv.cantidad,dv.precio_venta,dv.descuento,(dv.cantidad*dv.precio_venta-dv.descuento) as subtotal FROM detalle_venta dv inner join articulo a on dv.idarticulo=a.idarticulo where dv.idventa='$idventa'";
	// 	return ejecutarConsulta($sql);
	// }

	public function listarDetalle($idventa)
	{
		$sql="SELECT dv.idventa,dv.idarticulo,a.nombre,dv.cantidad,dv.precio_venta,dv.descuento,(dv.cantidad*dv.precio_venta-dv.descuento) as subtotal FROM detalle_ventaherramienta dv inner join herramienta a on dv.idarticulo=a.idherramienta where dv.idventa='$idventa'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para listar los registros
	// public function listar()
	// {
	// 	$sql="SELECT v.idventa,DATE(v.fecha_hora) as fecha,v.idsite,s.nombre as cliente,u.idusuario,u.nombre as usuario,v.tipo_comprobante,v.solicitante,v.fecha_solicitud,v.proyecto,k.nombre as project,v.serie_comprobante,v.num_comprobante,v.total_venta,v.adicional,v.comentario,v.estado FROM venta v INNER JOIN persona p ON v.idsite=p.idpersona INNER JOIN usuario u ON v.idusuario=u.idusuario INNER JOIN site s ON v.idsite=s.idsite  INNER JOIN proyecto k ON v.proyecto=k.idproyecto ORDER by v.idventa desc";
	// 	return ejecutarConsulta($sql);		
	// }


	public function listar()
	{
		$sql="SELECT v.idventa,DATE(v.fecha_hora) as fecha,v.idpersona,u.idusuario,u.nombre as usuario,v.tipo_comprobante,v.solicitante,v.fecha_solicitud,v.total_venta,v.comentario,v.estado FROM ventaherramienta v INNER JOIN persona p ON v.idpersona=p.idpersona INNER JOIN usuario u ON v.idusuario=u.idusuario ORDER by v.idventa desc";
		return ejecutarConsulta($sql);		
	}

	public function ventacabecera($idventa){
		$sql="SELECT v.idventa,v.idpersona,p.nombre as person,p.direccion,p.tipo_documento,p.num_documento,p.email,p.telefono,v.idusuario,u.nombre as usuario,u.telefono as celular,u.num_documento,v.tipo_comprobante,v.solicitante,v.fecha_solicitud,date(v.fecha_hora) as fecha,v.comentario,v.total_venta FROM ventaherramienta v INNER JOIN persona p ON v.idpersona=p.idpersona INNER JOIN usuario u ON v.idusuario=u.idusuario WHERE v.idventa='$idventa'";
		return ejecutarConsulta($sql);
	}

	public function ventadetalle($idventa){
		$sql="SELECT a.nombre as articulo,a.codigo,d.cantidad,d.precio_venta,d.descuento,(d.cantidad*d.precio_venta-d.descuento) as subtotal FROM detalle_ventaherramienta d INNER JOIN herramienta a ON d.idarticulo=a.idherramienta WHERE d.idventa='$idventa'";
		return ejecutarConsulta($sql);
	}
	
}
?>