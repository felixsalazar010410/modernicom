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
if ($_SESSION['proyecto_asecones']==1)
{
require_once "../modelos/Base_escuelas.php";

$base_escuelas=new Base_escuelas();

$id=isset($_POST["id"])? limpiarCadena($_POST["id"]):"";
$consecutivo=isset($_POST["consecutivo"])? limpiarCadena($_POST["consecutivo"]):"";
$id_beneficiario=isset($_POST["id_beneficiario"])? limpiarCadena($_POST["id_beneficiario"]):"";
$matricula=isset($_POST["matricula"])? limpiarCadena($_POST["matricula"]):"";
$dane_departamento=isset($_POST["dane_departamento"])? limpiarCadena($_POST["dane_departamento"]):"";
$departamento=isset($_POST["departamento"])? limpiarCadena($_POST["departamento"]):"";
$dane_municipio=isset($_POST["dane_municipio"])? limpiarCadena($_POST["dane_municipio"]):"";
$municipio=isset($_POST["municipio"])? limpiarCadena($_POST["municipio"]):"";
$regional=isset($_POST["regional"])? limpiarCadena($_POST["regional"]):"";
$contro_poblado=isset($_POST["contro_poblado"])? limpiarCadena($_POST["contro_poblado"]):"";
$dane_institucion=isset($_POST["dane_institucion"])? limpiarCadena($_POST["dane_institucion"]):"";
$institucion=isset($_POST["institucion"])? limpiarCadena($_POST["institucion"]):"";
$dane_sede=isset($_POST["dane_sede"])? limpiarCadena($_POST["dane_sede"]):"";
$sede=isset($_POST["sede"])? limpiarCadena($_POST["sede"]):"";
$tipo_sitio=isset($_POST["tipo_sitio"])? limpiarCadena($_POST["tipo_sitio"]):"";
$detalle_sitio=isset($_POST["detalle_sitio"])? limpiarCadena($_POST["detalle_sitio"]):"";
$emergencia=isset($_POST["emergencia"])? limpiarCadena($_POST["emergencia"]):"";
$region=isset($_POST["region"])? limpiarCadena($_POST["region"]):"";
$latitud=isset($_POST["latitud"])? limpiarCadena($_POST["latitud"]):"";
$longitud=isset($_POST["longitud"])? limpiarCadena($_POST["longitud"]):"";


switch ($_GET["op"]){
	case 'guardaryeditar':
		if (empty($id)){
			$rspta=$base_escuelas->insertar($consecutivo,$id_beneficiario,$matricula,$dane_departamento,$departamento,$dane_municipio,$municipio,$regional,$centro_poblado,$dane_institucion,$institucion,$dane_sede,$sede,$tipo_sitio,$detalle_sitio,$emergencia,$region,$latitud,$longitud);
			echo $rspta ? "Categoría registrada" : "Categoría no se pudo registrar";
		}
		else {
			$rspta=$base_escuelas->editar($id,$consecutivo,$id_beneficiario,$matricula,$dane_departamento,$departamento,$dane_municipio,$municipio,$regional,$centro_poblado,$dane_institucion,$institucion,$dane_sede,$sede,$tipo_sitio,$detalle_sitio,$emergencia,$region,$latitud,$longitud);
			echo $rspta ? "Categoría actualizada" : "Categoría no se pudo actualizar";
		}
	break;

	case 'mostrar':
		$rspta=$base_escuelas->mostrar($id);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

	case 'listar':
		$rspta=$base_escuelas->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>$reg->consecutivo,
 				"1"=>$reg->id_beneficiario,
 				"2"=>$reg->matricula,
 				"3"=>$reg->dane_departamento,
 				"4"=>$reg->departamento,
 				"5"=>$reg->dane_municipio,
 				"6"=>$reg->municipio,
 				"7"=>$reg->regional,
 				"8"=>$reg->centro_poblado,
 				"9"=>$reg->dane_institucion,
 				"10"=>$reg->institucion,
 				"11"=>$reg->dane_sede,
 				"12"=>$reg->sede,
 				"13"=>$reg->tipo_sitio,
 				"14"=>$reg->detalle_sitio,
 				"15"=>$reg->emergencia,
 				"16"=>$reg->region,
 				"17"=>$reg->latitud,
 				"18"=>$reg->longitud,
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