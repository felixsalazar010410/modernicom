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
require_once "../modelos/Cronograma.php";

$cronograma=new Cronograma();

$idcronograma=isset($_POST["idcronograma"])? limpiarCadena($_POST["idcronograma"]):"";
$fecha=isset($_POST["fecha"])? limpiarCadena($_POST["fecha"]):"";
$site=isset($_POST["site"])? limpiarCadena($_POST["site"]):"";
$banda=isset($_POST["banda"])? limpiarCadena($_POST["banda"]):"";
$actividad=isset($_POST["actividad"])? limpiarCadena($_POST["actividad"]):"";
$chg=isset($_POST["chg"])? limpiarCadena($_POST["chg"]):"";
$lider=isset($_POST["lider"])? limpiarCadena($_POST["lider"]):"";
$telefono=isset($_POST["telefono"])? limpiarCadena($_POST["telefono"]):"";

switch ($_GET["op"]){
	case 'guardaryeditar':
		if (empty($idcronograma)){
			$rspta=$cronograma->insertar($fecha,$site,$banda,$actividad,$chg,$lider,$telefono);
			echo $rspta ? "Site registrada" : "Site no se pudo registrar";
		}
		else {
			$rspta=$cronograma->editar($idcronograma,$fecha,$site,$banda,$actividad,$chg,$lider,$telefono);
			echo $rspta ? "Site actualizada" : "Site no se pudo actualizar";
		}
	break;

	case 'desactivar':
		$rspta=$cronograma->desactivar($idcronograma);
 		echo $rspta ? "Site Desactivada" : "Site no se puede desactivar";
	break;

	case 'activar':
		$rspta=$cronograma->activar($idcronograma);
 		echo $rspta ? "Site activada" : "Site no se puede activar";
	break;

	case 'mostrar':
		$rspta=$cronograma->mostrar($idcronograma);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

	case 'listar':
		$rspta=$cronograma->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>$reg->fecha,
 				"1"=>$reg->site,
 				"2"=>$reg->banda,
 				"3"=>$reg->actividad,
 				"4"=>$reg->chg,
 				"5"=>$reg->lider,
 				"6"=>$reg->telefono,
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