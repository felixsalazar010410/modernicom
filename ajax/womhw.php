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
require_once "../modelos/Womhw.php";

$womhw = new Womhw();

$idwomhw=isset($_POST["idwomhw"])? limpiarCadena($_POST["idwomhw"]):"";
$idsite=isset($_POST["idsite"])? limpiarCadena($_POST["idsite"]):"";
$idsite2=isset($_POST["idsite2"])? limpiarCadena($_POST["idsite2"]):"";
$documento=isset($_POST["documento"])? limpiarCadena($_POST["documento"]):"";
$num_documento=isset($_POST["num_documento"])? limpiarCadena($_POST["num_documento"]):"";
$indicador=isset($_POST["indicador"])? limpiarCadena($_POST["indicador"]):"";
$idcapex=isset($_POST["idcapex"])? limpiarCadena($_POST["idcapex"]):"";
$codigo=isset($_POST["codigo"])? limpiarCadena($_POST["codigo"]):"";
$elemento=isset($_POST["elemento"])? limpiarCadena($_POST["elemento"]):"";
$serial=isset($_POST["serial"])? limpiarCadena($_POST["serial"]):"";
$estado=isset($_POST["estado"])? limpiarCadena($_POST["estado"]):"";    
$despachado=isset($_POST["despachado"])? limpiarCadena($_POST["despachado"]):"";    
$instalado=isset($_POST["instalado"])? limpiarCadena($_POST["instalado"]):"";    
$bodega=isset($_POST["bodega"])? limpiarCadena($_POST["bodega"]):"";    
$movido=isset($_POST["movido"])? limpiarCadena($_POST["movido"]):"";    
$devuelto=isset($_POST["devuelto"])? limpiarCadena($_POST["devuelto"]):"";    
$ubicacion=isset($_POST["ubicacion"])? limpiarCadena($_POST["ubicacion"]):"";
$sitiofinal=isset($_POST["sitiofinal"])? limpiarCadena($_POST["sitiofinal"]):"";
$observacion=isset($_POST["observacion"])? limpiarCadena($_POST["observacion"]):"";
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
			if ($_FILES['imagen']['type'] == "image/jpg" || $_FILES['imagen']['type'] == "image/jpeg" || $_FILES['imagen']['type'] == "image/png")
			{
				$imagen = round(microtime(true)) . '.' . end($ext);
				move_uploaded_file($_FILES["imagen"]["tmp_name"], "../files/womhws/" . $imagen);
			}
		}

		if (!file_exists($_FILES['imagen2']['tmp_name']) || !is_uploaded_file($_FILES['imagen2']['tmp_name']))
		{
			$imagen2=$_POST["imagenactual2"];
		}
		else 
		{
			$ext = explode(".", $_FILES["imagen2"]["name"]);
			if ($_FILES['imagen2']['type'] == "image/jpg" || $_FILES['imagen2']['type'] == "image/jpeg" || $_FILES['imagen2']['type'] == "image/png")
			{
				$imagen2 = round(microtime(true)) . '.' . end($ext);
				move_uploaded_file($_FILES["imagen2"]["tmp_name"], "../files/womhws/" . $imagen2);
			}
		}



		if (empty($idwomhw)){
			$rspta=$womhw->insertar($idsite,$idsite2,$documento,$num_documento,$indicador,$idcapex,$codigo,$elemento,$serial,$estado,$despachado,$instalado,$bodega,$movido,$devuelto,$ubicacion,$sitiofinal,$observacion,$imagen,$imagen2);
			echo $rspta ? "Elemento registrado" : "Elemento no se pudo registrar";
		}
		else {
			$rspta=$womhw->editar($idwomhw,$idsite,$idsite2,$documento,$num_documento,$indicador,$idcapex,$codigo,$elemento,$serial,$estado,$despachado,$instalado,$bodega,$movido,$devuelto,$ubicacion,$sitiofinal,$observacion,$imagen,$imagen2);
			echo $rspta ? "Elemento actualizado" : "Elemento no se pudo actualizar";
		}
	break;

	


	case 'guardaryeditar2':

		// if (empty($idwomhw)){
		// 	$rspta=$womhw->insertar($idsite,$documento,$num_documento,$idcapex,$codigo,$elemento,$imagen);
		// 	echo $rspta ? "Artículo registrado" : "Artículo no se pudo registrar";
		// }
		// else {
		// 	$rspta=$womhw->editar($idwomhw,$idsite,$documento,$num_documento,$idcapex,$codigo,$elemento,$imagen);
		// 	echo $rspta ? "Artículo actualizado" : "Artículo no se pudo actualizar";
		// }

	break;



	case 'desactivar':
		$rspta=$womhw->desactivar($idwomhw);
 		echo $rspta ? "Artículo Desactivado" : "Artículo no se puede desactivar";
	break;

	case 'anulado':
		$rspta=$womhw->desactivar($idwomhw);
 		echo $rspta ? "Elemento Anulado" : "Elemento no se puede anular";
	break;

	case 'activar':
		$rspta=$womhw->activar($idwomhw);
 		echo $rspta ? "Artículo activado" : "Artículo no se puede activar";
	break;

	case 'mostrar':
		$rspta=$womhw->mostrar($idwomhw);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

	case 'listar':
		$rspta=$womhw->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>($reg->condicion)?'<button class="btn btn-warning" onclick="mostrar('.$reg->idwomhw.')"><i class="fa fa-pencil"></i></button>':
 					'<button class="btn btn-warning" onclick="mostrar('.$reg->idwomhw.')"><i class="fa fa-pencil"></i></button>',
			    "1"=>$reg->site,
				"2"=>$reg->documento,
 				"3"=>$reg->num_documento,
 				"4"=>$reg->indicador,
 				"5"=>$reg->capexx,
 				"6"=>$reg->capex,
 				"7"=>$reg->serial,
 				"8"=>$reg->estado,
 				"9"=>$reg->ubicacion,
 				"10"=>$reg->site2,
 				"11"=>"<img src='../files/womhws/".$reg->imagen."' height='50px' width='50px' >",
				"12"=>"<img src='../files/womhws/".$reg->imagen2."' height='50px' width='50px' >",
 				
 				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);

	break;


	case 'listar2':
		$rspta=$womhw->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>($reg->condicion)?'<button class="btn btn-warning" onclick="mostrar2('.$reg->idwomhw.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-danger" onclick="desactivar('.$reg->idwomhw.')"><i class="fa fa-close"></i></button>':
 					'<button class="btn btn-warning" onclick="mostrar2('.$reg->idwomhw.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-primary" onclick="activar('.$reg->idwomhw.')"><i class="fa fa-check"></i></button>',
			    "1"=>$reg->site,
				"2"=>$reg->documento,
 				"3"=>$reg->num_documento,
 				"4"=>$reg->capexx,
 				"5"=>$reg->capex,
 				"6"=>"<img src='../files/womhws/".$reg->imagen."' height='50px' width='50px' >",
 				"7"=>"<img src='../files/womhws/".$reg->imagen2."' height='50px' width='50px' >",
 				"8"=>($reg->condicion)?'<span class="label bg-green">Activado</span>':
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


	case 'listar3':
		$rspta=$womhw->listar2();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>($reg->condicion)?'<button class="btn btn-warning" onclick="mostrar('.$reg->idwomhw.')"><i class="fa fa-pencil"></i></button>':
 					'<button class="btn btn-warning" onclick="mostrar('.$reg->idwomhw.')"><i class="fa fa-pencil"></i></button>',
			    "1"=>$reg->site,
				"2"=>$reg->documento,
 				"3"=>$reg->num_documento,
 				"4"=>$reg->codigo,
 				"5"=>$reg->elemento,
 				"6"=>$reg->serial,
 				"7"=>$reg->despachado,
 				"8"=>$reg->instalado,
 				"9"=>$reg->bodega,
 				"10"=>$reg->movido,
 				"11"=>$reg->devuelto,
 				"12"=>$reg->estado,
 				"13"=>$reg->ubicacion,
 				"14"=>$reg->site2,
 				"15"=>"<img src='../files/womhws/".$reg->imagen."' height='50px' width='50px' >",
 				"16"=>"<img src='../files/womhws/".$reg->imagen2."' height='50px' width='50px' >",
 				
 				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);

	break;

	case 'mostrarhw':
		$rspta=$womhw->mostrar($idwomhw);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

	


	case 'listarsitiohw':

		$idsite=$_REQUEST["idsite"];
		
		$rspta=$womhw->listarhw($idsite);
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>$reg->idsite,
			    "1"=>$reg->site,
				"2"=>$reg->documento,
 				"3"=>$reg->num_documento,
 				"4"=>$reg->capexx,
 				"5"=>$reg->capex,
 				"6"=>$reg->serial,
 				"7"=>$reg->estado,
 				"8"=>$reg->ubicacion,
 				"9"=>$reg->site2,
 				"10"=>$reg->observacion,
 				"11"=>"<img src='../files/womhws/".$reg->imagen."' height='50px' width='50px' >",
 				"12"=>"<img src='../files/womhws/".$reg->imagen2."' height='50px' width='50px' >"
 				);	
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);

	break;

	case 'listarsitiohw2':

		$idsite=$_REQUEST["idsite"];
		
		$rspta=$womhw->listarhw($idsite);
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>($reg->condicion)?'<button class="btn btn-warning" onclick="mostrarhw('.$reg->idwomhw.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-danger" onclick="anulado('.$reg->idwomhw.')"><i class="fa fa-close"></i></button>':
 					'<button class="btn btn-warning" onclick="mostrarhw('.$reg->idwomhw.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-primary" onclick="activar('.$reg->idwomhw.')"><i class="fa fa-check"></i></button>',
			    "1"=>$reg->site,
				"2"=>$reg->documento,
 				"3"=>$reg->num_documento,
 				"4"=>$reg->capexx,
 				"5"=>$reg->capex,
 				"6"=>"<img src='../files/womhws/".$reg->imagen."' height='50px' width='50px' >",
 				"7"=>($reg->condicion)?'<span class="label bg-green">Activado</span>':
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


	case 'filtrositio':
		$idsite=$_REQUEST["idsite"];

		$rspta=$womhw->filtrosite($idsite);
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
				"0"=>($reg->condicion)?'<button class="btn btn-warning" onclick="mostrar('.$reg->idwomhw.')"><i class="fa fa-pencil"></i></button>':
 					'<button class="btn btn-warning" onclick="mostrar('.$reg->idwomhw.')"><i class="fa fa-pencil"></i></button>',
			    "1"=>$reg->site,
				"2"=>$reg->documento,
 				"3"=>$reg->num_documento,
 				"4"=>$reg->codigo,
 				"5"=>$reg->elemento,
 				"6"=>$reg->serial,
 				"7"=>$reg->despachado,
 				"8"=>$reg->instalado,
 				"9"=>$reg->bodega,
 				"10"=>$reg->movido,
 				"11"=>$reg->devuelto,
 				"12"=>$reg->estado,
 				"13"=>$reg->ubicacion,
 				"14"=>$reg->site2,
 				"15"=>"<img src='../files/womhws/".$reg->imagen."' height='50px' width='50px' >",
 				"16"=>"<img src='../files/womhws/".$reg->imagen2."' height='50px' width='50px' >",
 				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);

	break;
	
	

	case "selectSite":
		require_once "../modelos/Site.php";
		$site = new Site();

		$rspta = $site->selectt();

		while ($reg = $rspta->fetch_object())
				{
					echo '<option value=' . $reg->idsite . '>' . $reg->nombre . '</option>';
				}
	break;


	case "selectSite2":
		require_once "../modelos/Site.php";
		$site = new Site();

		$rspta = $site->selectt2();

		while ($reg = $rspta->fetch_object())
				{
					echo '<option value=' . $reg->idsite . '>' . $reg->nombre . '</option>';
				}
	break;



	case "selectCapex":
		require_once "../modelos/Capex.php";
		$capex = new Capex();

		$rspta = $capex->select();

		while ($reg = $rspta->fetch_object())
				{
					echo '<option value=' . $reg->idcapex . '>' . $reg->nombre . '</option>';
				}
	break;

	
}
//Fin de las validaciones de acceso
}
else
if ($_SESSION['cliente_ofg']==1 )
{	
require_once "../modelos/Womhw.php";

$womhw = new Womhw();

$idwomhw=isset($_POST["idwomhw"])? limpiarCadena($_POST["idwomhw"]):"";
$idsite=isset($_POST["idsite"])? limpiarCadena($_POST["idsite"]):"";
$idsite2=isset($_POST["idsite2"])? limpiarCadena($_POST["idsite2"]):"";
$documento=isset($_POST["documento"])? limpiarCadena($_POST["documento"]):"";
$num_documento=isset($_POST["num_documento"])? limpiarCadena($_POST["num_documento"]):"";
$indicador=isset($_POST["indicador"])? limpiarCadena($_POST["indicador"]):"";
$idcapex=isset($_POST["idcapex"])? limpiarCadena($_POST["idcapex"]):"";
$codigo=isset($_POST["codigo"])? limpiarCadena($_POST["codigo"]):"";
$elemento=isset($_POST["elemento"])? limpiarCadena($_POST["elemento"]):"";
$serial=isset($_POST["serial"])? limpiarCadena($_POST["serial"]):"";
$estado=isset($_POST["estado"])? limpiarCadena($_POST["estado"]):"";    
$despachado=isset($_POST["despachado"])? limpiarCadena($_POST["despachado"]):"";    
$instalado=isset($_POST["instalado"])? limpiarCadena($_POST["instalado"]):"";    
$bodega=isset($_POST["bodega"])? limpiarCadena($_POST["bodega"]):"";    
$movido=isset($_POST["movido"])? limpiarCadena($_POST["movido"]):"";    
$devuelto=isset($_POST["devuelto"])? limpiarCadena($_POST["devuelto"]):"";    
$ubicacion=isset($_POST["ubicacion"])? limpiarCadena($_POST["ubicacion"]):"";
$sitiofinal=isset($_POST["sitiofinal"])? limpiarCadena($_POST["sitiofinal"]):"";
$observacion=isset($_POST["observacion"])? limpiarCadena($_POST["observacion"]):"";
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
			if ($_FILES['imagen']['type'] == "image/jpg" || $_FILES['imagen']['type'] == "image/jpeg" || $_FILES['imagen']['type'] == "image/png")
			{
				$imagen = round(microtime(true)) . '.' . end($ext);
				move_uploaded_file($_FILES["imagen"]["tmp_name"], "../files/womhws/" . $imagen);
			}
		}

		if (!file_exists($_FILES['imagen2']['tmp_name']) || !is_uploaded_file($_FILES['imagen2']['tmp_name']))
		{
			$imagen2=$_POST["imagenactual2"];
		}
		else 
		{
			$ext = explode(".", $_FILES["imagen2"]["name"]);
			if ($_FILES['imagen2']['type'] == "image/jpg" || $_FILES['imagen2']['type'] == "image/jpeg" || $_FILES['imagen2']['type'] == "image/png")
			{
				$imagen2 = round(microtime(true)) . '.' . end($ext);
				move_uploaded_file($_FILES["imagen2"]["tmp_name"], "../files/womhws/" . $imagen2);
			}
		}



		if (empty($idwomhw)){
			$rspta=$womhw->insertar($idsite,$idsite2,$documento,$num_documento,$indicador,$idcapex,$codigo,$elemento,$serial,$estado,$despachado,$instalado,$bodega,$movido,$devuelto,$ubicacion,$sitiofinal,$observacion,$imagen,$imagen2);
			echo $rspta ? "Elemento registrado" : "Elemento no se pudo registrar";
		}
		else {
			$rspta=$womhw->editar($idwomhw,$idsite,$idsite2,$documento,$num_documento,$indicador,$idcapex,$codigo,$elemento,$serial,$estado,$despachado,$instalado,$bodega,$movido,$devuelto,$ubicacion,$sitiofinal,$observacion,$imagen,$imagen2);
			echo $rspta ? "Elemento actualizado" : "Elemento no se pudo actualizar";
		}
	break;

	


	case 'guardaryeditar2':

		// if (empty($idwomhw)){
		// 	$rspta=$womhw->insertar($idsite,$documento,$num_documento,$idcapex,$codigo,$elemento,$imagen);
		// 	echo $rspta ? "Artículo registrado" : "Artículo no se pudo registrar";
		// }
		// else {
		// 	$rspta=$womhw->editar($idwomhw,$idsite,$documento,$num_documento,$idcapex,$codigo,$elemento,$imagen);
		// 	echo $rspta ? "Artículo actualizado" : "Artículo no se pudo actualizar";
		// }

	break;



	case 'desactivar':
		$rspta=$womhw->desactivar($idwomhw);
 		echo $rspta ? "Artículo Desactivado" : "Artículo no se puede desactivar";
	break;

	case 'anulado':
		$rspta=$womhw->desactivar($idwomhw);
 		echo $rspta ? "Elemento Anulado" : "Elemento no se puede anular";
	break;

	case 'activar':
		$rspta=$womhw->activar($idwomhw);
 		echo $rspta ? "Artículo activado" : "Artículo no se puede activar";
	break;

	case 'mostrar':
		$rspta=$womhw->mostrar($idwomhw);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

	case 'listar':
		$rspta=$womhw->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>($reg->condicion)?'<button class="btn btn-warning" onclick="mostrar('.$reg->idwomhw.')"><i class="fa fa-pencil"></i></button>':
 					'<button class="btn btn-warning" onclick="mostrar('.$reg->idwomhw.')"><i class="fa fa-pencil"></i></button>',
			    "1"=>$reg->site,
				"2"=>$reg->documento,
 				"3"=>$reg->num_documento,
 				"4"=>$reg->indicador,
 				"5"=>$reg->capexx,
 				"6"=>$reg->capex,
 				"7"=>$reg->serial,
 				"8"=>$reg->estado,
 				"9"=>$reg->ubicacion,
 				"10"=>$reg->site2,
 				"11"=>"<img src='../files/womhws/".$reg->imagen."' height='50px' width='50px' >",
				"12"=>"<img src='../files/womhws/".$reg->imagen2."' height='50px' width='50px' >",
 				
 				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);

	break;


	case 'listar2':
		$rspta=$womhw->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>($reg->condicion)?'<button class="btn btn-warning" onclick="mostrar2('.$reg->idwomhw.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-danger" onclick="desactivar('.$reg->idwomhw.')"><i class="fa fa-close"></i></button>':
 					'<button class="btn btn-warning" onclick="mostrar2('.$reg->idwomhw.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-primary" onclick="activar('.$reg->idwomhw.')"><i class="fa fa-check"></i></button>',
			    "1"=>$reg->site,
				"2"=>$reg->documento,
 				"3"=>$reg->num_documento,
 				"4"=>$reg->capexx,
 				"5"=>$reg->capex,
 				"6"=>"<img src='../files/womhws/".$reg->imagen."' height='50px' width='50px' >",
 				"7"=>"<img src='../files/womhws/".$reg->imagen2."' height='50px' width='50px' >",
 				"8"=>($reg->condicion)?'<span class="label bg-green">Activado</span>':
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


	case 'listar3':
		$rspta=$womhw->listar2();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>($reg->condicion)?'<button class="btn btn-warning" onclick="mostrar('.$reg->idwomhw.')"><i class="fa fa-pencil"></i></button>':
 					'<button class="btn btn-warning" onclick="mostrar('.$reg->idwomhw.')"><i class="fa fa-pencil"></i></button>',
			    "1"=>$reg->site,
				"2"=>$reg->documento,
 				"3"=>$reg->num_documento,
 				"4"=>$reg->codigo,
 				"5"=>$reg->elemento,
 				"6"=>$reg->serial,
 				"7"=>$reg->despachado,
 				"8"=>$reg->instalado,
 				"9"=>$reg->bodega,
 				"10"=>$reg->movido,
 				"11"=>$reg->devuelto,
 				"12"=>$reg->estado,
 				"13"=>$reg->ubicacion,
 				"14"=>$reg->site2,
 				"15"=>"<img src='../files/womhws/".$reg->imagen."' height='50px' width='50px' >",
 				"16"=>"<img src='../files/womhws/".$reg->imagen2."' height='50px' width='50px' >",
 				
 				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);

	break;

	case 'mostrarhw':
		$rspta=$womhw->mostrar($idwomhw);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

	


	case 'listarsitiohw':

		$idsite=$_REQUEST["idsite"];
		
		$rspta=$womhw->listarhw($idsite);
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>$reg->idsite,
			    "1"=>$reg->site,
				"2"=>$reg->documento,
 				"3"=>$reg->num_documento,
 				"4"=>$reg->capexx,
 				"5"=>$reg->capex,
 				"6"=>$reg->serial,
 				"7"=>$reg->estado,
 				"8"=>$reg->ubicacion,
 				"9"=>$reg->site2,
 				"10"=>$reg->observacion,
 				"11"=>"<img src='../files/womhws/".$reg->imagen."' height='50px' width='50px' >",
 				"12"=>"<img src='../files/womhws/".$reg->imagen2."' height='50px' width='50px' >"
 				);	
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);

	break;

	case 'listarsitiohw2':

		$idsite=$_REQUEST["idsite"];
		
		$rspta=$womhw->listarhw($idsite);
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>($reg->condicion)?'<button class="btn btn-warning" onclick="mostrarhw('.$reg->idwomhw.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-danger" onclick="anulado('.$reg->idwomhw.')"><i class="fa fa-close"></i></button>':
 					'<button class="btn btn-warning" onclick="mostrarhw('.$reg->idwomhw.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-primary" onclick="activar('.$reg->idwomhw.')"><i class="fa fa-check"></i></button>',
			    "1"=>$reg->site,
				"2"=>$reg->documento,
 				"3"=>$reg->num_documento,
 				"4"=>$reg->capexx,
 				"5"=>$reg->capex,
 				"6"=>"<img src='../files/womhws/".$reg->imagen."' height='50px' width='50px' >",
 				"7"=>($reg->condicion)?'<span class="label bg-green">Activado</span>':
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


	case 'filtrositio':
		$idsite=$_REQUEST["idsite"];

		$rspta=$womhw->filtrosite($idsite);
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
				"0"=>($reg->condicion)?'<button class="btn btn-warning" onclick="mostrar('.$reg->idwomhw.')"><i class="fa fa-pencil"></i></button>':
 					'<button class="btn btn-warning" onclick="mostrar('.$reg->idwomhw.')"><i class="fa fa-pencil"></i></button>',
			    "1"=>$reg->site,
				"2"=>$reg->documento,
 				"3"=>$reg->num_documento,
 				"4"=>$reg->codigo,
 				"5"=>$reg->elemento,
 				"6"=>$reg->serial,
 				"7"=>$reg->despachado,
 				"8"=>$reg->instalado,
 				"9"=>$reg->bodega,
 				"10"=>$reg->movido,
 				"11"=>$reg->devuelto,
 				"12"=>$reg->estado,
 				"13"=>$reg->ubicacion,
 				"14"=>$reg->site2,
 				"15"=>"<img src='../files/womhws/".$reg->imagen."' height='50px' width='50px' >",
 				"16"=>"<img src='../files/womhws/".$reg->imagen2."' height='50px' width='50px' >",
 				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);

	break;
	
	

	case "selectSite":
		require_once "../modelos/Site.php";
		$site = new Site();

		$rspta = $site->selectt();

		while ($reg = $rspta->fetch_object())
				{
					echo '<option value=' . $reg->idsite . '>' . $reg->nombre . '</option>';
				}
	break;


	case "selectSite2":
		require_once "../modelos/Site.php";
		$site = new Site();

		$rspta = $site->selectt2();

		while ($reg = $rspta->fetch_object())
				{
					echo '<option value=' . $reg->idsite . '>' . $reg->nombre . '</option>';
				}
	break;



	case "selectCapex":
		require_once "../modelos/Capex.php";
		$capex = new Capex();

		$rspta = $capex->select();

		while ($reg = $rspta->fetch_object())
				{
					echo '<option value=' . $reg->idcapex . '>' . $reg->nombre . '</option>';
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