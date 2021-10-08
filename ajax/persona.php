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
if ($_SESSION['ventas']==1 || $_SESSION['compras']==1)
{
require_once "../modelos/Persona.php";

$persona=new Persona();

$idpersona=isset($_POST["idpersona"])? limpiarCadena($_POST["idpersona"]):"";
$tipo_persona=isset($_POST["tipo_persona"])? limpiarCadena($_POST["tipo_persona"]):"";
$nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
$tipo_documento=isset($_POST["tipo_documento"])? limpiarCadena($_POST["tipo_documento"]):"";
$num_documento=isset($_POST["num_documento"])? limpiarCadena($_POST["num_documento"]):"";
$fecha_expedicion=isset($_POST["fecha_expedicion"])? limpiarCadena($_POST["fecha_expedicion"]):"";
$genero=isset($_POST["genero"])? limpiarCadena($_POST["genero"]):"";
$ciudad_expedicion=isset($_POST["ciudad_expedicion"])? limpiarCadena($_POST["ciudad_expedicion"]):"";
$fecha_nacimiento=isset($_POST["fecha_nacimiento"])? limpiarCadena($_POST["fecha_nacimiento"]):"";
$ciudad=isset($_POST["ciudad"])? limpiarCadena($_POST["ciudad"]):"";
$pais=isset($_POST["pais"])? limpiarCadena($_POST["pais"]):"";
$numero_cuenta=isset($_POST["numero_cuenta"])? limpiarCadena($_POST["numero_cuenta"]):"";
$tipo_cuenta=isset($_POST["tipo_cuenta"])? limpiarCadena($_POST["tipo_cuenta"]):"";
$banco=isset($_POST["banco"])? limpiarCadena($_POST["banco"]):"";
$direccion=isset($_POST["direccion"])? limpiarCadena($_POST["direccion"]):"";
$telefono=isset($_POST["telefono"])? limpiarCadena($_POST["telefono"]):"";
$celular=isset($_POST["celular"])? limpiarCadena($_POST["celular"]):"";
$email=isset($_POST["email"])? limpiarCadena($_POST["email"]):"";
$email_empresarial=isset($_POST["email_empresarial"])? limpiarCadena($_POST["email_empresarial"]):"";
$cargo=isset($_POST["cargo"])? limpiarCadena($_POST["cargo"]):"";
$imagen=isset($_POST["imagen"])? limpiarCadena($_POST["imagen"]):"";
$empresa=isset($_POST["empresa"])? limpiarCadena($_POST["empresa"]):"";
$zona=isset($_POST["zona"])? limpiarCadena($_POST["zona"]):"";
$fecha_inicio=isset($_POST["fecha_inicio"])? limpiarCadena($_POST["fecha_inicio"]):"";
$fecha_fin=isset($_POST["fecha_fin"])? limpiarCadena($_POST["fecha_fin"]):"";
$estado=isset($_POST["estado"])? limpiarCadena($_POST["estado"]):"";

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
				move_uploaded_file($_FILES["imagen"]["tmp_name"], "../files/personal/" . $imagen);
			}
		}

		if (empty($idpersona)){
			$rspta=$persona->insertar($tipo_persona,$nombre,$tipo_documento,$num_documento,$fecha_expedicion,$genero,$ciudad_expedicion,$fecha_nacimiento,$ciudad,$pais,$numero_cuenta,$tipo_cuenta,$banco,$direccion,$telefono,$celular,$email,$email_empresarial,$cargo,$imagen,$empresa,$zona,$fecha_inicio,$fecha_fin);
			echo $rspta ? "Persona registrada" : "Persona no se pudo registrar";
		}
		else {
			$rspta=$persona->editar($idpersona,$tipo_persona,$nombre,$tipo_documento,$num_documento,$fecha_expedicion,$genero,$ciudad_expedicion,$fecha_nacimiento,$ciudad,$pais,$numero_cuenta,$tipo_cuenta,$banco,$direccion,$telefono,$celular,$email,$email_empresarial,$cargo,$imagen,$empresa,$zona,$fecha_inicio,$fecha_fin);
			echo $rspta ? "Persona actualizada" : "Persona no se pudo actualizar";
		}
	break;


	case 'desactivar':
		$rspta=$persona->desactivar($idpersona);
 		echo $rspta ? "Pesona Inactivo" : "Persona no se puede Inavilitar";
	break;

	case 'activar':
		$rspta=$persona->activar($idpersona);
 		echo $rspta ? "Pesona Activo" : "Persona no se puede Activar";
	break;

	case 'eliminar':
		$rspta=$persona->eliminar($idpersona);
 		echo $rspta ? "Persona eliminada" : "Persona no se puede eliminar";
	break;

	case 'mostrar':
		$rspta=$persona->mostrar($idpersona);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

	case 'listarp':
		$rspta=$persona->listarp();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
				"0"=>($reg->estado)?'<button class="btn btn-warning" onclick="mostrar('.$reg->idpersona.')"><i class="fa fa-pencil"></i></button>'.
				' <button class="btn btn-danger" onclick="desactivar('.$reg->idpersona.')"><i class="fa fa-close"></i></button>':
				'<button class="btn btn-warning" onclick="mostrar('.$reg->idpersona.')"><i class="fa fa-pencil"></i></button>'.
				' <button class="btn btn-primary" onclick="activar('.$reg->idpersona.')"><i class="fa fa-check"></i></button>',
			   "1"=>"<img src='../files/personal/".$reg->imagen."' height='50px' width='50px' >",
				"2"=>$reg->nombre,
				"3"=>$reg->tipo_documento,
				"4"=>$reg->num_documento,
				"5"=>$reg->telefono,
			   "6"=>$reg->email,
			   "7"=>$reg->cargo,
			   "8"=>($reg->estado)?'<span class="label bg-green">Activo</span>':
			   '<span class="label bg-red">Inactivo</span>'
				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);

	break;

	case 'listarc':
		$rspta=$persona->listarc();
 		//Vamos a declarar un array
		 $data= Array();
		 
		

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>($reg->estado)?'<button class="btn btn-warning" onclick="mostrar('.$reg->idpersona.')"><i class="fa fa-pencil"></i></button>'.
				 ' <button class="btn btn-danger" onclick="desactivar('.$reg->idpersona.')"><i class="fa fa-close"></i></button>':
				 '<button class="btn btn-warning" onclick="mostrar('.$reg->idpersona.')"><i class="fa fa-pencil"></i></button>'.
				 ' <button class="btn btn-primary" onclick="activar('.$reg->idpersona.')"><i class="fa fa-check"></i></button>',
				"1"=>"<img src='../files/personal/".$reg->imagen."' height='50px' width='50px' >",
 				"2"=>$reg->nombre,
 				"3"=>$reg->tipo_documento,
 				"4"=>$reg->num_documento,
 				"5"=>$reg->telefono,
				"6"=>$reg->email,
				"7"=>$reg->cargo,
				"8"=>($reg->estado)?'<span class="label bg-green">Activo</span>':
				'<span class="label bg-red">Inactivo</span>'
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