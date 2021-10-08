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
if ($_SESSION['ventas']==1)
{
require_once "../modelos/Ventaherramienta.php";

$ventaherramienta=new Ventaherramienta();

$idventa=isset($_POST["idventa"])? limpiarCadena($_POST["idventa"]):"";
$idpersona=isset($_POST["idpersona"])? limpiarCadena($_POST["idpersona"]):"";
$idusuario=$_SESSION["idusuario"];
$tipo_comprobante=isset($_POST["tipo_comprobante"])? limpiarCadena($_POST["tipo_comprobante"]):"";
$solicitante=isset($_POST["solicitante"])? limpiarCadena($_POST["solicitante"]):"";
$fecha_solicitud=isset($_POST["fecha_solicitud"])? limpiarCadena($_POST["fecha_solicitud"]):"";
$fecha_hora=isset($_POST["fecha_hora"])? limpiarCadena($_POST["fecha_hora"]):"";
$comentario=isset($_POST["comentario"])? limpiarCadena($_POST["comentario"]):"";
$total_venta=isset($_POST["total_venta"])? limpiarCadena($_POST["total_venta"]):"";



switch ($_GET["op"]){
	case 'guardaryeditar':
		if (empty($idventa)){
			$rspta=$ventaherramienta->insertar($idpersona,$idusuario,$tipo_comprobante,$solicitante,$fecha_solicitud,$fecha_hora,$comentario,$total_venta,$_POST["idarticulo"],$_POST["cantidad"],0,0);
			echo $rspta ? "Salida registrada" : "No se pudieron registrar todos los datos de la Salida";
		}
		else {
		}
	break;

	case 'anular':
		$rspta=$ventaherramienta->anular($idventa);
 		echo $rspta ? "Salida anulada" : "Salida no se puede anular";
	break;

	case 'mostrar':
		$rspta=$ventaherramienta->mostrar($idventa);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

	case 'listarDetalle':
		//Recibimos el idingreso
		$id=$_GET['id'];

		$rspta = $ventaherramienta->listarDetalle($id);
		$total=0;
		echo '<thead style="background-color:#A9D0F5">
                                    <th>Opciones</th>
                                    <th>Artículo</th>
                                    <th>Cantidad</th>
                                    <th>Subtotal</th>
                                </thead>';

		while ($reg = $rspta->fetch_object())
				{
					echo '<tr class="filas"><td></td><td>'.$reg->nombre.'</td><td>'.$reg->cantidad.'</td><td>'.$reg->subtotal.'</td></tr>';
					$total=$total+($reg->cantidad);
				}
		echo '<tfoot>
                                    <th>TOTAL</th>
                                    <th></th>
                                    <th></th>
                                    <th><h4 id="total">Σ/.'.$total.'</h4><input type="hidden" name="total_venta" id="total_venta"></th> 
                                </tfoot>';
	break;

	case 'listar':
		$rspta=$ventaherramienta->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			if($reg->tipo_comprobante=='Ticket'){
 				$url='../reportes/exTicket.php?id=';
 			}
 			else{
 				$url='../reportes/exFacturaHerramienta.php?id=';
 			}

 			$data[]=array(
 				"0"=>(($reg->estado=='Aceptado')?'<button class="btn btn-warning" onclick="mostrar('.$reg->idventa.')"><i class="fa fa-eye"></i></button>'.
 					' <button class="btn btn-danger" onclick="anular('.$reg->idventa.')"><i class="fa fa-close"></i></button>':
 					'<button class="btn btn-warning" onclick="mostrar('.$reg->idventa.')"><i class="fa fa-eye"></i></button>').
 					'<a target="_blank" href="'.$url.$reg->idventa.'"> <button class="btn btn-info"><i class="fa fa-file"></i></button></a>',
				"1"=>$reg->fecha_solicitud,
			    "2"=>$reg->solicitante,
				"3"=>$reg->total_venta,
				"4"=>$reg->usuario,
				"5"=>$reg->fecha,
 				"6"=>($reg->estado=='Aceptado')?'<span class="label bg-green">Aceptado</span>':
 				'<span class="label bg-red">Anulado</span>'
 				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);

	break;

	case 'selectPersona':

		require_once "../modelos/Persona.php";
		$persona = new Persona();
		$rspta= $persona->selectPersona();

		while ($reg= $rspta->fetch_object())
				{
				echo '<option value=' . $reg->idpersona . '>' . $reg->nombre . '</option>';
				}
				
			
	break;

	case 'listarArticulosVenta':
		require_once "../modelos/Herramienta.php";
		$herramienta=new Herramienta();

		$rspta=$herramienta->listarActivossalida_herramienta();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>'<button class="btn btn-warning" onclick="agregarDetalle('.$reg->idherramienta.',\''.$reg->nombre.'\')"><span class="fa fa-plus"></span></button>',
 				// "1"=>"<img src='../files/herramientas/".$reg->imagen."' height='50px' width='50px' >",
 				"1"=>$reg->nombre,
 				"2"=>$reg->categoria_herramienta,
 				"3"=>$reg->stock,
 				"4"=>$reg->descripcion,
				"5"=>"<img src='../files/herramientas/".$reg->imagen."' height='50px' width='50px' >"
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