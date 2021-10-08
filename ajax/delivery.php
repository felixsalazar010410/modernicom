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
if ($_SESSION['admin']==1)
{
require_once "../modelos/Delivery.php";

$delivery=new Delivery();

$iddelivery=isset($_POST["iddelivery"])? limpiarCadena($_POST["iddelivery"]):"";
$sitename=isset($_POST["sitename"])? limpiarCadena($_POST["sitename"]):"";
$codigo=isset($_POST["codigo"])? limpiarCadena($_POST["codigo"]):"";
$proceso=isset($_POST["proceso"])? limpiarCadena($_POST["proceso"]):"";
$smp=isset($_POST["smp"])? limpiarCadena($_POST["smp"]):"";
$smr=isset($_POST["smr"])? limpiarCadena($_POST["smr"]):"";
$el_delivery=isset($_POST["el_delivery"])? limpiarCadena($_POST["el_delivery"]):"";
$el_inventario=isset($_POST["el_inventario"])? limpiarCadena($_POST["el_inventario"]):"";
$estado=isset($_POST["estado"])? limpiarCadena($_POST["estado"]):"";
$equipo=isset($_POST["equipo"])? limpiarCadena($_POST["equipo"]):"";
$cantidad=isset($_POST["cantidad"])? limpiarCadena($_POST["cantidad"]):"";
$imagen=isset($_POST["imagen"])? limpiarCadena($_POST["imagen"]):"";

switch ($_GET["op"]){
	case 'guardaryeditar':

		if (!file_exists($_FILES['imagen']['tmp_name']) || !is_uploaded_file($_FILES['imagen']['tmp_name']))
		{
			$imagen=$_POST["imagenactual"];
		}
		else 
		{
			$ext = explode(".", $_FILES["imagen"]["name"]);
			$imagen = $sitename."_".$iddelivery.$codigo."_PACKING_LIST"."_".date("d-m-Y").'.' . end($ext);
			move_uploaded_file($_FILES["imagen"]["tmp_name"], "../files/delivery_700/" . $imagen);
		}
		
		if (empty($iddelivery)){
			$rspta=$delivery->insertar($sitename,$codigo,$proceso,$smp,$smr,$el_delivery,$el_inventario,$estado,$equipo,$cantidad,$imagen);
			echo $rspta ? "Packing list registrado" : "Packing list no se pudo registrar";
		}
		else {
			$rspta=$delivery->editar($iddelivery,$sitename,$codigo,$proceso,$smp,$smr,$el_delivery,$el_inventario,$estado,$equipo,$cantidad,$imagen);
			echo $rspta ? "Packing list actualizado" : "Packing list no se pudo actualizar";
		}
	break;

	case 'desactivar':
		$rspta=$delivery->desactivar($iddelivery);
 		echo $rspta ? "Packing List Rechazado" : "Packing List no se puede Rechazar";
	break;

	case 'activar':
		$rspta=$delivery->activar($iddelivery);
 		echo $rspta ? "Packing List Aprobado" : "Packing List no se puede Aprobar";
	break;

	case 'mostrar':
		$rspta=$delivery->mostrar($iddelivery);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

	case 'listar':
		$rspta=$delivery->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>($reg->condicion)?'<button class="btn btn-warning" onclick="mostrar('.$reg->iddelivery.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-danger" onclick="desactivar('.$reg->iddelivery.')"><i class="fa fa-close"></i></button>':
 					'<button class="btn btn-warning" onclick="mostrar('.$reg->iddelivery.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-primary" onclick="activar('.$reg->iddelivery.')"><i class="fa fa-check"></i></button>',
 				"1"=>$reg->sitename,
 				"2"=>$reg->proceso,
 				"3"=>$reg->smp,
 				"4"=>$reg->smr,
 				"5"=>$reg->el_delivery,
 				"6"=>$reg->equipo,
				"7"=>"<a href ='../files/delivery_700/".$reg->imagen."' >$reg->imagen</a>",
 				"8"=>($reg->condicion)?'<span class="label bg-green">OK</span>':
 				'<span class="label bg-red">INCOMPLETO</span>'
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
elseif ($_SESSION['cliente_ofg']==1)
{
require_once "../modelos/Delivery.php";

$delivery=new Delivery();

$iddelivery=isset($_POST["iddelivery"])? limpiarCadena($_POST["iddelivery"]):"";
$sitename=isset($_POST["sitename"])? limpiarCadena($_POST["sitename"]):"";
$codigo=isset($_POST["codigo"])? limpiarCadena($_POST["codigo"]):"";
$proceso=isset($_POST["proceso"])? limpiarCadena($_POST["proceso"]):"";
$smp=isset($_POST["smp"])? limpiarCadena($_POST["smp"]):"";
$smr=isset($_POST["smr"])? limpiarCadena($_POST["smr"]):"";
$el_delivery=isset($_POST["el_delivery"])? limpiarCadena($_POST["el_delivery"]):"";
$el_inventario=isset($_POST["el_inventario"])? limpiarCadena($_POST["el_inventario"]):"";
$estado=isset($_POST["estado"])? limpiarCadena($_POST["estado"]):"";
$equipo=isset($_POST["equipo"])? limpiarCadena($_POST["equipo"]):"";
$cantidad=isset($_POST["cantidad"])? limpiarCadena($_POST["cantidad"]):"";
$imagen=isset($_POST["imagen"])? limpiarCadena($_POST["imagen"]):"";

switch ($_GET["op"]){
	case 'guardaryeditar':

		if (!file_exists($_FILES['imagen']['tmp_name']) || !is_uploaded_file($_FILES['imagen']['tmp_name']))
		{
			$imagen=$_POST["imagenactual"];
		}
		else 
		{
			$ext = explode(".", $_FILES["imagen"]["name"]);
			$imagen = $sitename."_".$codigo."_PACKING_LIST"."_".date("d-m-Y").'.' . end($ext);
			move_uploaded_file($_FILES["imagen"]["tmp_name"], "../files/delivery_700/" . $imagen);
		}
		
		if (empty($iddelivery)){
			$rspta=$delivery->insertar($sitename,$codigo,$proceso,$smp,$smr,$el_delivery,$el_inventario,$estado,$equipo,$cantidad,$imagen);
			echo $rspta ? "Packing List registrada" : "Packing List no se pudo registrar";
		}
		else {
			$rspta=$delivery->editar2($iddelivery,$imagen);
			echo $rspta ? "Packing List actualizada" : "Packing List no se pudo actualizar";
		}
	break;

	case 'desactivar':
		$rspta=$delivery->desactivar($iddelivery);
 		echo $rspta ? "Packing List Desactivado" : "Packing List no se puede desactivar";
	break;

	case 'activar':
		$rspta=$delivery->activar($iddelivery);
 		echo $rspta ? "Packing List activado" : "Packing List no se puede activar";
	break;

	case 'mostrar':
		$rspta=$delivery->mostrar($iddelivery);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

	case 'listar':
		$rspta=$delivery->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>($reg->condicion)?'<button class="btn btn-warning" onclick="mostrar('.$reg->iddelivery.')"><i class="fa fa-pencil"></i></button>':
 					'<button class="btn btn-warning" onclick="mostrar('.$reg->iddelivery.')"><i class="fa fa-pencil"></i></button>',
 				"1"=>$reg->sitename,
 				"2"=>$reg->proceso,
 				"3"=>$reg->smp,
 				"4"=>$reg->smr,
 				"5"=>$reg->el_delivery,
 				"6"=>$reg->el_inventario,
 				"7"=>$reg->estado,
 				"8"=>$reg->equipo,
 				"9"=>$reg->cantidad,
				"10"=>"<a href ='../files/delivery_700/".$reg->imagen."'target='_blank'>$reg->imagen</a>",
 				"11"=>($reg->condicion)?'<span class="label bg-green">Aprobado</span>':
 				'<span class="label bg-red">Rechazado</span>'
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