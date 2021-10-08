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
require_once "../modelos/herramienta.php";

$herramienta=new herramienta();

$idherramienta=isset($_POST["idherramienta"])? limpiarCadena($_POST["idherramienta"]):"";
$idcategoria_herramienta=isset($_POST["idcategoria_herramienta"])? limpiarCadena($_POST["idcategoria_herramienta"]):"";
$codigo=isset($_POST["codigo"])? limpiarCadena($_POST["codigo"]):"";
$nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
$stock=isset($_POST["stock"])? limpiarCadena($_POST["stock"]):"";
$descripcion=isset($_POST["descripcion"])? limpiarCadena($_POST["descripcion"]):"";
$observacion=isset($_POST["observacion"])? limpiarCadena($_POST["observacion"]):"";
$imagen=isset($_POST["imagen"])? limpiarCadena($_POST["imagen"]):"";

switch ($_GET["op"]){
	case 'guardaryeditar':
		if (!file_exists($_FILES['imagen']['tmp_name']) || !is_uploaded_file($_FILES['imagen']['tmp_name']))
		{
			$imagen=$_POST["imagenactual"];
		}
		else 
		{
			// $ext = explode(".", $_FILES["imagen"]["name"]);
			// if ($_FILES['imagen']['type'] == "image/jpg" || $_FILES['imagen']['type'] == "image/jpeg" || $_FILES['imagen']['type'] == "image/png")
			// {
			// 	$imagen = round(microtime(true)) . '.' . end($ext);
			// 	move_uploaded_file($_FILES["imagen"]["tmp_name"], "../files/herramientas/" . $imagen);
			// }
			$ext = explode(".", $_FILES["imagen"]["name"]);
			$imagen = round(microtime(true)) . '.' . end($ext);
			move_uploaded_file($_FILES["imagen"]["tmp_name"], "../files/herramientas/" . $imagen);


			// $ext = explode(".", $_FILES["imagen"]["name"]);
			// $imagen = $idherramienta."_".$nombre.".". end($ext);
			// move_uploaded_file($_FILES["imagen"]["tmp_name"], "../files/herramientas/" . $imagen);
		}
		if (empty($idherramienta)){
			$rspta=$herramienta->insertar($idcategoria_herramienta,$codigo,$nombre,$stock,$descripcion,$observacion,$imagen);
			echo $rspta ? "Artículo registrado" : "Artículo no se pudo registrar";
		}
		else {
			$rspta=$herramienta->editar($idherramienta,$idcategoria_herramienta,$codigo,$nombre,$stock,$descripcion,$observacion,$imagen);
			echo $rspta ? "Artículo actualizado" : "Artículo no se pudo actualizar";
		}
	break;

	case 'desactivar':
		$rspta=$herramienta->desactivar($idherramienta);
 		echo $rspta ? "Artículo Desactivado" : "Artículo no se puede desactivar";
	break;

	case 'activar':
		$rspta=$herramienta->activar($idherramienta);
 		echo $rspta ? "Artículo activado" : "Artículo no se puede activar";
	break;

	case 'mostrar':
		$rspta=$herramienta->mostrar($idherramienta);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

	case 'listar':
		$rspta=$herramienta->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>($reg->condicion)?'<button class="btn btn-warning" onclick="mostrar('.$reg->idherramienta.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-danger" onclick="desactivar('.$reg->idherramienta.')"><i class="fa fa-close"></i></button>':
 					'<button class="btn btn-warning" onclick="mostrar('.$reg->idherramienta.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-primary" onclick="activar('.$reg->idherramienta.')"><i class="fa fa-check"></i></button>',
				"1"=>"<img src='../files/herramientas/".$reg->imagen."' height='50px' width='50px' >", 
				"2"=>$reg->categoria_herramienta,
				"3"=>$reg->nombre,
				"4"=>$reg->codigo,
 				"5"=>$reg->stock,
 				
 				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);

	break;

	case "selectcategoria_herramienta":
		
		require_once "../modelos/categoria_Herramienta.php";
		$categoria_herramienta = new categoria_Herramienta();

		$rspta = $categoria_herramienta->select();

		while ($reg = $rspta->fetch_object())
				{
					echo '<option value=' . $reg->idcategoria_herramienta. '>' . $reg->nombre . '</option>';
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