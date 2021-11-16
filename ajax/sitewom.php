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
if ($_SESSION['gsn_admin']==1)
{	
require_once "../modelos/Sitewom.php";

$sitewom=new Sitewom();

$idsitewom=isset($_POST["idsitewom"])? limpiarCadena($_POST["idsitewom"]):"";
$codigo=isset($_POST["codigo"])? limpiarCadena($_POST["codigo"]):"";
$nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
$regional=isset($_POST["regional"])? limpiarCadena($_POST["regional"]):"";
$torrero=isset($_POST["torrero"])? limpiarCadena($_POST["torrero"]):"";
$especialista=isset($_POST["especialista"])? limpiarCadena($_POST["especialista"]):"";
$auditor=isset($_POST["auditor"])? limpiarCadena($_POST["auditor"]):"";
$imagen=isset($_POST["imagen"])? limpiarCadena($_POST["imagen"]):"";
$imagen2=isset($_POST["imagen2"])? limpiarCadena($_POST["imagen2"]):"";
$imagen3=isset($_POST["imagen3"])? limpiarCadena($_POST["imagen3"]):"";
$imagen4=isset($_POST["imagen4"])? limpiarCadena($_POST["imagen4"]):"";

switch ($_GET["op"]){
	case 'guardaryeditar':
		
		
		if (!file_exists($_FILES['imagen']['tmp_name']) || !is_uploaded_file($_FILES['imagen']['tmp_name'])) {
			$imagen = $_POST["imagenactual"];
		} else {
			$ext = explode(".", $_FILES["imagen"]["name"]);
			$imagen =  $nombre . "_DCO_". date("d-m-Y") . '.' . end($ext);
			move_uploaded_file($_FILES["imagen"]["tmp_name"], "../files/dco/" . $imagen);
		}
		if (!file_exists($_FILES['imagen2']['tmp_name']) || !is_uploaded_file($_FILES['imagen2']['tmp_name'])) {
			$imagen2 = $_POST["imagenactual2"];
		} else {
			$ext = explode(".", $_FILES["imagen2"]["name"]);
			$imagen2 = $nombre . "_INVENTARIO" . "_" . date("d-m-Y") . '.' . end($ext);
			move_uploaded_file($_FILES["imagen2"]["tmp_name"], "../files/inventario/" . $imagen2);
		}
		if (!file_exists($_FILES['imagen3']['tmp_name']) || !is_uploaded_file($_FILES['imagen3']['tmp_name'])) {
			$imagen3 = $_POST["imagenactual3"];
		} else {
			$ext = explode(".", $_FILES["imagen3"]["name"]);
			$imagen3 = $nombre . "_PRE_ATP" . "_" . date("d-m-Y") . '.' . end($ext);
			move_uploaded_file($_FILES["imagen3"]["tmp_name"], "../files/preatp/" . $imagen3);
		}
		if (!file_exists($_FILES['imagen4']['tmp_name']) || !is_uploaded_file($_FILES['imagen4']['tmp_name'])) {
			$imagen4 = $_POST["imagenactual4"];
		} else {
			$ext = explode(".", $_FILES["imagen4"]["name"]);
			$imagen4 = $nombre . "_ATP" . "_" . date("d-m-Y") . '.' . end($ext);
			move_uploaded_file($_FILES["imagen4"]["tmp_name"], "../files/atp/" . $imagen4);
		}
		if (empty($idsitewom)){
			$rspta=$sitewom->insertar($codigo,$nombre,$regional,$torrero,$especialista,$auditor,$imagen,$imagen2,$imagen3,$imagen4);
			echo $rspta ? "Sitio registrado" : "Sitio no se pudo registrar";
		}
		else {
			$rspta=$sitewom->editar($idsitewom,$codigo,$nombre,$regional,$torrero,$especialista,$auditor,$imagen,$imagen2,$imagen3,$imagen4);
			echo $rspta ? "Sitio actualizado" : "Sitio no se pudo actualizar";
		}
		
	break;

	case 'desactivar':
		$rspta=$sitewom->desactivar($idsitewom);
 		echo $rspta ? "Sitio Desactivado" : "Sitio no se puede desactivar";
	break;

	case 'activar':
		$rspta=$sitewom->activar($idsitewom);
 		echo $rspta ? "Sitio activado" : "Sitio no se puede activar";
	break;

	case 'mostrar':
		$rspta=$sitewom->mostrar($idsitewom);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

	case 'listar':
		$rspta=$sitewom->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>($reg->condicion)?'<button class="btn btn-warning" onclick="mostrar('.$reg->idsitewom.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-danger" onclick="desactivar('.$reg->idsitewom.')"><i class="fa fa-close"></i></button>':
 					'<button class="btn btn-warning" onclick="mostrar('.$reg->idsitewom.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-primary" onclick="activar('.$reg->idsitewom.')"><i class="fa fa-check"></i></button>',
				"1"=>$reg->nombre,
				"2" => "<a href ='../files/dco/" . $reg->imagen . "'target='_blank'>$reg->imagen</a>",
				"3" => "<a href ='../files/inventario/" . $reg->imagen2 . "' >$reg->imagen2</a>",
				"4" => "<a href ='../files/preatp/" . $reg->imagen3 . "' >$reg->imagen3</a>",
				"5" => "<a href ='../files/atp/" . $reg->imagen4 . "' >$reg->imagen4</a>",
				"6" => ($reg->condicion) ? '<span class="label bg-green">Activado</span>' :
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