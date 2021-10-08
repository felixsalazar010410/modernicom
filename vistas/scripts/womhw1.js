var tabla;

//Función que se ejecuta al inicio
function init(){
	mostrarform(false);
	listar();

	$("#formulario").on("submit",function(e)
	{
		guardaryeditar(e);	
	})
	

	//Cargamos los items al select categoria
	$.post("../ajax/womhw.php?op=selectSite", function(r){
	            $("#idsite").html(r);
				$('#idsite').selectpicker('refresh');
				

	});

	$.post("../ajax/womhw.php?op=selectSite", function(r){
		$("#sitiofinal").html(r);
		$('#sitiofinal').selectpicker('refresh');
		

});

$.post("../ajax/womhw.php?op=selectSite", function(r){
	$("#idsite2").html(r);
	$('#idsite2').selectpicker('refresh');
	
});

	
	$.post("../ajax/womhw.php?op=selectCapex", function(r){
		$("#idcapex").html(r);
		$('#idcapex').selectpicker('refresh');
		

});
	$("#imagenmuestra").hide();
	$("#imagenmuestra2").hide();
	$('#mTemwok').addClass("treeview active");
	$('#lHadwared').addClass("active");
	$('#pWom').tab('show')
}

//Función limpiar
function limpiar()
{
	$("#documento").val("");
	$("#num_documento").val("");
	$("#indicador").val("");
	$("#codigo").val("");
	$("#elemento").val("");
	$("#serial").val("");
	$("#estado").val("");
	$("#despachado").val("");
	$("#instalado").val("");
	$("#bodega").val("");
	$("#movido").val("");
	$("#devuelto").val("");
	$("#ubicacion").val("");
	$("#sitiofinal").val("");
	$("#observacion").val("");
	$("#idcapex").val("");
	$("#idsite").val("");
	$("#idsite2").val("");
	$("#imagenmuestra").attr("src","");
	$("#imagenactual").val("");
	$("#imagenmuestra2").attr("src","");
	$("#imagenactual2").val("");
	$("#print").hide();
	$("#idwomhw").val("");
}

//Función mostrar formulario
function mostrarform(flag)
{
	limpiar();
	if (flag)
	{
		$("#listadoregistros").hide();
		$("#formularioregistros").show();
		$("#btnGuardar").prop("disabled",false);
		$("#btnagregar").hide();
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
		"lengthMenu": [ 2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18],//mostramos el menú de registros a revisar
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
					url: '../ajax/womhw.php?op=listar',
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
		"iDisplayLength": 25,//Paginación
	    "order": [[ 0, "desc" ]]//Ordenar (columna,orden)
	}).DataTable();
}


function listar2()
{

	var idsite = $("#idsite2").val();
	tabla=$('#tbllistado').dataTable(
	{
		"lengthMenu": [ 2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18],//mostramos el menú de registros a revisar
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
					url: '../ajax/womhw.php?op=filtrositio',
					data:{idsite: idsite},
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
		"iDisplayLength": 25,//Paginación
	    "order": [[ 0, "desc" ]]//Ordenar (columna,orden)
	}).DataTable();
}
//Función para guardar o editar

function guardaryeditar(e)
{
	e.preventDefault(); //No se activará la acción predeterminada del evento
	$("#btnGuardar").prop("disabled",true);
	var formData = new FormData($("#formulario")[0]);

	$.ajax({
		url: "../ajax/womhw.php?op=guardaryeditar",
	    type: "POST",
	    data: formData,
	    contentType: false,
	    processData: false,

	    success: function(datos)
	    {                    
	          bootbox.alert(datos);	          
	          mostrarform(false);
	          tabla.ajax.reload();
	    }

	});
	limpiar();
}

function mostrar(idwomhw)
{
	$.post("../ajax/womhw.php?op=mostrar",{idwomhw : idwomhw}, function(data, status)
	{
		data = JSON.parse(data);		
		mostrarform(true);

		$("#idwomhw").val(data.idwomhw);
		$('#idwomhw').selectpicker('refresh');
		$("#documento").val(data.documento);
		$('#documento').selectpicker('refresh');
		$("#num_documento").val(data.num_documento);
		$("#indicador").val(data.indicador);
		$("#idcapex").val(data.idcapex);
		$('#idcapex').selectpicker('refresh');
		$("#idsite").val(data.idsite);
		$('#idsite').selectpicker('refresh');
		$("#idsite2").val(data.idsite);
		$('#idsite2').selectpicker('refresh');
		$("#codigo").val(data.codigo);
		$('#codigo').selectpicker('refresh');
		$("#elemento").val(data.elemento);
		$("#serial").val(data.serial);
		$("#estado").val(data.estado);
		$('#estado').selectpicker('refresh');
		$("#despachado").val(data.despachado);
		$("#instalado").val(data.instalado);
		$("#bodega").val(data.bodega);
		$("#movido").val(data.movido);
		$("#devuelto").val(data.devuelto);
		$("#ubicacion").val(data.ubicacion);
		$('#ubicacion').selectpicker('refresh');
		$("#sitiofinal").val(data.sitiofinal);
		$('#sitiofinal').selectpicker('refresh');
		$("#observacion").val(data.observacion);
		$("#imagenmuestra").show();
		$("#imagenmuestra").attr("src","../files/womhws/"+data.imagen);
		$("#imagenactual").val(data.imagen);
		$("#imagenmuestra2").show();
		$("#imagenmuestra2").attr("src","../files/womhws/"+data.imagen2);
		$("#imagenactual2").val(data.imagen2);
 		$("#idwomhw").val(data.idwomhw);

	 });
}

function hw(idwomhw)
{
	$.post("../ajax/site.php?op=listar700",{idwomhw : idwomhw}, function(data, status)
	{
		data = JSON.parse(data);		
		mostrarform(true);

		$("#idwomhw").val(data.idwomhw);
		$('#idwomhw').selectpicker('refresh');
		$("#documento").val(data.documento);
		$("#num_documento").val(data.num_documento);
		$("#idcapex").val(data.idcapex);
		$('#idcapex').selectpicker('refresh');
		$("#codigo").val(data.codigo);
		$("#elemento").val(data.elemento);
		$("#imagenmuestra").show();
		$("#imagenmuestra").attr("src","../files/womhws/"+data.imagen);
		$("#imagenactual").val(data.imagen);
		$("#imagenmuestra2").show();
		$("#imagenmuestra2").attr("src","../files/womhws/"+data.imagen2);
		$("#imagenactual2").val(data.imagen2);
 		$("#idwomhw").val(data.idwomhw);

 	})
}

//Función para desactivar registros
function desactivar(idwomhw)
{
	bootbox.confirm("¿Está Seguro de desactivar el artículo?", function(result){
		if(result)
        {
        	$.post("../ajax/womhw.php?op=desactivar", {idwomhw : idwomhw}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}

//Función para activar registros
function activar(idwomhw)
{
	bootbox.confirm("¿Está Seguro de activar el Artículo?", function(result){
		if(result)
        {
        	$.post("../ajax/womhw.php?op=activar", {idwomhw : idwomhw}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}

//función para generar el código de barras
function generarbarcode()
{
	documento=$("#documento").val();
	JsBarcode("#barcode", documento);
	$("#print").show();
}

//Función para imprimir el Código de barras
function imprimir()
{
	$("#print").printArea();
}

init();