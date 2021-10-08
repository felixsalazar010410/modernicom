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
require_once "../modelos/Proyecto.php";

$proyecto=new Proyecto();

$idproyecto=isset($_POST["idproyecto"])? limpiarCadena($_POST["idproyecto"]):"";
$operador=isset($_POST["operador"])? limpiarCadena($_POST["operador"]):"";
$cliente=isset($_POST["cliente"])? limpiarCadena($_POST["cliente"]):"";
$nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
$descripcion=isset($_POST["descripcion"])? limpiarCadena($_POST["descripcion"]):"";

switch ($_GET["op"]){
	case 'guardaryeditar':
		if (empty($idproyecto)){
			$rspta=$proyecto->insertar($operador,$cliente,$nombre,$descripcion);
			echo $rspta ? "Categoría registrada" : "Categoría no se pudo registrar";
		}
		else {
			$rspta=$proyecto->editar($idproyecto,$operador,$cliente,$nombre,$descripcion);
			echo $rspta ? "Categoría actualizada" : "Categoría no se pudo actualizar";
		}
	break;

	case 'desactivar':
		$rspta=$proyecto->desactivar($idproyecto);
 		echo $rspta ? "Categoría Desactivada" : "Categoría no se puede desactivar";
	break;

	case 'activar':
		$rspta=$proyecto->activar($idproyecto);
 		echo $rspta ? "Categoría activada" : "Categoría no se puede activar";
	break;

	case 'mostrar':
		$rspta=$proyecto->mostrar($idproyecto);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

	case 'listar':
		$rspta=$proyecto->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>($reg->condicion)?'<button class="btn btn-warning" onclick="mostrar('.$reg->idproyecto.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-danger" onclick="desactivar('.$reg->idproyecto.')"><i class="fa fa-close"></i></button>':
 					'<button class="btn btn-warning" onclick="mostrar('.$reg->idproyecto.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-primary" onclick="activar('.$reg->idproyecto.')"><i class="fa fa-check"></i></button>',
 				"1"=>$reg->operador,
 				"2"=>$reg->cliente,
 				"3"=>$reg->nombre,
 				"4"=>$reg->descripcion,
 				"5"=>($reg->condicion)?'<span class="label bg-green">Activado</span>':
 				'<span class="label bg-red">Desactivado</span>'
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