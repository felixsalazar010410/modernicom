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
if ($_SESSION['almacen']==1 or $_SESSION['cliente_ofg']==1 )
{
require_once "../modelos/Radiante.php";

$radiante=new radiante();

$idradiante=isset($_POST["idradiante"])? limpiarCadena($_POST["idradiante"]):"";
$site=isset($_POST["site"])? limpiarCadena($_POST["site"]):"";
$dec_nombre=isset($_POST["dec_nombre"])? limpiarCadena($_POST["dec_nombre"]):"";
$documentador=isset($_POST["documentador"])? limpiarCadena($_POST["documentador"]):"";
$observaciones=isset($_POST["observaciones"])? limpiarCadena($_POST["observaciones"]):"";
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
			$imagen = $site."_Validacion_RRs_"."OFG_".date("d-m-Y").'.' . end($ext);
			move_uploaded_file($_FILES["imagen"]["tmp_name"], "../files/radiante/" . $imagen);
		}


		if (!file_exists($_FILES['imagen2']['tmp_name']) || !is_uploaded_file($_FILES['imagen2']['tmp_name']))
		{
			$imagen2=$_POST["imagenactual2"];
		}
		else 
		{
			$ext = explode(".", $_FILES["imagen2"]["name"]);
			$imagen2 = $site."_Reporte_Radiante_"."OFG_".date("d-m-Y").'.' . end($ext);
			move_uploaded_file($_FILES["imagen2"]["tmp_name"], "../files/radiante/" . $imagen2);
		}

		if (empty($idradiante)){
			$rspta=$radiante->insertar($site,$dec_nombre,$documentador,$observaciones,$imagen,$imagen2);
			echo $rspta ? "Radiante registrada" : "Radiante no se pudo registrar";
		}
		else {
			$rspta=$radiante->editar($idradiante,$site,$dec_nombre,$documentador,$observaciones,$imagen,$imagen2);
			echo $rspta ? "Radiante actualizada" : "Radiante no se pudo actualizar";
		}
	break;

	case 'desactivar':
		$rspta=$radiante->desactivar($idradiante);
 		echo $rspta ? "Radiante Desactivada" : "Radiante no se puede Rechazar";
	break;

	case 'activar':
		$rspta=$radiante->activar($idradiante);
 		echo $rspta ? "Radiante activada" : "Radiante no se puede Aprobar";
	break;

	case 'mostrar':
		$rspta=$radiante->mostrar($idradiante);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

	case 'listar':
		$rspta=$radiante->listar();
 		//Vamos a dec_nombrelarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>($reg->condicion)?'<button class="btn btn-warning" onclick="mostrar('.$reg->idradiante.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-danger" onclick="desactivar('.$reg->idradiante.')"><i class="fa fa-close"></i></button>':
 					'<button class="btn btn-warning" onclick="mostrar('.$reg->idradiante.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-primary" onclick="activar('.$reg->idradiante.')"><i class="fa fa-check"></i></button>',
 				"1"=>$reg->site,
 				"2"=>$reg->dec_nombre,
 				"3"=>$reg->documentador,
 				"4"=>$reg->observaciones,
				"5"=>"<a href ='../files/radiante/".$reg->imagen."' >$reg->imagen</a>",
				"6"=>"<a href ='../files/radiante/".$reg->imagen2."' >$reg->imagen2</a>",
 				"7"=>($reg->condicion)?'<span class="label bg-green">Aprobado</span>':
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