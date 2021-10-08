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
if ($_SESSION['proyecto_asecones']==1  && $_SESSION['asecones_escuelas_coordinador'] == 1 or $_SESSION['cliente_ofg'] == 1 or $_SESSION['cliente_ultratel'] == 1)
{	
require_once "../modelos/Site.php";

$site=new Site();



//$idusuario=$_SESSION["idusuario"];
$idusuario=isset($_POST["idusuario"])? limpiarCadena($_POST["idusuario"]):"";
$nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
$idsite=isset($_POST["idsite"])? limpiarCadena($_POST["idsite"]):"";
$idproyecto=isset($_POST["idproyecto"])? limpiarCadena($_POST["idproyecto"]):"";
$codigo=isset($_POST["codigo"])? limpiarCadena($_POST["codigo"]):"";
$nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
$lider_cuadrilla=isset($_POST["lider_cuadrilla"])? limpiarCadena($_POST["lider_cuadrilla"]):"";
$estado_campo=isset($_POST["estado_campo"])? limpiarCadena($_POST["estado_campo"]):"";
$actividad=isset($_POST["actividad"])? limpiarCadena($_POST["actividad"]):"";
$observaciones_campo=isset($_POST["observaciones_campo"])? limpiarCadena($_POST["observaciones_campo"]):"";
$documentador=isset($_POST["documentador"])? limpiarCadena($_POST["documentador"]):"";
$doc_pre=isset($_POST["doc_pre"])? limpiarCadena($_POST["doc_pre"]):"";
$doc_post=isset($_POST["doc_post"])? limpiarCadena($_POST["doc_post"]):"";
$observaciones_doc=isset($_POST["observaciones_doc"])? limpiarCadena($_POST["observaciones_doc"]):"";
$auditor=isset($_POST["auditor"])? limpiarCadena($_POST["auditor"]):"";
$estado_nokia=isset($_POST["estado_nokia"])? limpiarCadena($_POST["estado_nokia"]):"";
$observaciones_nokia=isset($_POST["observaciones_nokia"])? limpiarCadena($_POST["observaciones_nokia"]):"";
$imagen=isset($_POST["imagen"])? limpiarCadena($_POST["imagen"]):"";
$imagen2=isset($_POST["imagen2"])? limpiarCadena($_POST["imagen2"]):"";
$imagen3=isset($_POST["imagen3"])? limpiarCadena($_POST["imagen3"]):"";
$imagen4=isset($_POST["imagen4"])? limpiarCadena($_POST["imagen4"]):"";
$imagen5=isset($_POST["imagen5"])? limpiarCadena($_POST["imagen5"]):"";
$imagen6=isset($_POST["imagen6"])? limpiarCadena($_POST["imagen6"]):"";
$imagen7=isset($_POST["imagen7"])? limpiarCadena($_POST["imagen7"]):"";
$imagen8=isset($_POST["imagen8"])? limpiarCadena($_POST["imagen8"]):"";
$imagen9=isset($_POST["imagen9"])? limpiarCadena($_POST["imagen9"]):"";
$imagen10=isset($_POST["imagen10"])? limpiarCadena($_POST["imagen10"]):"";
$imagen11=isset($_POST["imagen11"])? limpiarCadena($_POST["imagen11"]):"";
$imagen12=isset($_POST["imagen12"])? limpiarCadena($_POST["imagen12"]):"";
$imagen13=isset($_POST["imagen13"])? limpiarCadena($_POST["imagen13"]):"";


switch ($_GET["op"]){
	
	case 'guardaryeditar700':


		if (!file_exists($_FILES['imagen']['tmp_name']) || !is_uploaded_file($_FILES['imagen']['tmp_name']))
		{
			$imagen=$_POST["imagenactual"];
		}
		else 
		{
			$ext = explode(".", $_FILES["imagen"]["name"]);
			$imagen = $nombre."_TSS"."_".date("d-m-Y").'.' . end($ext);
			move_uploaded_file($_FILES["imagen"]["tmp_name"], "../files/tss_700/" . $imagen);
		}



		if (!file_exists($_FILES['imagen2']['tmp_name']) || !is_uploaded_file($_FILES['imagen2']['tmp_name']))
		{
			$imagen2=$_POST["imagenactual2"];
		
		}
		else 
		{
			$ext = explode(".", $_FILES["imagen2"]["name"]);
			$imagen2 = $nombre."_PACKING_LIST"."_".date("d-m-Y").'.' . end($ext);
			move_uploaded_file($_FILES["imagen2"]["tmp_name"], "../files/packinglist_700/" . $imagen2);

		}
		
		if (!file_exists($_FILES['imagen3']['tmp_name']) || !is_uploaded_file($_FILES['imagen3']['tmp_name']))
		{
			$imagen3=$_POST["imagenactual3"];
		}
		else 
		{
			$ext = explode(".", $_FILES["imagen3"]["name"]);
			$imagen3 = $nombre."_HW_CONTROL"."_".date("d-m-Y").'.' . end($ext);
			move_uploaded_file($_FILES["imagen3"]["tmp_name"], "../files/hwcontrol_700/" . $imagen3);
		}
	

		if (!file_exists($_FILES['imagen4']['tmp_name']) || !is_uploaded_file($_FILES['imagen4']['tmp_name']))
		{
			$imagen4=$_POST["imagenactual4"];
		}
		else 
		{
			$ext = explode(".", $_FILES["imagen4"]["name"]);
			$imagen4 = $nombre."_SERIALES"."_".date("d-m-Y").'.' . end($ext);
			move_uploaded_file($_FILES["imagen4"]["tmp_name"], "../files/seriales_700/" . $imagen4);

		}

		if (!file_exists($_FILES['imagen5']['tmp_name']) || !is_uploaded_file($_FILES['imagen5']['tmp_name']))
		{
			$imagen5=$_POST["imagenactual5"];
		}
		else 
		{
			$ext = explode(".", $_FILES["imagen5"]["name"]);
			$imagen5 = $nombre."_COMISIONAMIENTO_PRE"."_".date("d-m-Y").'.' . end($ext);
			move_uploaded_file($_FILES["imagen5"]["tmp_name"], "../files/comisionamiento_pre_700/" . $imagen5);
		}

		if (!file_exists($_FILES['imagen6']['tmp_name']) || !is_uploaded_file($_FILES['imagen6']['tmp_name']))
		{
			$imagen6=$_POST["imagenactual6"];
		}
		else 
		{
			$ext = explode(".", $_FILES["imagen6"]["name"]);
			$imagen6 = $nombre."_REPORTE_RADIANTE_PRE"."_".date("d-m-Y").'.' . end($ext);
			move_uploaded_file($_FILES["imagen6"]["tmp_name"], "../files/reporte_radiante_pre_700/" . $imagen6);

		}

		if (!file_exists($_FILES['imagen7']['tmp_name']) || !is_uploaded_file($_FILES['imagen7']['tmp_name']))
		{
			$imagen7=$_POST["imagenactual7"];
		}
		else 
		{
			$ext = explode(".", $_FILES["imagen7"]["name"]);
			$imagen7 = $nombre."_ACTA_HFD"."_".date("d-m-Y").'.' . end($ext);
			move_uploaded_file($_FILES["imagen7"]["tmp_name"], "../files/acta_hfd_700/" . $imagen7);
		}

		
		if (!file_exists($_FILES['imagen8']['tmp_name']) || !is_uploaded_file($_FILES['imagen8']['tmp_name']))
		{
			$imagen8=$_POST["imagenactual8"];
		}
		else 
		{
			$ext = explode(".", $_FILES["imagen8"]["name"]);
			$imagen8 = $nombre."_ACTA_HFNI"."_".date("d-m-Y").'.' . end($ext);
			move_uploaded_file($_FILES["imagen8"]["tmp_name"], "../files/acta_hfni_700/" . $imagen8);

		}

		if (!file_exists($_FILES['imagen9']['tmp_name']) || !is_uploaded_file($_FILES['imagen9']['tmp_name']))
		{
			$imagen9=$_POST["imagenactual9"];
		}
		else 
		{
			$ext = explode(".", $_FILES["imagen9"]["name"]);
			$imagen9 = $nombre."_ACTA_HB"."_".date("d-m-Y").'.' . end($ext);
			move_uploaded_file($_FILES["imagen9"]["tmp_name"], "../files/acta_hb_700/" . $imagen9);

		}

		if (!file_exists($_FILES['imagen10']['tmp_name']) || !is_uploaded_file($_FILES['imagen10']['tmp_name']))
		{
			$imagen10=$_POST["imagenactual10"];
		}
		else 
		{
			$ext = explode(".", $_FILES["imagen10"]["name"]);
			$imagen10 = $nombre."_REPORTE_RADIANTE_POST"."_".date("d-m-Y").'.' . end($ext);
			move_uploaded_file($_FILES["imagen10"]["tmp_name"], "../files/reporte_radiante_post_700/" . $imagen10);

		}

		if (!file_exists($_FILES['imagen11']['tmp_name']) || !is_uploaded_file($_FILES['imagen11']['tmp_name']))
		{
			$imagen11=$_POST["imagenactual11"];
		}
		else 
		{
			$ext = explode(".", $_FILES["imagen11"]["name"]);
			$imagen11 = $nombre."_COMISIONAMIENTO_POST"."_".date("d-m-Y").'.' . end($ext);
			move_uploaded_file($_FILES["imagen11"]["tmp_name"], "../files/comisionamiento_post_700/" . $imagen11);

		}

		if (!file_exists($_FILES['imagen12']['tmp_name']) || !is_uploaded_file($_FILES['imagen12']['tmp_name']))
		{
			$imagen12=$_POST["imagenactual12"];
		}
		else 
		{
			$ext = explode(".", $_FILES["imagen12"]["name"]);
			$imagen12 = $nombre."_Formato_ATP_Nokia-"."_".date("d-m-Y").'.' . end($ext);
			move_uploaded_file($_FILES["imagen12"]["tmp_name"], "../files/registro_bts_700/" . $imagen12);
		}

		if (!file_exists($_FILES['imagen13']['tmp_name']) || !is_uploaded_file($_FILES['imagen13']['tmp_name']))
		{
			$imagen13=$_POST["imagenactual13"];
		}
		else 
		{
			$ext = explode(".", $_FILES["imagen13"]["name"]);
			$imagen13 = $nombre."_PRUEBAS_VOZ_Y_DATOS"."_".date("d-m-Y").'.' . end($ext);
			move_uploaded_file($_FILES["imagen13"]["tmp_name"], "../files/pruebasvozydatos_700/" . $imagen13);
		}



		if (empty($idsite)){
			$rspta=$site->insertar700($idproyecto,$codigo,$nombre,$lider_cuadrilla,$estado_campo,$actividad,$observaciones_campo,$documentador,$doc_pre,$doc_post,$observaciones_doc,$auditor,$estado_nokia,$observaciones_nokia,$imagen,$imagen2,$imagen3,$imagen4,$imagen5,$imagen6,$imagen7,$imagen8,$imagen9,$imagen10,$imagen11,$imagen12,$imagen13);
			echo $rspta ? "Sitio registrado" : "Sitio no se pudo registrar";
		}
		else {
			$rspta=$site->editar700($idsite,$idproyecto,$codigo,$nombre,$lider_cuadrilla,$estado_campo,$actividad,$observaciones_campo,$documentador,$doc_pre,$doc_post,$observaciones_doc,$auditor,$estado_nokia,$observaciones_nokia,$imagen,$imagen2,$imagen3,$imagen4,$imagen5,$imagen6,$imagen7,$imagen8,$imagen9,$imagen10,$imagen11,$imagen12,$imagen13);
			echo $rspta ? "Sitio actualizado" : "Sitio no se pudo actualizar";
		}
	break;



	case 'desactivar':
		$rspta=$site->desactivar($idsite);
 		echo $rspta ? "Sitio Rechazado" : "Sitio no se puedo Rechazar";
	break;

	case 'activar':
		$rspta=$site->activar($idsite);
 		echo $rspta ? "Sitio Aprobado" : "Sitio no se puede Aprobar";
	break;

	case 'mostrar':
		$rspta=$site->mostrar($idsite);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;


	case 'hw':
		$rspta=$site->mostrar($idsite);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;


	case 'listartecnico':
		
		$rspta=$site->listartecnico($_SESSION["nombre"]);
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
				 
 				"0"=>($reg->condicion)?'<button class="btn btn-warning" onclick="mostrar('.$reg->idsite.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-danger" onclick="desactivar('.$reg->idsite.')"><i class="fa fa-close"></i></button>':
 					'<button class="btn btn-warning" onclick="mostrar('.$reg->idsite.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-primary" onclick="activar('.$reg->idsite.')"><i class="fa fa-check"></i></button>',
					 '<button class="btn btn-warning" onclick="mostrar('.$reg->idsite.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-info" onclick="activar('.$reg->idsite.')"><i class="fa fa-wrench"></i></button>',
 				"1"=>$reg->nombre,
 				"2"=>$reg->proyecto,
 				"3"=>$reg->regional,
 				"4"=>$reg->lider_cuadrilla,
 				"5"=>$reg->estado_sitio,
 				"6"=>"<img src='../files/sites/".$reg->imagen."' height='50px' width='50px' >",
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
	
	
	case 'listar700documentador':

		if ($_SESSION['asecones_escuelas_coordinador']==1)
		{
			
		$rspta=$site->listar700();
 		//Vamos a declarar un array
		 $data= Array();

 		while ($reg=$rspta->fetch_object()){
			$data[]=array(
				"0"=>($reg->condicion)?'<button class="btn btn-warning" onclick="mostrar('.$reg->idsite.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-danger" onclick="desactivar('.$reg->idsite.')"><i class="fa fa-close"></i></button>':
 					'<button class="btn btn-warning" onclick="mostrar('.$reg->idsite.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-primary" onclick="activar('.$reg->idsite.')"><i class="fa fa-check"></i></button>',
				"1"=>$reg->nombre,
				"2"=>$reg->proyecto,
				"3"=>$reg->codigo,
				"4"=>$reg->supervisor,
				"5"=>$reg->doc,
				"6"=>"<u class='text-danger'><h5 class='text-danger'>OBSERVACION HARDWARE:</h5></u>".$reg->observaciones_campo."<u class='text-danger'><h5 class='text-danger'>OBSERVACION DOCUMENTACION:</h5></u>".$reg->observaciones_doc,
				"7"=>"<a href ='../files/tss_700/".$reg->imagen."' >$reg->imagen</a>",
				"8"=>"<a href ='../files/packinglist_700/".$reg->imagen2."'target='_blank'>$reg->imagen2</a>",
				"9"=>"<a href ='../files/hwcontrol_700/".$reg->imagen3."'target='_blank'>$reg->imagen3</a>",
				"10"=>"<a href ='../files/seriales_700/".$reg->imagen4."' >$reg->imagen4</a>",
				"11"=>"<a href ='../files/comisionamiento_pre_700/".$reg->imagen5."' >$reg->imagen5</a>",
				"12"=>"<a href ='../files/reporte_radiante_pre_700/".$reg->imagen6."' >$reg->imagen6</a>",
				"13"=>"<a href ='../files/acta_hfd_700/".$reg->imagen7."' >$reg->imagen7</a>",
				"14"=>"<a href ='../files/acta_hfni_700/".$reg->imagen8."' >$reg->imagen8</a>",
				"15"=>"<a href ='../files/acta_hb_700/".$reg->imagen9."' >$reg->imagen9</a>",
				"16"=>"<a href ='../files/reporte_radiante_post_700/".$reg->imagen10."' >$reg->imagen10</a>",
				"17"=>"<a href ='../files/comisionamiento_post_700/".$reg->imagen11."' >$reg->imagen11</a>",
				"18"=>"<a href ='../files/registro_bts_700/".$reg->imagen12."' >$reg->imagen12</a>",
				"19"=>"<a href ='../files/pruebasvozydatos_700/".$reg->imagen13."' >$reg->imagen13</a>",
				"20"=>($reg->condicion)?'<span class="label bg-green">Aprobado</span>':
				   '<span class="label bg-yellow">En Proceso</span>'
				);
		 }
		 

 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);

	
     }
	 elseif($_SESSION['asecones_escuelas_documentador']==1){


		$rspta=$site->listar700documentador($_SESSION["nombre"]);
		//Vamos a declarar un array
		$data= Array();

		while ($reg=$rspta->fetch_object()){
			$data[]=array(
				"0"=>($reg->condicion)?'<button class="btn btn-warning" onclick="mostrar('.$reg->idsite.')"><i class="fa fa-eye"></i></button>':
				'<button class="btn btn-warning" onclick="mostrar('.$reg->idsite.')"><i class="fa fa-eye"></i></button>',
				"1"=>$reg->nombre,
				"2"=>$reg->proyecto,
				"3"=>$reg->codigo,
				"4"=>$reg->doc,
				"5"=>"<u class='text-danger'><h5 class='text-danger'>OBSERVACION HARDWARE:</h5></u>".$reg->observaciones_campo."<u class='text-danger'><h5 class='text-danger'>OBSERVACION DOCUMENTACION:</h5></u>".$reg->observaciones_doc,
				"6"=>$reg->supervisor,
				"7"=>"<a href ='../files/tss_700/".$reg->imagen."' >$reg->imagen</a>",
				"8"=>"<a href ='../files/packinglist_700/".$reg->imagen2."'target='_blank'>$reg->imagen2</a>",
				"9"=>"<a href ='../files/hwcontrol_700/".$reg->imagen3."'target='_blank'>$reg->imagen3</a>",
				"10"=>"<a href ='../files/seriales_700/".$reg->imagen4."' >$reg->imagen4</a>",
				"11"=>"<a href ='../files/comisionamiento_pre_700/".$reg->imagen5."' >$reg->imagen5</a>",
				"12"=>"<a href ='../files/reporte_radiante_pre_700/".$reg->imagen6."' >$reg->imagen6</a>",
				"13"=>"<a href ='../files/acta_hfd_700/".$reg->imagen7."' >$reg->imagen7</a>",
				"14"=>"<a href ='../files/acta_hfni_700/".$reg->imagen8."' >$reg->imagen8</a>",
				"15"=>"<a href ='../files/acta_hb_700/".$reg->imagen9."' >$reg->imagen9</a>",
				"16"=>"<a href ='../files/reporte_radiante_post_700/".$reg->imagen10."' >$reg->imagen10</a>",
				"17"=>"<a href ='../files/comisionamiento_post_700/".$reg->imagen11."' >$reg->imagen11</a>",
				"18"=>"<a href ='../files/registro_bts_700/".$reg->imagen12."' >$reg->imagen12</a>",
				"19"=>"<a href ='../files/pruebasvozydatos_700/".$reg->imagen13."' >$reg->imagen13</a>",
				"20"=>($reg->condicion)?'<span class="label bg-green">Aprobado</span>':
				   '<span class="label bg-yellow">En Proceso</span>'
 				);
		}
		

		$results = array(
			"sEcho"=>1, //Información para el datatables
			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
			"aaData"=>$data);
		echo json_encode($results);
	}


	elseif($_SESSION['cliente_ofg']==1 ){

		$rspta=$site->listar700();
 		//Vamos a declarar un array
		 $data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(

			"0"=>($reg->condicion)?' <button class="btn btn-danger" onclick="desactivar('.$reg->idsite.')"><i class="fa fa-close"></i></button>':' <button class="btn btn-primary" onclick="activar('.$reg->idsite.')"><i class="fa fa-check"></i></button>',
		   "1"=>$reg->nombre,
		   "2"=>$reg->codigo,
		   "3"=>$reg->supervisor,
		   "4"=>$reg->doc,
		   "5"=>$reg->observaciones_doc,
		   "6"=>"<a href ='../files/tss_700/".$reg->imagen."' >$reg->imagen</a>",
		   "7"=>"<a href ='../files/packinglist_700/".$reg->imagen2."'target='_blank'>$reg->imagen2</a>",
		   "8"=>"<a href ='../files/hwcontrol_700/".$reg->imagen3."'target='_blank'>$reg->imagen3</a>",
		   "9"=>"<a href ='../files/seriales_700/".$reg->imagen4."' >$reg->imagen4</a>",
		   "10"=>"<a href ='../files/comisionamiento_pre_700/".$reg->imagen5."' >$reg->imagen5</a>",
		   "11"=>"<a href ='../files/reporte_radiante_pre_700/".$reg->imagen6."' >$reg->imagen6</a>",
		   "12"=>"<a href ='../files/acta_hfd_700/".$reg->imagen7."' >$reg->imagen7</a>",
		   "13"=>"<a href ='../files/acta_hfni_700/".$reg->imagen8."' >$reg->imagen8</a>",
		   "14"=>"<a href ='../files/acta_hb_700/".$reg->imagen9."' >$reg->imagen9</a>",
		   "15"=>"<a href ='../files/reporte_radiante_post_700/".$reg->imagen10."' >$reg->imagen10</a>",
		   "16"=>"<a href ='../files/comisionamiento_post_700/".$reg->imagen11."' >$reg->imagen11</a>",
		   "17"=>"<a href ='../files/registro_bts_700/".$reg->imagen12."' >$reg->imagen12</a>",
		   "18"=>"<a href ='../files/pruebasvozydatos_700/".$reg->imagen13."' >$reg->imagen13</a>",
		   "19"=>($reg->condicion)?'<span class="label bg-green">Aprobado</span>':
			  '<span class="label bg-yellow">En Proceso</span>'
				
 				);
		}

		$results = array(
			"sEcho"=>1, //Información para el datatables
			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
			"aaData"=>$data);
		echo json_encode($results);
	}

	break;




	case 'listar700documentadorultratel':

		if ($_SESSION['asecones_escuelas_coordinador']==1)
		{
			
		$rspta=$site->listar700ultratel();
 		//Vamos a declarar un array
		 $data= Array();

 		while ($reg=$rspta->fetch_object()){
			$data[]=array(
				"0"=>($reg->condicion)?'<button class="btn btn-warning" onclick="mostrar('.$reg->idsite.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-danger" onclick="desactivar('.$reg->idsite.')"><i class="fa fa-close"></i></button>':
 					'<button class="btn btn-warning" onclick="mostrar('.$reg->idsite.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-primary" onclick="activar('.$reg->idsite.')"><i class="fa fa-check"></i></button>',
				"1"=>$reg->nombre,
				"2"=>$reg->codigo,
				"3"=>$reg->doc,
				"4"=>$reg->observaciones_doc,
				"5"=>$reg->supervisor,
				"6"=>"<a href ='../files/tss_700/".$reg->imagen."' >$reg->imagen</a>",
				"7"=>"<a href ='../files/packinglist_700/".$reg->imagen2."'target='_blank'>$reg->imagen2</a>",
				"8"=>"<a href ='../files/hwcontrol_700/".$reg->imagen3."'target='_blank'>$reg->imagen3</a>",
				"9"=>"<a href ='../files/seriales_700/".$reg->imagen4."' >$reg->imagen4</a>",
				"10"=>"<a href ='../files/comisionamiento_pre_700/".$reg->imagen5."' >$reg->imagen5</a>",
				"11"=>"<a href ='../files/reporte_radiante_pre_700/".$reg->imagen6."' >$reg->imagen6</a>",
				"12"=>"<a href ='../files/acta_hfd_700/".$reg->imagen7."' >$reg->imagen7</a>",
				"13"=>"<a href ='../files/acta_hfni_700/".$reg->imagen8."' >$reg->imagen8</a>",
				"14"=>"<a href ='../files/acta_hb_700/".$reg->imagen9."' >$reg->imagen9</a>",
				"15"=>"<a href ='../files/reporte_radiante_post_700/".$reg->imagen10."' >$reg->imagen10</a>",
				"16"=>"<a href ='../files/comisionamiento_post_700/".$reg->imagen11."' >$reg->imagen11</a>",
				"17"=>"<a href ='../files/registro_bts_700/".$reg->imagen12."' >$reg->imagen12</a>",
				"18"=>"<a href ='../files/pruebasvozydatos_700/".$reg->imagen13."' >$reg->imagen13</a>",
				"19"=>($reg->condicion)?'<span class="label bg-green">Aprobado</span>':
				   '<span class="label bg-yellow">En Proceso</span>'
				);
		 }
		 

 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);

	
     }
	 elseif($_SESSION['asecones_escuelas_documentador']==1){


		$rspta=$site->listar700documentadorultratel($_SESSION["nombre"]);
		//Vamos a declarar un array
		$data= Array();

		while ($reg=$rspta->fetch_object()){
			$data[]=array(
				"0"=>($reg->condicion)?'<button class="btn btn-warning" onclick="mostrar('.$reg->idsite.')"><i class="fa fa-eye"></i></button>':
				'<button class="btn btn-warning" onclick="mostrar('.$reg->idsite.')"><i class="fa fa-eye"></i></button>',
				"1"=>$reg->nombre,
				"2"=>$reg->proyecto,
				"3"=>$reg->codigo,
				"4"=>$reg->supervisor,
				"5"=>"<a href ='../files/tss_700/".$reg->imagen."' >$reg->imagen</a>",
				"6"=>"<a href ='../files/packinglist_700/".$reg->imagen2."'target='_blank'>$reg->imagen2</a>",
				"7"=>"<a href ='../files/hwcontrol_700/".$reg->imagen3."'target='_blank'>$reg->imagen3</a>",
				"8"=>"<a href ='../files/seriales_700/".$reg->imagen4."' >$reg->imagen4</a>",
				"9"=>"<a href ='../files/comisionamiento_pre_700/".$reg->imagen5."' >$reg->imagen5</a>",
				"10"=>"<a href ='../files/reporte_radiante_pre_700/".$reg->imagen6."' >$reg->imagen6</a>",
				"11"=>"<a href ='../files/acta_hfd_700/".$reg->imagen7."' >$reg->imagen7</a>",
				"12"=>"<a href ='../files/acta_hfni_700/".$reg->imagen8."' >$reg->imagen8</a>",
				"13"=>"<a href ='../files/acta_hb_700/".$reg->imagen9."' >$reg->imagen9</a>",
				"14"=>"<a href ='../files/reporte_radiante_post_700/".$reg->imagen10."' >$reg->imagen10</a>",
				"15"=>"<a href ='../files/comisionamiento_post_700/".$reg->imagen11."' >$reg->imagen11</a>",
				"16"=>"<a href ='../files/registro_bts_700/".$reg->imagen12."' >$reg->imagen12</a>",
				"17"=>"<a href ='../files/pruebasvozydatos_700/".$reg->imagen13."' >$reg->imagen13</a>",
				"18"=>($reg->condicion)?'<span class="label bg-green">Aprobado</span>':
				   '<span class="label bg-yellow">En Proceso</span>'
 				);
		}
		

		$results = array(
			"sEcho"=>1, //Información para el datatables
			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
			"aaData"=>$data);
		echo json_encode($results);
	}


	elseif($_SESSION['cliente_ultratel']==1 ){

		$rspta=$site->listar700ultratel();
 		//Vamos a declarar un array
		 $data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(

				"0"=>($reg->condicion)?' <button class="btn btn-danger" onclick="desactivar('.$reg->idsite.')"><i class="fa fa-close"></i></button>':' <button class="btn btn-primary" onclick="activar('.$reg->idsite.')"><i class="fa fa-check"></i></button>',
				"1"=>$reg->nombre,
				"2"=>$reg->codigo,
				"3"=>$reg->doc,
				"4"=>$reg->observaciones_doc,
				"5"=>$reg->supervisor,
				"6"=>"<a href ='../files/tss_700/".$reg->imagen."' >$reg->imagen</a>",
				"7"=>"<a href ='../files/packinglist_700/".$reg->imagen2."'target='_blank'>$reg->imagen2</a>",
				"8"=>"<a href ='../files/hwcontrol_700/".$reg->imagen3."'target='_blank'>$reg->imagen3</a>",
				"9"=>"<a href ='../files/seriales_700/".$reg->imagen4."' >$reg->imagen4</a>",
				"10"=>"<a href ='../files/comisionamiento_pre_700/".$reg->imagen5."' >$reg->imagen5</a>",
				"11"=>"<a href ='../files/reporte_radiante_pre_700/".$reg->imagen6."' >$reg->imagen6</a>",
				"12"=>"<a href ='../files/acta_hfd_700/".$reg->imagen7."' >$reg->imagen7</a>",
				"13"=>"<a href ='../files/acta_hfni_700/".$reg->imagen8."' >$reg->imagen8</a>",
				"14"=>"<a href ='../files/acta_hb_700/".$reg->imagen9."' >$reg->imagen9</a>",
				"15"=>"<a href ='../files/reporte_radiante_post_700/".$reg->imagen10."' >$reg->imagen10</a>",
				"16"=>"<a href ='../files/comisionamiento_post_700/".$reg->imagen11."' >$reg->imagen11</a>",
				"17"=>"<a href ='../files/registro_bts_700/".$reg->imagen12."' >$reg->imagen12</a>",
				"18"=>"<a href ='../files/pruebasvozydatos_700/".$reg->imagen13."' >$reg->imagen13</a>",
				"19"=>($reg->condicion)?'<span class="label bg-green">Aprobado</span>':
				   '<span class="label bg-yellow">En Proceso</span>'
				
 				);
		}

		$results = array(
			"sEcho"=>1, //Información para el datatables
			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
			"aaData"=>$data);
		echo json_encode($results);
	}

	break;



	
	
	case 'listar2600documentador':

		if ($_SESSION['asecones_escuelas_coordinador']==1)
		{

			
		$rspta=$site->listar2600();
 		//Vamos a declarar un array
		 $data= Array();

 		while ($reg=$rspta->fetch_object()){
			$data[]=array(
				"0"=>($reg->condicion)?'<button class="btn btn-warning" onclick="mostrar('.$reg->idsite.')"><i class="fa fa-pencil"></i></button>'.
				' <button class="btn btn-danger" onclick="desactivar('.$reg->idsite.')"><i class="fa fa-close"></i></button>':
				'<button class="btn btn-warning" onclick="mostrar('.$reg->idsite.')"><i class="fa fa-pencil"></i></button>'.
				' <button class="btn btn-primary" onclick="activar('.$reg->idsite.')"><i class="fa fa-check"></i></button>',
				"1"=>$reg->nombre,
				"2"=>$reg->codigo,
				"3"=>$reg->doc,
				"4"=>$reg->observaciones_doc,
				"5"=>$reg->supervisor,
				"6"=>"<a href ='../files/tss_700/".$reg->imagen."' >$reg->imagen</a>",
				"7"=>"<a href ='../files/packinglist_700/".$reg->imagen2."'target='_blank'>$reg->imagen2</a>",
				"8"=>"<a href ='../files/hwcontrol_700/".$reg->imagen3."'target='_blank'>$reg->imagen3</a>",
				"9"=>"<a href ='../files/seriales_700/".$reg->imagen4."' >$reg->imagen4</a>",
				"10"=>"<a href ='../files/comisionamiento_pre_700/".$reg->imagen5."' >$reg->imagen5</a>",
				"11"=>"<a href ='../files/reporte_radiante_pre_700/".$reg->imagen6."' >$reg->imagen6</a>",
				"12"=>"<a href ='../files/acta_hfd_700/".$reg->imagen7."' >$reg->imagen7</a>",
				"13"=>"<a href ='../files/acta_hfni_700/".$reg->imagen8."' >$reg->imagen8</a>",
				"14"=>"<a href ='../files/acta_hb_700/".$reg->imagen9."' >$reg->imagen9</a>",
				"15"=>"<a href ='../files/reporte_radiante_post_700/".$reg->imagen10."' >$reg->imagen10</a>",
				"16"=>"<a href ='../files/comisionamiento_post_700/".$reg->imagen11."' >$reg->imagen11</a>",
				"17"=>"<a href ='../files/registro_bts_700/".$reg->imagen12."' >$reg->imagen12</a>",
				"18"=>"<a href ='../files/pruebasvozydatos_700/".$reg->imagen13."' >$reg->imagen13</a>",
				"19"=>($reg->condicion)?'<span class="label bg-green">Aprobado</span>':
				   '<span class="label bg-yellow">En Proceso</span>'
				);
		 }
		 

 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);

	
     }
	 elseif($_SESSION['asecones_escuelas_documentador']==1){


		$rspta=$site->listar2600documentador($_SESSION["nombre"]);
		//Vamos a declarar un array
		$data= Array();

		while ($reg=$rspta->fetch_object()){
			$data[]=array(
				"0"=>($reg->condicion)?'<button class="btn btn-warning" onclick="mostrar('.$reg->idsite.')"><i class="fa fa-eye"></i></button>':
				'<button class="btn btn-warning" onclick="mostrar('.$reg->idsite.')"><i class="fa fa-eye"></i></button>',
				"1"=>$reg->nombre,
				"2"=>$reg->codigo,
				"3"=>$reg->supervisor,
				"4"=>$reg->observaciones_doc,
				"5"=>"<a href ='../files/tss_700/".$reg->imagen."' >$reg->imagen</a>",
				"6"=>"<a href ='../files/packinglist_700/".$reg->imagen2."'target='_blank'>$reg->imagen2</a>",
				"7"=>"<a href ='../files/hwcontrol_700/".$reg->imagen3."'target='_blank'>$reg->imagen3</a>",
				"8"=>"<a href ='../files/seriales_700/".$reg->imagen4."' >$reg->imagen4</a>",
				"9"=>"<a href ='../files/comisionamiento_pre_700/".$reg->imagen5."' >$reg->imagen5</a>",
				"10"=>"<a href ='../files/reporte_radiante_pre_700/".$reg->imagen6."' >$reg->imagen6</a>",
				"11"=>"<a href ='../files/acta_hfd_700/".$reg->imagen7."' >$reg->imagen7</a>",
				"12"=>"<a href ='../files/acta_hfni_700/".$reg->imagen8."' >$reg->imagen8</a>",
				"13"=>"<a href ='../files/acta_hb_700/".$reg->imagen9."' >$reg->imagen9</a>",
				"14"=>"<a href ='../files/reporte_radiante_post_700/".$reg->imagen10."' >$reg->imagen10</a>",
				"15"=>"<a href ='../files/comisionamiento_post_700/".$reg->imagen11."' >$reg->imagen11</a>",
				"16"=>"<a href ='../files/registro_bts_700/".$reg->imagen12."' >$reg->imagen12</a>",
				"17"=>"<a href ='../files/pruebasvozydatos_700/".$reg->imagen13."' >$reg->imagen13</a>",
				"18"=>($reg->condicion)?'<span class="label bg-green">Aprobado</span>':
				   '<span class="label bg-yellow">En Proceso</span>'
 				);
		}
		

		$results = array(
			"sEcho"=>1, //Información para el datatables
			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
			"aaData"=>$data);
		echo json_encode($results);
	}

	elseif($_SESSION['cliente_ofg']==1){


		
		$rspta=$site->listar2600();
 		//Vamos a declarar un array
		 $data= Array();

 		while ($reg=$rspta->fetch_object()){
			$data[]=array(
				"0"=>($reg->condicion)?' <button class="btn btn-danger" onclick="desactivar('.$reg->idsite.')"><i class="fa fa-close"></i></button>':' <button class="btn btn-primary" onclick="activar('.$reg->idsite.')"><i class="fa fa-check"></i></button>',
				"1"=>$reg->nombre,
				"2"=>$reg->codigo,
				"3"=>$reg->doc,
				"4"=>$reg->observaciones_doc,
				"5"=>$reg->supervisor,
				"6"=>"<a href ='../files/tss_700/".$reg->imagen."' >$reg->imagen</a>",
				"7"=>"<a href ='../files/packinglist_700/".$reg->imagen2."'target='_blank'>$reg->imagen2</a>",
				"8"=>"<a href ='../files/hwcontrol_700/".$reg->imagen3."'target='_blank'>$reg->imagen3</a>",
				"9"=>"<a href ='../files/seriales_700/".$reg->imagen4."' >$reg->imagen4</a>",
				"10"=>"<a href ='../files/comisionamiento_pre_700/".$reg->imagen5."' >$reg->imagen5</a>",
				"11"=>"<a href ='../files/reporte_radiante_pre_700/".$reg->imagen6."' >$reg->imagen6</a>",
				"12"=>"<a href ='../files/acta_hfd_700/".$reg->imagen7."' >$reg->imagen7</a>",
				"13"=>"<a href ='../files/acta_hfni_700/".$reg->imagen8."' >$reg->imagen8</a>",
				"14"=>"<a href ='../files/acta_hb_700/".$reg->imagen9."' >$reg->imagen9</a>",
				"15"=>"<a href ='../files/reporte_radiante_post_700/".$reg->imagen10."' >$reg->imagen10</a>",
				"16"=>"<a href ='../files/comisionamiento_post_700/".$reg->imagen11."' >$reg->imagen11</a>",
				"17"=>"<a href ='../files/registro_bts_700/".$reg->imagen12."' >$reg->imagen12</a>",
				"18"=>"<a href ='../files/pruebasvozydatos_700/".$reg->imagen13."' >$reg->imagen13</a>",
				"19"=>($reg->condicion)?'<span class="label bg-green">Aprobado</span>':
				   '<span class="label bg-yellow">En Proceso</span>'
				);
		 }
		 

 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);

	}

break;
	

	
	case 'listarsite':
		$rspta=$site->listarsite($reg->nombre);
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>($reg->condicion)?'<button class="btn btn-warning" onclick="mostrar('.$reg->idsite.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-danger" onclick="desactivar('.$reg->idsite.')"><i class="fa fa-close"></i></button>':
 					'<button class="btn btn-warning" onclick="mostrar('.$reg->idsite.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-primary" onclick="activar('.$reg->idsite.')"><i class="fa fa-check"></i></button>',
 				"1"=>$reg->nombre,
 				"2"=>$reg->proyecto,
 				"3"=>$reg->regional,
 				"4"=>$reg->lider_cuadrilla,
 				"5"=>$reg->estado_sitio,
 				"6"=>"<img src='../files/sites/".$reg->imagen."' height='50px' width='50px' >",
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

	case 'ventasfechacliente':
		
		$idproyecto=$_REQUEST["idproyecto"];

		$rspta=$site->listarsite($idproyecto);
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>$reg->idsite,
 				"1"=>$reg->nombre,
 				"2"=>$reg->proyecto,
 				"3"=>$reg->regional,
 				"4"=>$reg->lider_cuadrilla,
 				"5"=>$reg->estado_sitio,
 				"6"=>"<img src='../files/sites/".$reg->imagen."' height='50px' width='50px' >",
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


	case 'listartecnico':
		
		$rspta=$site->listartecnico($_SESSION["nombre"]);
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
				 
 				"0"=>($reg->condicion)?'<button class="btn btn-warning" onclick="mostrar('.$reg->idsite.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-danger" onclick="desactivar('.$reg->idsite.')"><i class="fa fa-close"></i></button>':
 					'<button class="btn btn-warning" onclick="mostrar('.$reg->idsite.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-primary" onclick="activar('.$reg->idsite.')"><i class="fa fa-check"></i></button>',
					 '<button class="btn btn-warning" onclick="mostrar('.$reg->idsite.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-info" onclick="activar('.$reg->idsite.')"><i class="fa fa-wrench"></i></button>',
 				"1"=>$reg->nombre,
 				"2"=>$reg->proyecto,
 				"3"=>$reg->regional,
 				"4"=>$reg->lider_cuadrilla,
 				"5"=>$reg->estado_sitio,
 				"6"=>"<img src='../files/sites/".$reg->imagen."' height='50px' width='50px' >",
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

	case 'listarsitiohw':

		$idsite=$_REQUEST["idsite"];
		// $nombre=$_REQUEST["nombre"];

		// $nombres='CBUC Giron San Jorge';
		
		$rspta=$site->listarhw($idsite);
		
 		//Vamos a declarar un array
		 $data= Array();
		 

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>($reg->condicion)?'<button class="btn btn-warning" onclick="mostrar('.$reg->idsite.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-danger" onclick="desactivar('.$reg->idsite.')"><i class="fa fa-close"></i></button>':
 					'<button class="btn btn-warning" onclick="mostrar('.$reg->idsite.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-primary" onclick="activar('.$reg->idsite.')"><i class="fa fa-check"></i></button>',
			    "1"=>$reg->site,
				"2"=>$reg->documento,
 				"3"=>$reg->num_documento,
 				"4"=>$reg->capexx,
 				"5"=>$reg->capex,
 				"6"=>"<img src='../files/womhw/".$reg->imagen."' height='50px' width='50px' >",
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


	case "selectProyecto":
		require_once "../modelos/Proyecto.php";
		$proyecto = new Proyecto();

		$rspta = $proyecto->select();

		while ($reg = $rspta->fetch_object())
				{
					echo '<option value=' . $reg->idproyecto . '>' . $reg->nombre . '</option>';
				}
	break;

	case "selectPersona":
		require_once "../modelos/Persona.php";
		$persona = new Persona();

		$rspta = $persona->select();

		while ($reg = $rspta->fetch_object())
				{
					echo '<option value=' . $reg->idpersona . '>' . $reg->nombre . '</option>';
				}
	break;

	case "selectDocumentador":
		require_once "../modelos/Persona.php";
		$persona = new Persona();

		$rspta = $persona->selectDocumentador();

		while ($reg = $rspta->fetch_object())
				{
					echo '<option value=' . $reg->idpersona . '>' . $reg->nombre . '</option>';
				}
	break;

	case "selectUsuario":
		require_once "../modelos/Usuario.php";
		$usuario = new Usuario();

		$rspta = $usuario->selectUsuario();

		while ($reg = $rspta->fetch_object())
				{
					echo '<option value=' . $reg->idusuario . '>' . $reg->nombre . '</option>';
					
				}
	break;


		case "inputtUsuario":
		require_once "../modelos/Usuario.php";
		$usuario = new Usuario();

		$rspta = $usuario->selectUsuario();

		while ($reg = $rspta->fetch_object())
				{
					echo '<option value=' . $reg->idusuario . '>' . $reg->nombre . '</option>';
					echo'<input type="text" class="form-control" name="nombre" id="' . $reg->nombre . '" maxlength="100" placeholder="Nombre" ';
				}
	break;

	
}
//Fin de las validaciones de acceso
}

else if ($_SESSION['proyecto_asecones']==1 && $_SESSION['asecones_escuelas_documentador']==1  ) 
{

	require_once "../modelos/Site.php";

$site=new Site();



//$idusuario=$_SESSION["idusuario"];
$idusuario=isset($_POST["idusuario"])? limpiarCadena($_POST["idusuario"]):"";
$nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
$idsite=isset($_POST["idsite"])? limpiarCadena($_POST["idsite"]):"";
$idproyecto=isset($_POST["idproyecto"])? limpiarCadena($_POST["idproyecto"]):"";
$codigo=isset($_POST["codigo"])? limpiarCadena($_POST["codigo"]):"";
$nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
$lider_cuadrilla=isset($_POST["lider_cuadrilla"])? limpiarCadena($_POST["lider_cuadrilla"]):"";
$estado_campo=isset($_POST["estado_campo"])? limpiarCadena($_POST["estado_campo"]):"";
$actividad=isset($_POST["actividad"])? limpiarCadena($_POST["actividad"]):"";
$observaciones_campo=isset($_POST["observaciones_campo"])? limpiarCadena($_POST["observaciones_campo"]):"";
$documentador=isset($_POST["documentador"])? limpiarCadena($_POST["documentador"]):"";
$doc_pre=isset($_POST["doc_pre"])? limpiarCadena($_POST["doc_pre"]):"";
$doc_post=isset($_POST["doc_post"])? limpiarCadena($_POST["doc_post"]):"";
$observaciones_doc=isset($_POST["observaciones_doc"])? limpiarCadena($_POST["observaciones_doc"]):"";
$auditor=isset($_POST["auditor"])? limpiarCadena($_POST["auditor"]):"";
$estado_nokia=isset($_POST["estado_nokia"])? limpiarCadena($_POST["estado_nokia"]):"";
$observaciones_nokia=isset($_POST["observaciones_nokia"])? limpiarCadena($_POST["observaciones_nokia"]):"";
$imagen=isset($_POST["imagen"])? limpiarCadena($_POST["imagen"]):"";
$imagen2=isset($_POST["imagen2"])? limpiarCadena($_POST["imagen2"]):"";
$imagen3=isset($_POST["imagen3"])? limpiarCadena($_POST["imagen3"]):"";
$imagen4=isset($_POST["imagen4"])? limpiarCadena($_POST["imagen4"]):"";
$imagen5=isset($_POST["imagen5"])? limpiarCadena($_POST["imagen5"]):"";
$imagen6=isset($_POST["imagen6"])? limpiarCadena($_POST["imagen6"]):"";
$imagen7=isset($_POST["imagen7"])? limpiarCadena($_POST["imagen7"]):"";
$imagen8=isset($_POST["imagen8"])? limpiarCadena($_POST["imagen8"]):"";
$imagen9=isset($_POST["imagen9"])? limpiarCadena($_POST["imagen9"]):"";
$imagen10=isset($_POST["imagen10"])? limpiarCadena($_POST["imagen10"]):"";
$imagen11=isset($_POST["imagen11"])? limpiarCadena($_POST["imagen11"]):"";
$imagen12=isset($_POST["imagen12"])? limpiarCadena($_POST["imagen12"]):"";
$imagen13=isset($_POST["imagen13"])? limpiarCadena($_POST["imagen13"]):"";

switch ($_GET["op"]){


	case 'guardaryeditar700':


		if (!file_exists($_FILES['imagen']['tmp_name']) || !is_uploaded_file($_FILES['imagen']['tmp_name']))
		{
			$imagen=$_POST["imagenactual"];
		}
		else 
		{
			$ext = explode(".", $_FILES["imagen"]["name"]);
			$imagen = $nombre."_TSS"."_".date("d-m-Y").'.' . end($ext);
			move_uploaded_file($_FILES["imagen"]["tmp_name"], "../files/tss_700/" . $imagen);
		}



		if (!file_exists($_FILES['imagen2']['tmp_name']) || !is_uploaded_file($_FILES['imagen2']['tmp_name']))
		{
			$imagen2=$_POST["imagenactual2"];
		
		}
		else 
		{
			$ext = explode(".", $_FILES["imagen2"]["name"]);
			$imagen2 = $nombre."_PACKING_LIST"."_".date("d-m-Y").'.' . end($ext);
			move_uploaded_file($_FILES["imagen2"]["tmp_name"], "../files/packinglist_700/" . $imagen2);

		}
		
		if (!file_exists($_FILES['imagen3']['tmp_name']) || !is_uploaded_file($_FILES['imagen3']['tmp_name']))
		{
			$imagen3=$_POST["imagenactual3"];
		}
		else 
		{
			$ext = explode(".", $_FILES["imagen3"]["name"]);
			$imagen3 = $nombre."_HW_CONTROL"."_".date("d-m-Y").'.' . end($ext);
			move_uploaded_file($_FILES["imagen3"]["tmp_name"], "../files/hwcontrol_700/" . $imagen3);
		}
	

		if (!file_exists($_FILES['imagen4']['tmp_name']) || !is_uploaded_file($_FILES['imagen4']['tmp_name']))
		{
			$imagen4=$_POST["imagenactual4"];
		}
		else 
		{
			$ext = explode(".", $_FILES["imagen4"]["name"]);
			$imagen4 = $nombre."_SERIALES"."_".date("d-m-Y").'.' . end($ext);
			move_uploaded_file($_FILES["imagen4"]["tmp_name"], "../files/seriales_700/" . $imagen4);

		}

		if (!file_exists($_FILES['imagen5']['tmp_name']) || !is_uploaded_file($_FILES['imagen5']['tmp_name']))
		{
			$imagen5=$_POST["imagenactual5"];
		}
		else 
		{
			$ext = explode(".", $_FILES["imagen5"]["name"]);
			$imagen5 = $nombre."_COMISIONAMIENTO_PRE"."_".date("d-m-Y").'.' . end($ext);
			move_uploaded_file($_FILES["imagen5"]["tmp_name"], "../files/comisionamiento_pre_700/" . $imagen5);
		}

		if (!file_exists($_FILES['imagen6']['tmp_name']) || !is_uploaded_file($_FILES['imagen6']['tmp_name']))
		{
			$imagen6=$_POST["imagenactual6"];
		}
		else 
		{
			$ext = explode(".", $_FILES["imagen6"]["name"]);
			$imagen6 = $nombre."_REPORTE_RADIANTE_PRE"."_".date("d-m-Y").'.' . end($ext);
			move_uploaded_file($_FILES["imagen6"]["tmp_name"], "../files/reporte_radiante_pre_700/" . $imagen6);

		}

		if (!file_exists($_FILES['imagen7']['tmp_name']) || !is_uploaded_file($_FILES['imagen7']['tmp_name']))
		{
			$imagen7=$_POST["imagenactual7"];
		}
		else 
		{
			$ext = explode(".", $_FILES["imagen7"]["name"]);
			$imagen7 = $nombre."_ACTA_HFD"."_".date("d-m-Y").'.' . end($ext);
			move_uploaded_file($_FILES["imagen7"]["tmp_name"], "../files/acta_hfd_700/" . $imagen7);
		}

		
		if (!file_exists($_FILES['imagen8']['tmp_name']) || !is_uploaded_file($_FILES['imagen8']['tmp_name']))
		{
			$imagen8=$_POST["imagenactual8"];
		}
		else 
		{
			$ext = explode(".", $_FILES["imagen8"]["name"]);
			$imagen8 = $nombre."_ACTA_HFNI"."_".date("d-m-Y").'.' . end($ext);
			move_uploaded_file($_FILES["imagen8"]["tmp_name"], "../files/acta_hfni_700/" . $imagen8);

		}

		if (!file_exists($_FILES['imagen9']['tmp_name']) || !is_uploaded_file($_FILES['imagen9']['tmp_name']))
		{
			$imagen9=$_POST["imagenactual9"];
		}
		else 
		{
			$ext = explode(".", $_FILES["imagen9"]["name"]);
			$imagen9 = $nombre."_ACTA_HB"."_".date("d-m-Y").'.' . end($ext);
			move_uploaded_file($_FILES["imagen9"]["tmp_name"], "../files/acta_hb_700/" . $imagen9);

		}

		if (!file_exists($_FILES['imagen10']['tmp_name']) || !is_uploaded_file($_FILES['imagen10']['tmp_name']))
		{
			$imagen10=$_POST["imagenactual10"];
		}
		else 
		{
			$ext = explode(".", $_FILES["imagen10"]["name"]);
			$imagen10 = $nombre."_REPORTE_RADIANTE_POST"."_".date("d-m-Y").'.' . end($ext);
			move_uploaded_file($_FILES["imagen10"]["tmp_name"], "../files/reporte_radiante_post_700/" . $imagen10);

		}

		if (!file_exists($_FILES['imagen11']['tmp_name']) || !is_uploaded_file($_FILES['imagen11']['tmp_name']))
		{
			$imagen11=$_POST["imagenactual11"];
		}
		else 
		{
			$ext = explode(".", $_FILES["imagen11"]["name"]);
			$imagen11 = $nombre."_COMISIONAMIENTO_POST"."_".date("d-m-Y").'.' . end($ext);
			move_uploaded_file($_FILES["imagen11"]["tmp_name"], "../files/comisionamiento_post_700/" . $imagen11);

		}

		if (!file_exists($_FILES['imagen12']['tmp_name']) || !is_uploaded_file($_FILES['imagen12']['tmp_name']))
		{
			$imagen12=$_POST["imagenactual12"];
		}
		else 
		{
			$ext = explode(".", $_FILES["imagen12"]["name"]);
			$imagen12 = $nombre."_REGISTRO_BTS"."_".date("d-m-Y").'.' . end($ext);
			move_uploaded_file($_FILES["imagen12"]["tmp_name"], "../files/registro_bts_700/" . $imagen12);
		}

		if (!file_exists($_FILES['imagen13']['tmp_name']) || !is_uploaded_file($_FILES['imagen13']['tmp_name']))
		{
			$imagen13=$_POST["imagenactual13"];
		}
		else 
		{
			$ext = explode(".", $_FILES["imagen13"]["name"]);
			$imagen13 = $nombre."_PRUEBAS_VOZ_Y_DATOS"."_".date("d-m-Y").'.' . end($ext);
			move_uploaded_file($_FILES["imagen13"]["tmp_name"], "../files/pruebasvozydatos_700/" . $imagen13);
		}



		if (empty($idsite)){
			$rspta=$site->insertar7002($idproyecto,$codigo,$nombre,$lider_cuadrilla,$estado_campo,$actividad,$observaciones_campo,$doc_pre,$doc_post,$observaciones_doc,$auditor,$estado_nokia,$observaciones_nokia,$imagen,$imagen2,$imagen3,$imagen4,$imagen5,$imagen6,$imagen7,$imagen8,$imagen9,$imagen10,$imagen11,$imagen12,$imagen13);
			echo $rspta ? "Sitio registrado" : "Sitio no se pudo registrar";
		}
		else {
			$rspta=$site->editar7002($idsite,$doc_pre,$doc_post,$observaciones_campo,$observaciones_doc,$imagen,$imagen2,$imagen3,$imagen4,$imagen5,$imagen6,$imagen7,$imagen8,$imagen9,$imagen10,$imagen11,$imagen12,$imagen13);
			echo $rspta ? "Sitio actualizado" : "Sitio no se pudo actualizar";
		}

		break;



		case 'listar700documentador':
	
			$rspta=$site->listar700documentador($_SESSION["nombre"]);
			//Vamos a declarar un array
			$data= Array();
	
			while ($reg=$rspta->fetch_object()){
				$data[]=array(
					"0"=>($reg->condicion)?'<button class="btn btn-warning" onclick="mostrar('.$reg->idsite.')"><i class="fa fa-eye"></i></button>':
					'<button class="btn btn-warning" onclick="mostrar('.$reg->idsite.')"><i class="fa fa-eye"></i></button>',
					"1"=>$reg->nombre,
					"2"=>$reg->proyecto,
					"3"=>$reg->codigo,
					"4"=>"<u class='text-danger'><h5 class='text-danger'>OBSERVACION HARDWARE:</h5></u>".$reg->observaciones_campo,
					"5"=>"<u class='text-danger'><h5 class='text-danger'>OBSERVACION DOCUMENTACION:</h5></u>".$reg->observaciones_doc,
					"6"=>"<a href ='../files/tss_700/".$reg->imagen."' >$reg->imagen</a>",
					"7"=>"<a href ='../files/packinglist_700/".$reg->imagen2."'target='_blank'>$reg->imagen2</a>",
					"8"=>"<a href ='../files/hwcontrol_700/".$reg->imagen3."'target='_blank'>$reg->imagen3</a>",
					"9"=>"<a href ='../files/seriales_700/".$reg->imagen4."' >$reg->imagen4</a>",
					"10"=>"<a href ='../files/comisionamiento_pre_700/".$reg->imagen5."' >$reg->imagen5</a>",
					"11"=>"<a href ='../files/reporte_radiante_pre_700/".$reg->imagen6."' >$reg->imagen6</a>",
					"12"=>"<a href ='../files/acta_hfd_700/".$reg->imagen7."' >$reg->imagen7</a>",
					"13"=>"<a href ='../files/acta_hfni_700/".$reg->imagen8."' >$reg->imagen8</a>",
					"14"=>"<a href ='../files/acta_hb_700/".$reg->imagen9."' >$reg->imagen9</a>",
					"15"=>"<a href ='../files/reporte_radiante_post_700/".$reg->imagen10."' >$reg->imagen10</a>",
					"16"=>"<a href ='../files/comisionamiento_post_700/".$reg->imagen11."' >$reg->imagen11</a>",
					"17"=>"<a href ='../files/registro_bts_700/".$reg->imagen12."' >$reg->imagen12</a>",
					"18"=>"<a href ='../files/pruebasvozydatos_700/".$reg->imagen13."' >$reg->imagen13</a>",
					"19"=>($reg->condicion)?'<span class="label bg-green">Aprobado</span>':
					   '<span class="label bg-yellow">En Proceso</span>'
					 );
			}
			
	
			$results = array(
				"sEcho"=>1, //Información para el datatables
				"iTotalRecords"=>count($data), //enviamos el total registros al datatable
				"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
				"aaData"=>$data);
			echo json_encode($results);

			break;

			case 'listar700documentadorultratel':
	
				$rspta=$site->listar700documentadorultratel($_SESSION["nombre"]);
				//Vamos a declarar un array
				$data= Array();
		
				while ($reg=$rspta->fetch_object()){
					$data[]=array(
						"0"=>($reg->condicion)?'<button class="btn btn-warning" onclick="mostrar('.$reg->idsite.')"><i class="fa fa-eye"></i></button>':
						'<button class="btn btn-warning" onclick="mostrar('.$reg->idsite.')"><i class="fa fa-eye"></i></button>',
						"1"=>$reg->nombre,
						"2"=>$reg->codigo,
						"3"=>$reg->supervisor,
						"4"=>$reg->observaciones_doc,
						"5"=>"<a href ='../files/tss_700/".$reg->imagen."' >$reg->imagen</a>",
						"6"=>"<a href ='../files/packinglist_700/".$reg->imagen2."'target='_blank'>$reg->imagen2</a>",
						"7"=>"<a href ='../files/hwcontrol_700/".$reg->imagen3."'target='_blank'>$reg->imagen3</a>",
						"8"=>"<a href ='../files/seriales_700/".$reg->imagen4."' >$reg->imagen4</a>",
						"9"=>"<a href ='../files/comisionamiento_pre_700/".$reg->imagen5."' >$reg->imagen5</a>",
						"10"=>"<a href ='../files/reporte_radiante_pre_700/".$reg->imagen6."' >$reg->imagen6</a>",
						"11"=>"<a href ='../files/acta_hfd_700/".$reg->imagen7."' >$reg->imagen7</a>",
						"12"=>"<a href ='../files/acta_hfni_700/".$reg->imagen8."' >$reg->imagen8</a>",
						"13"=>"<a href ='../files/acta_hb_700/".$reg->imagen9."' >$reg->imagen9</a>",
						"14"=>"<a href ='../files/reporte_radiante_post_700/".$reg->imagen10."' >$reg->imagen10</a>",
						"15"=>"<a href ='../files/comisionamiento_post_700/".$reg->imagen11."' >$reg->imagen11</a>",
						"16"=>"<a href ='../files/registro_bts_700/".$reg->imagen12."' >$reg->imagen12</a>",
						"17"=>"<a href ='../files/pruebasvozydatos_700/".$reg->imagen13."' >$reg->imagen13</a>",
						"18"=>($reg->condicion)?'<span class="label bg-green">Aprobado</span>':
						   '<span class="label bg-yellow">En Proceso</span>'
						 );
				}
				
		
				$results = array(
					"sEcho"=>1, //Información para el datatables
					"iTotalRecords"=>count($data), //enviamos el total registros al datatable
					"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
					"aaData"=>$data);
				echo json_encode($results);
	
				break;

			
			case 'listar2600documentador':

		
				$rspta=$site->listar2600documentador($_SESSION["nombre"]);
				//Vamos a declarar un array
				$data= Array();
		
				while ($reg=$rspta->fetch_object()){
					$data[]=array(
						"0"=>($reg->condicion)?'<button class="btn btn-warning" onclick="mostrar('.$reg->idsite.')"><i class="fa fa-eye"></i></button>':
						'<button class="btn btn-warning" onclick="mostrar('.$reg->idsite.')"><i class="fa fa-eye"></i></button>',
						"1"=>$reg->nombre,
						"2"=>$reg->codigo,
						"3"=>$reg->supervisor,
						"4"=>$reg->observaciones_doc,
						"5"=>"<a href ='../files/tss_700/".$reg->imagen."' >$reg->imagen</a>",
						"6"=>"<a href ='../files/packinglist_700/".$reg->imagen2."'target='_blank'>$reg->imagen2</a>",
						"7"=>"<a href ='../files/hwcontrol_700/".$reg->imagen3."'target='_blank'>$reg->imagen3</a>",
						"8"=>"<a href ='../files/seriales_700/".$reg->imagen4."' >$reg->imagen4</a>",
						"9"=>"<a href ='../files/comisionamiento_pre_700/".$reg->imagen5."' >$reg->imagen5</a>",
						"10"=>"<a href ='../files/reporte_radiante_pre_700/".$reg->imagen6."' >$reg->imagen6</a>",
						"11"=>"<a href ='../files/acta_hfd_700/".$reg->imagen7."' >$reg->imagen7</a>",
						"12"=>"<a href ='../files/acta_hfni_700/".$reg->imagen8."' >$reg->imagen8</a>",
						"13"=>"<a href ='../files/acta_hb_700/".$reg->imagen9."' >$reg->imagen9</a>",
						"14"=>"<a href ='../files/reporte_radiante_post_700/".$reg->imagen10."' >$reg->imagen10</a>",
						"15"=>"<a href ='../files/comisionamiento_post_700/".$reg->imagen11."' >$reg->imagen11</a>",
						"16"=>"<a href ='../files/registro_bts_700/".$reg->imagen12."' >$reg->imagen12</a>",
						"17"=>"<a href ='../files/pruebasvozydatos_700/".$reg->imagen13."' >$reg->imagen13</a>",
						"18"=>($reg->condicion)?'<span class="label bg-green">Aprobado</span>':
						   '<span class="label bg-yellow">En Proceso</span>'
						 );
				}
				
		
				$results = array(
					"sEcho"=>1, //Información para el datatables
					"iTotalRecords"=>count($data), //enviamos el total registros al datatable
					"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
					"aaData"=>$data);
				echo json_encode($results);
			
		
		break;

			case 'mostrar':
				$rspta=$site->mostrar($idsite);
				 //Codificar el resultado utilizando json
				 echo json_encode($rspta);
			break;

			case "selectProyecto":
				require_once "../modelos/Proyecto.php";
				$proyecto = new Proyecto();
		
				$rspta = $proyecto->select();
		
				while ($reg = $rspta->fetch_object())
						{
							echo '<option value=' . $reg->idproyecto . '>' . $reg->nombre . '</option>';
						}
			break;
		
			case "selectPersona":
				require_once "../modelos/Persona.php";
				$persona = new Persona();
		
				$rspta = $persona->select();
		
				while ($reg = $rspta->fetch_object())
						{
							echo '<option value=' . $reg->idpersona . '>' . $reg->nombre . '</option>';
						}
			break;
		
			case "selectDocumentador":
				require_once "../modelos/Persona.php";
				$persona = new Persona();
		
				$rspta = $persona->selectDocumentador();
		
				while ($reg = $rspta->fetch_object())
						{
							echo '<option value=' . $reg->idpersona . '>' . $reg->nombre . '</option>';
						}
			break;
		
			case "selectUsuario":
				require_once "../modelos/Usuario.php";
				$usuario = new Usuario();
		
				$rspta = $usuario->selectUsuario();
		
				while ($reg = $rspta->fetch_object())
						{
							echo '<option value=' . $reg->idusuario . '>' . $reg->nombre . '</option>';
							
						}
			break;
		
		
				case "inputtUsuario":
				require_once "../modelos/Usuario.php";
				$usuario = new Usuario();
		
				$rspta = $usuario->selectUsuario();
		
				while ($reg = $rspta->fetch_object())
						{
							echo '<option value=' . $reg->idusuario . '>' . $reg->nombre . '</option>';
							echo'<input type="text" class="form-control" name="nombre" id="' . $reg->nombre . '" maxlength="100" placeholder="Nombre" ';
						}
			break;

}

}

else

{
  require 'noacceso.php';
}
}
ob_end_flush();
?>