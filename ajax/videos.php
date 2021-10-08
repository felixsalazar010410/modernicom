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
require_once "../modelos/Videos.php";

$videos=new videos();

$idvideos=isset($_POST["idvideos"])? limpiarCadena($_POST["idvideos"]):"";
$site=isset($_POST["site"])? limpiarCadena($_POST["site"]):"";
$dec_nombre=isset($_POST["dec_nombre"])? limpiarCadena($_POST["dec_nombre"]):"";
$observaciones=isset($_POST["observaciones"])? limpiarCadena($_POST["observaciones"]):"";
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
			$imagen = "0600_TI_Videos_".$site."_".date("d-m-Y").'.' . end($ext);
			move_uploaded_file($_FILES["imagen"]["tmp_name"], "../files/videos/" . $imagen);
		}

		if (empty($idvideos)){
			$rspta=$videos->insertar($site,$dec_nombre,$observaciones,$imagen);
			echo $rspta ? "Video registrada" : "Video no se pudo registrar";
		}
		else {
			$rspta=$videos->editar($idvideos,$site,$dec_nombre,$observaciones,$imagen);
			echo $rspta ? "Video actualizada" : "Video no se pudo actualizar";
		}
	break;

	case 'desactivar':
		$rspta=$videos->desactivar($idvideos);
 		echo $rspta ? "Video Desactivada" : "Video no se puede Rechazar";
	break;

	case 'activar':
		$rspta=$videos->activar($idvideos);
 		echo $rspta ? "Video activada" : "Video no se puede Aprobar";
	break;

	case 'mostrar':
		$rspta=$videos->mostrar($idvideos);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

	case 'listar':
		$rspta=$videos->listar();
 		//Vamos a dec_nombrelarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>($reg->condicion)?'<button class="btn btn-warning" onclick="mostrar('.$reg->idvideos.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-danger" onclick="desactivar('.$reg->idvideos.')"><i class="fa fa-close"></i></button>':
 					'<button class="btn btn-warning" onclick="mostrar('.$reg->idvideos.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-primary" onclick="activar('.$reg->idvideos.')"><i class="fa fa-check"></i></button>',
 				"1"=>$reg->site,
 				"2"=>$reg->dec_nombre,
 				"3"=>$reg->observaciones,
				"4"=>"<a href ='../files/videos/".$reg->imagen."' >$reg->imagen</a>",
 				"5"=>($reg->condicion)?'<span class="label bg-green">Aprobado</span>':
 				'<span class="label bg-red">Pendiente</span>'
 				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);

	break;

	case "selectsite":
		require_once "../modelos/Site.php";
		$site = new Site();

		$rspta = $site->selectsite();

		while ($reg = $rspta->fetch_object())
				{
					echo '<option value=' . $reg->site . '>' . $reg->nombre . '</option>';
				}
	break;
}
//Fin de las validaciones de acceso
}
else if($_SESSION['cliente_ofg']==1)
{
require_once "../modelos/Videos.php";

$videos=new videos();

$idvideos=isset($_POST["idvideos"])? limpiarCadena($_POST["idvideos"]):"";
$site=isset($_POST["site"])? limpiarCadena($_POST["site"]):"";
$dec_nombre=isset($_POST["dec_nombre"])? limpiarCadena($_POST["dec_nombre"]):"";
$observaciones=isset($_POST["observaciones"])? limpiarCadena($_POST["observaciones"]):"";
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
			$imagen = "0600_TI_Videos"."_".date("d-m-Y").'.' . end($ext);
			move_uploaded_file($_FILES["imagen"]["tmp_name"], "../files/videos/" . $imagen);
		}

		if (empty($videos)){
			$rspta=$videos->insertar($site,$dec_nombre,$observaciones,$imagen);
			echo $rspta ? "Video registrada" : "Video no se pudo registrar";
		}
		else {
			$rspta=$videos->editar($idvideos,$site,$dec_nombre,$observaciones,$imagen);
			echo $rspta ? "Video actualizada" : "Video no se pudo actualizar";
		}
	break;

	case 'desactivar':
		$rspta=$videos->desactivar($videos);
 		echo $rspta ? "Video Desactivada" : "Video no se puede Rechar";
	break;

	case 'activar':
		$rspta=$videos->activar($videos);
 		echo $rspta ? "Video activada" : "Video no se puede Aprobar";
	break;

	case 'mostrar':
		$rspta=$videos->mostrar($idvideos);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

	case 'listar':
		$rspta=$videos->listar();
 		//Vamos a dec_nombrelarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>$reg->site,
 				"1"=>$reg->dec_nombre,
 				"2"=>$reg->observaciones,
				"3"=>"<a href ='../files/videos/".$reg->imagen."' >$reg->imagen</a>",
 				"4"=>($reg->condicion)?'<span class="label bg-green">Aprobado</span>':
 				'<span class="label bg-red">Pendiente</span>'
 				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);

	break;

	case "selectsite":
		require_once "../modelos/Site.php";
		$site = new Site();

		$rspta = $site->selectsite();

		while ($reg = $rspta->fetch_object())
				{
					echo '<option value=' . $reg->site . '>' . $reg->nombre . '</option>';
				}
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