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
if ($_SESSION['almacen']==1 )
{
require_once "../modelos/Failure.php";

$failure=new failure();

$idfailure=isset($_POST["idfailure"])? limpiarCadena($_POST["idfailure"]):"";
$site=isset($_POST["site"])? limpiarCadena($_POST["site"]):"";
$equipo=isset($_POST["equipo"])? limpiarCadena($_POST["equipo"]):"";
$serial=isset($_POST["serial"])? limpiarCadena($_POST["serial"]):"";
$codigo=isset($_POST["codigo"])? limpiarCadena($_POST["codigo"]):"";
$version=isset($_POST["version"])? limpiarCadena($_POST["version"]):"";
$fecha_falla=isset($_POST["fecha_falla"])? limpiarCadena($_POST["fecha_falla"]):"";
$fecha_envio=isset($_POST["fecha_envio"])? limpiarCadena($_POST["fecha_envio"]):"";
$descripcion=isset($_POST["descripcion"])? limpiarCadena($_POST["descripcion"]):"";
$devolver=isset($_POST["devolver"])? limpiarCadena($_POST["devolver"]):"";
$imagen=isset($_POST["imagen"])? limpiarCadena($_POST["imagen"]):"";
$imagen2=isset($_POST["imagen2"])? limpiarCadena($_POST["imagen2"]):"";

switch ($_GET["op"]){
	case 'guardaryeditar':

		if (!file_exists($_FILES['imagen']['tmp_name']) || !is_uploaded_file($_FILES['imagen']['tmp_name']))
		{
			$imagen=$_POST["imagenactual"];
		}
		else 
		{
			$ext = explode(".", $_FILES["imagen"]["name"]);
			$imagen = "FAILURE REPORT_".$site."_".$equipo."_"."$serial".'.' . end($ext);
			move_uploaded_file($_FILES["imagen"]["tmp_name"], "../files/failure/" . $imagen);
		}



		if (!file_exists($_FILES['imagen2']['tmp_name']) || !is_uploaded_file($_FILES['imagen2']['tmp_name']))
		{
			$imagen2=$_POST["imagenactual2"];
		
		}
		else 
		{
			$ext = explode(".", $_FILES["imagen2"]["name"]);
			$imagen2 = "RMA_".$site."_".$equipo."_"."$serial".'.' . end($ext);
			move_uploaded_file($_FILES["imagen2"]["tmp_name"], "../files/rma/" . $imagen2);

		}

		if (empty($idfailure)){
			$rspta=$failure->insertar($$site,$equipo,$serial,$codigo,$version,$fecha_falla,$fecha_envio,$descripcion,$devolver,$imagen,$imagen2);
			echo $rspta ? "Failure Report registrado" : "Failure Report no se pudo registrar";
		}
		else {
			$rspta=$failure->editar($idfailure,$site,$equipo,$serial,$codigo,$version,$fecha_falla,$fecha_envio,$descripcion,$devolver,$imagen,$imagen2);
			echo $rspta ? "Failure Report actualizado" : "Failure Report no se pudo actualizar";
		}
	break;

	case 'desactivar':
		$rspta=$failure->desactivar($idfailure);
 		echo $rspta ? "Failure Report Desactivada" : "Failure Report no se puede desactivar";
	break;

	case 'activar':
		$rspta=$failure->activar($idfailure);
 		echo $rspta ? "Failure Report activada" : "Failure Report no se puede activar";
	break;

	case 'mostrar':
		$rspta=$failure->mostrar($idfailure);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

	case 'listar':
		$rspta=$failure->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>($reg->condicion)?'<button class="btn btn-warning" onclick="mostrar('.$reg->idfailure.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-danger" onclick="desactivar('.$reg->idfailure.')"><i class="fa fa-close"></i></button>':
 					'<button class="btn btn-warning" onclick="mostrar('.$reg->idfailure.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-primary" onclick="activar('.$reg->idfailure.')"><i class="fa fa-check"></i></button>',
 				"1"=>$reg->site,
				"2"=>"<a href ='../files/failure/".$reg->imagen."' >$reg->imagen</a>",
				"3"=>"<a href ='../files/rma/".$reg->imagen2."'target='_blank'>$reg->imagen2</a>",
 				"4"=>($reg->condicion)?'<span class="label bg-green">Activado</span>':
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
elseif ($_SESSION['cliente_ofg']==1 )
{
require_once "../modelos/Failure.php";

$failure=new failure();

$idfailure=isset($_POST["idfailure"])? limpiarCadena($_POST["idfailure"]):"";
$site=isset($_POST["site"])? limpiarCadena($_POST["site"]):"";
$equipo=isset($_POST["equipo"])? limpiarCadena($_POST["equipo"]):"";
$serial=isset($_POST["serial"])? limpiarCadena($_POST["serial"]):"";
$codigo=isset($_POST["codigo"])? limpiarCadena($_POST["codigo"]):"";
$version=isset($_POST["version"])? limpiarCadena($_POST["version"]):"";
$fecha_falla=isset($_POST["fecha_falla"])? limpiarCadena($_POST["fecha_falla"]):"";
$fecha_envio=isset($_POST["fecha_envio"])? limpiarCadena($_POST["fecha_envio"]):"";
$descripcion=isset($_POST["descripcion"])? limpiarCadena($_POST["descripcion"]):"";
$devolver=isset($_POST["devolver"])? limpiarCadena($_POST["devolver"]):"";
$imagen=isset($_POST["imagen"])? limpiarCadena($_POST["imagen"]):"";
$imagen2=isset($_POST["imagen2"])? limpiarCadena($_POST["imagen2"]):"";

switch ($_GET["op"]){
	case 'guardaryeditar':

		if (!file_exists($_FILES['imagen']['tmp_name']) || !is_uploaded_file($_FILES['imagen']['tmp_name']))
		{
			$imagen=$_POST["imagenactual"];
		}
		else 
		{
			$ext = explode(".", $_FILES["imagen"]["name"]);
			$imagen = "FAILURE REPORT_".$site."_".$equipo."_"."$serial".'.' . end($ext);
			move_uploaded_file($_FILES["imagen"]["tmp_name"], "../files/failure/" . $imagen);
		}



		if (!file_exists($_FILES['imagen2']['tmp_name']) || !is_uploaded_file($_FILES['imagen2']['tmp_name']))
		{
			$imagen2=$_POST["imagenactual2"];
		
		}
		else 
		{
			$ext = explode(".", $_FILES["imagen2"]["name"]);
			$imagen2 = "RMA_".$site."_".$equipo."_"."$serial".'.' . end($ext);
			move_uploaded_file($_FILES["imagen2"]["tmp_name"], "../files/rma/" . $imagen2);

		}

		if (empty($idfailure)){
			$rspta=$failure->insertar($$site,$equipo,$serial,$codigo,$version,$fecha_falla,$fecha_envio,$descripcion,$devolver,$imagen,$imagen2);
			echo $rspta ? "Failure Report registrado" : "Failure Report no se pudo registrar";
		}
		else {
			$rspta=$failure->editar2($idfailure,$site,$equipo,$serial,$codigo,$version,$fecha_falla,$fecha_envio,$descripcion,$devolver,$imagen2);
			echo $rspta ? "Failure Report actualizado" : "Failure Report no se pudo actualizar";
		}
	break;

	case 'desactivar':
		$rspta=$failure->desactivar($idfailure);
 		echo $rspta ? "Failure Report Desactivada" : "Failure Report no se puede desactivar";
	break;

	case 'activar':
		$rspta=$failure->activar($idfailure);
 		echo $rspta ? "Failure Report activada" : "Failure Report no se puede activar";
	break;

	case 'mostrar':
		$rspta=$failure->mostrar($idfailure);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

	case 'listar':
		$rspta=$failure->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>($reg->condicion)?'<button class="btn btn-warning" onclick="mostrar('.$reg->idfailure.')"><i class="fa fa-pencil"></i></button>':
 					'<button class="btn btn-warning" onclick="mostrar('.$reg->idfailure.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-primary" onclick="activar('.$reg->idfailure.')"><i class="fa fa-check"></i></button>',
 				"1"=>$reg->site,
				"2"=>"<a href ='../files/failure/".$reg->imagen."' >$reg->imagen</a>",
				"3"=>"<a href ='../files/rma/".$reg->imagen2."'target='_blank'>$reg->imagen2</a>",
 				"4"=>($reg->condicion)?'<span class="label bg-green">Activado</span>':
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