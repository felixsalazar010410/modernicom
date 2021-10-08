var tabla;

//Función que se ejecuta al inicio
function init(){
	mostrarform(false);
	listar();

	$("#formulario").on("submit",function(e)
	{
		guardaryeditar(e);	
	});

	//Cargamos los items al select Persona
	$.post("../ajax/venta.php?op=selectPersona", function(r){
		$("#idpersona").html(r);
		$('#idpersona').selectpicker('refresh');
    });
	//Cargamos los items al select cliente
	$.post("../ajax/venta.php?op=selectCliente2", function(r){
	            $("#idsite").html(r);
	            $('#idsite').selectpicker('refresh');
	});

	

	$('#mAlmacen').addClass("treeview active");
    $('#lArticulos').addClass("active");
	$('#pSalida').tab('show')
}

//Función limpiar
function limpiar()
{
	$("#idsite").val("");
	$("#idpersona").val("");
	$("#cliente").val("");
	$("#solicitante").val("");
	$("#feha_solicitud").val("");
	$("#proyecto").val("");
	$("#serie_comprobante").val("");
	$("#num_comprobante").val("");
	$("#adicional").val("");
	$("#comentario").val("");
	$("#total_venta").val("");
	$(".filas").remove();
	$("#total").html("0");

	//Obtenemos la fecha actual
	var now = new Date();
	var day = ("0" + now.getDate()).slice(-2);
	var month = ("0" + (now.getMonth() + 1)).slice(-2);
	var today = now.getFullYear()+"-"+(month)+"-"+(day) ;
    $('#fecha_hora').val(today);

    //Marcamos el primer tipo_documento
    $("#tipo_comprobante").val("Boleta");
	$("#tipo_comprobante").selectpicker('refresh');
}

//Función mostrar formulario
function mostrarform(flag)
{
	//limpiar();
	if (flag)
	{
		$("#listadoregistros").hide();
		$("#formularioregistros").show();
		//$("#btnGuardar").prop("disabled",false);
		$("#btnagregar").hide();
		listarArticulos();

		$("#btnGuardar").hide();
		$("#btnCancelar").show();
		$("#btnAgregarArt").show();
		detalles=0;
	}
	else
	{
		$("#listadoregistros").show();
		$("#formularioregistros").hide();
		$("#btnagregar").show();
	}
}

//Función cancelarform
function cancelarform()
{
	limpiar();
	mostrarform(false);
}

//Función Listar
function listar()
{
	tabla=$('#tbllistado').dataTable(
	{
		"lengthMenu": [ 5, 10, 25, 75, 100],//mostramos el menú de registros a revisar
		"aProcessing": true,//Activamos el procesamiento del datatables
	    "aServerSide": true,//Paginación y filtrado realizados por el servidor
	    dom: '<Bl<f>rtip>',//Definimos los elementos del control de tabla
	    buttons: [		          
		            'copyHtml5',
		            'excelHtml5',
		            'csvHtml5',
		            'pdf'
		        ],
		"ajax":
				{
					url: '../ajax/venta.php?op=listar',
					type : "get",
					dataType : "json",						
					error: function(e){
						console.log(e.responseText);	
					}
				},
		"language": {
            "lengthMenu": "Mostrar : _MENU_ registros",
            "buttons": {
            "copyTitle": "Tabla Copiada",
            "copySuccess": {
                    _: '%d líneas copiadas',
                    1: '1 línea copiada'
                }
            }
        },
		"bDestroy": true,
		"iDisplayLength": 5,//Paginación
	    "order": [[ 0, "desc" ]]//Ordenar (columna,orden)
	}).DataTable();
}


//Función ListarArticulos
function listarArticulos()
{
	tabla=$('#tblarticulos').dataTable(
	{
		"aProcessing": true,//Activamos el procesamiento del datatables
	    "aServerSide": true,//Paginación y filtrado realizados por el servidor
	    dom: 'Bfrtip',//Definimos los elementos del control de tabla
	    buttons: [		          
		            
		        ],
		"ajax":
				{
					url: '../ajax/venta.php?op=listarArticulosVenta',
					type : "get",
					dataType : "json",
										
					error: function(e){
					}
				}
				,
				"language": {
					"lengthMenu": "Mostrar : _MENU_ registros",
					"buttons": {
					"copyTitle": "Tabla Copiada",
					"copySuccess": {
							_: '%d líneas copiadas',
							1: '1 línea copiada'
						}
					}
				},

		"bDestroy": true,
		"iDisplayLength": 5,//Paginación
	    "order": [[ 0, "desc" ]]//Ordenar (columna,orden)
	}).DataTable();

	// Setup - add a text input to each footer cell
	$('#tblarticulos thead tr').clone(true).appendTo( '#tblarticulos thead' );
	$('#tblarticulos thead tr:eq(1) th').each( function (i) {
		var title = $(this).text();
		$(this).html( '<input type="text"  />' );
 
		$( 'input', this ).on( 'keyup change', function () {
			if ( tabla.column(i).search() !== this.value ) {
				tabla
					.column(i)
					.search( this.value )
					.draw();
			}
		} );
	} );
 
}
//Función para guardar o editar

function guardaryeditar(e)
{
	e.preventDefault(); //No se activará la acción predeterminada del evento
	//$("#btnGuardar").prop("disabled",true);
	var formData = new FormData($("#formulario")[0]);

	$.ajax({
		url: "../ajax/venta.php?op=guardaryeditar",
	    type: "POST",
	    data: formData,
	    contentType: false,
	    processData: false,

	    success: function(datos)
	    {                    
	          bootbox.alert(datos);	          
	          mostrarform(false);
	          listar();
	    }

	});
	limpiar();
}

function mostrar(idventa)
{
	$.post("../ajax/venta.php?op=mostrar",{idventa : idventa}, function(data, status)
	{
		data = JSON.parse(data);		
		mostrarform(true);

		$("#idsite").val(data.idsite);
		$("#idsite").selectpicker('refresh');
		$("#idpersona").val(data.idpersona);
		$("#idpersona").selectpicker('refresh');
		$("#tipo_comprobante").val(data.tipo_comprobante);
		$("#tipo_comprobante").selectpicker('refresh');
		$("#solicitante").val(data.solicitante);
		$("#fecha_solicitud").val(data.fecha_solicitud);
		$("#proyecto").val(data.proyecto);
		$("#proyecto").selectpicker('refresh');
		$("#serie_comprobante").val(data.serie_comprobante);
		$("#num_comprobante").val(data.num_comprobante);
		$("#fecha_hora").val(data.fecha);
		$("#adicional").val(data.adicional);
		$("#comentario").val(data.comentario);
		$("#idventa").val(data.idventa);
		//Ocultar y mostrar los botones
		$("#btnGuardar").hide();
		$("#btnCancelar").show();
		$("#btnAgregarArt").hide();
 	});

 	$.post("../ajax/venta.php?op=listarDetalle&id="+idventa,function(r){
	        $("#detalles").html(r);
	});	
}

//Función para anular registros
function anular(idventa)
{
	bootbox.confirm("¿Está Seguro de anular la salida?", function(result){
		if(result)
        {
        	$.post("../ajax/venta.php?op=anular", {idventa : idventa}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}

//Declaración de variables necesarias para trabajar con las compras y
//sus detalles
var adicional=18;
var cont=0;
var detalles=0;
$("#btnGuardar").hide();
$("#tipo_comprobante").change(marcaradicional);

function marcaradicional()
  {
  	var tipo_comprobante=$("#tipo_comprobante option:selected").text();
  	if (tipo_comprobante=='Factura')
    {
        $("#adicional").val(adicional); 
    }
    else
    {
        $("#adicional").val("0"); 
    }
  }

function agregarDetalle(idarticulo,articulo,precio_venta)
  {
  	var cantidad=1;
    var descuento=0;

    if (idarticulo!="")
    {
    	var subtotal=cantidad;
    	var fila='<tr class="filas" id="fila'+cont+'">'+
    	'<td><button type="button" class="btn btn-danger" onclick="eliminarDetalle('+cont+')">X</button></td>'+
    	'<td><input type="hidden" name="idarticulo[]" value="'+idarticulo+'">'+articulo+'</td>'+
    	'<td><input type="number" name="cantidad[]" id="cantidad[]" value="'+cantidad+'"></td>'+
    	'<td><span name="subtotal" id="subtotal'+cont+'">'+subtotal+'</span></td>'+
    	'<td><button type="button" onclick="modificarSubototales()" class="btn btn-info"><i class="fa fa-refresh"></i></button></td>'+
    	'</tr>';
    	cont++;
    	detalles=detalles+1;
    	$('#detalles').append(fila);
    	modificarSubototales();
    }
    else
    {
    	alert("Error al ingresar el detalle, revisar los datos del artículo");
    }
  }

  function modificarSubototales()
  {
  	var cant = document.getElementsByName("cantidad[]");
    var prec = document.getElementsByName("precio_venta[]");
    var desc = document.getElementsByName("descuento[]");
    var sub = document.getElementsByName("subtotal");

    for (var i = 0; i <cant.length; i++) {
    	var inpC=cant[i];
    	var inpP=prec[i];
    	var inpD=desc[i];
    	var inpS=sub[i];

    	inpS.value=(inpC.value*1);
    	document.getElementsByName("subtotal")[i].innerHTML = inpS.value;
    }
    calcularTotales();

  }
  function calcularTotales(){
  	var sub = document.getElementsByName("subtotal");
  	var total = 0;

  	for (var i = 0; i <sub.length; i++) {
		total += document.getElementsByName("subtotal")[i].value;
	}
	$("#total").html("Σ/. " + total);
    $("#total_venta").val(total);
    evaluar();
  }

  function evaluar(){
  	if (detalles>0)
    {
      $("#btnGuardar").show();
    }
    else
    {
      $("#btnGuardar").hide(); 
      cont=0;
    }
  }
  function eliminarDetalle(indice){
  	$("#fila" + indice).remove();
  	calcularTotales();
  	detalles=detalles-1;
  	evaluar()
  }


  function enviar(value){

	    
            $.post("../ajax/venta.php?op=selectCliente", { elegido: value }, function(data){
             //$("#idsite").append(data);
			    $("#idsite").html(data);
				//$("#idsite").val("");
	            $('#idsite').selectpicker('refresh');
			});
			
    } 

// 	function mostrar(idventa)
// {
// 	$.post("../ajax/venta.php?op=mostrar",{idventa : idventa}, function(data, status)
// 	{
// 		data = JSON.parse(data);		
// 		mostrarform(true);

// 		$("#idsite").val(data.idsite);
// 		$("#idsite").selectpicker('refresh');
// 		$("#idpersona").val(data.idperonsa);
// 		$("#idpersona").selectpicker('refresh');
// 		$("#tipo_comprobante").val(data.tipo_comprobante);
// 		$("#tipo_comprobante").selectpicker('refresh');
// 		$("#solicitante").val(data.solicitante);
// 		$("#solicitante").selectpicker('refresh');
// 		$("#fecha_solicitud").val(data.fecha_solicitud);
// 		$("#proyecto").val(data.proyecto);
// 		$("#proyecto").selectpicker('refresh');
// 		$("#serie_comprobante").val(data.serie_comprobante);
// 		$("#num_comprobante").val(data.num_comprobante);
// 		$("#fecha_hora").val(data.fecha);
// 		$("#adicional").val(data.adicional);
// 		$("#comentario").val(data.comentario);
// 		$("#idventa").val(data.idventa);

// 		//Ocultar y mostrar los botones
// 		$("#btnGuardar").hide();
// 		$("#btnCancelar").show();
// 		$("#btnAgregarArt").hide();

	
//  	});

//  	$.post("../ajax/venta.php?op=listarDetalle&id="+idventa,function(r){
// 	        $("#detalles").html(r);
// 	});	
// }

init();