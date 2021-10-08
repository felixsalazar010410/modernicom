<?php 
ob_start();
if (strlen(session_id()) < 1){
	session_start();//Validamos si existe o no la sesión
}
if (!isset($_SESSION["nombre"]))
{
  header("Location: ../vistas/login.html");//Validamos el acceso solo a los usuarios logueados al sistema.
}
else
{
//Validamos el acceso solo al usuario logueado y autorizado.
if ($_SESSION['almacen']==1)
{	
require_once "../modelos/Detalle_venta.php";

$detalle_venta=new Detalle_venta();

$iddetalle_venta=isset($_POST["iddetalle_venta"])? limpiarCadena($_POST["iddetalle_venta"]):"";
$idventa=isset($_POST["idventa"])? limpiarCadena($_POST["idventa"]):"";
$idproyecto=isset($_POST["idproyecto"])? limpiarCadena($_POST["idproyecto"]):"";
$idsite=isset($_POST["idsite"])? limpiarCadena($_POST["idsite"]):"";
$idarticulo=isset($_POST["idarticulo"])? limpiarCadena($_POST["idarticulo"]):"";
$cantidad=isset($_POST["cantidad"])? limpiarCadena($_POST["cantidad"]):"";
$precio_venta=isset($_POST["precio_venta"])? limpiarCadena($_POST["precio_venta"]):"";
$descuento=isset($_POST["descuento"])? limpiarCadena($_POST["descuento"]):"";

switch ($_GET["op"]){

	case 'listar':
		$rspta=$detalle_venta->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
				"0"=>$reg->iddetalle_venta,
				"1"=>$reg->fecha_salida,
				"2"=>$reg->solicitante,
				"3"=>$reg->adicional,
				"4"=>$reg->fecha_solicitud,
                "5"=>$reg->project,
				"6"=>$reg->sitio,
				"7"=>$reg->elemento,
 				"8"=>$reg->cantidad,
 				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);

	break;

	case 'filtrositio':
		$idsite=$_REQUEST["idsite"];

		$rspta=$detalle_venta->filtrosite($idsite);
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
				"0"=>$reg->iddetalle_venta,
				"1"=>$reg->fecha_salida,
				"2"=>$reg->solicitante,
				"3"=>$reg->adicional,
				"4"=>$reg->fecha_solicitud,
                "5"=>$reg->project,
				"6"=>$reg->sitio,
				"7"=>$reg->elemento,
 				"8"=>$reg->cantidad,
 				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);

	break;

}
//Fin de las validaciones de acceso
}
else
{
  require 'noacceso.php';
}
}
ob_end_flush();
?>