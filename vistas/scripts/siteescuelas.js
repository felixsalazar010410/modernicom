var tabla;

//Función que se ejecuta al inicio
function init(){
	mostrarform(false);
	listar();

	$("#formulario").on("submit",function(e)
	{
		guardaryeditar(e);	
	})

	//Cargamos los items al select proyecto
	$.post("../ajax/site.php?op=selectProyecto", function(r){
	            $("#idproyecto").html(r);
				$('#idproyecto').selectpicker('refresh');
	

	});

	

	$("#imagenmuestra").hide();
	$('#mTemwok').addClass("treeview active");
	$('#lProyectos').addClass("active");
	$('#pEscuelas').tab('show')
//Cargamos los items al select persona
	$.post("../ajax/site.php?op=selectPersona", function(r){
		$("#lider_cuadrilla").html(r);
		$('#lider_cuadrilla').selectpicker('refresh');

 
});

//Cargamos los items al select documentador
$.post("../ajax/site.php?op=selectDocumentador", function(r){
	$("#documentador").html(r);
	$('#documentador').selectpicker('refresh');


});
	
}

//Función limpiar
function limpiar()
{
	$("#codigo").val("");
	$("#nombre").val("");
	$("#descripcion").val("");
	$("#estado1").val("");
	$("#correcion1").val("");
	$("#comentario1").val("");
	$("#regional").val("");
	$("#direccion").val("");
	$("#lider_cuadrilla").val("");
	$("#fecha_inicio").val("");
	$("#documentador").val("");
	$("#estado_sitio").val("");
	$("#imagenmuestra").attr("src","");
	$("#imagenmuestra2").attr("src","");
	$("#imagenmuestra3").attr("src","");
	$("#imagenmuestra4").attr("src","");
	$("#imagenmuestra5").attr("src","");
	$("#archivo").attr("src","");
	$("#archivo2").attr("src","");
	$("#archivo3").attr("src","");
	$("#archivo4").attr("src","");
	$("#archivo5").attr("src","");
	$("#archivo6").attr("src","");
	$("#imagenactual").val("");
	$("#imagenactual2").val("");
	$("#print").hide();
	$("#idsite").val("");
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
		listarArticulos();
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
					url: '../ajax/site.php?op=listarescuelas',
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
		url: "../ajax/site.php?op=guardaryeditar",
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

function mostrar(idsite)
{
	$.post("../ajax/site.php?op=mostrar",{idsite : idsite}, function(data, status)
	{
		data = JSON.parse(data);		
		mostrarform(true);

		$("#idproyecto").val(data.idproyecto);
		$('#idproyecto').selectpicker('refresh');
		$("#codigo").val(data.codigo);
		$("#nombre").val(data.nombre);
		$("#regional").val(data.regional);
		$('#regional option:not(:selected)').attr('disabled',true);
		$("#direccion").val(data.direccion);
		$("#lider_cuadrilla").val(data.lider_cuadrilla);
		$('#lider_cuadrilla').selectpicker('refresh');
		$("#fecha_inicio").val(data.fecha_inicio);
		$("#documentador").val(data.documentador);
		$('#documentador').selectpicker('refresh');
		$("#estado_sitio").val(data.estado_sitio);
		$('#estado_sitio').selectpicker('refresh');
		$("#imagenmuestra").show();
		$("#descripcion").val(data.descripcion);
		$("#estado1").val(data.estado1);
		$("#correcion1").val(data.correcion1);
		$("#comentario1").val(data.comentario1);
		$("#imagenmuestra").attr("src","../files/escuelas/"+data.imagen);
		$("#imagenactual").val(data.imagen);

		$("#imagenmuestra2").show();
		$("#imagenmuestra2").attr("src","../files/escuelas/"+data.imagen2);
		$("#imagenactual2").val(data.imagen2);


		$("#imagenmuestra3").show();
		$("#imagenmuestra3").attr("src","../files/escuelas/"+data.imagen3);
		$("#imagenactual3").val(data.imagen3);

		$("#imagenmuestra4").show();
		$("#imagenmuestra4").attr("src","../files/escuelas/"+data.imagen4);
		$("#imagenactual4").val(data.imagen4);

		$("#imagenmuestra5").show();
		$("#imagenmuestra5").attr("src","../files/escuelas/"+data.imagen5);
		$("#imagenactual5").val(data.imagen5);

		$("#imagenmuestra6").show();
		$("#imagenmuestra6").attr("src","../files/escuelas/"+data.imagen6);
		$("#imagenactual6").val(data.imagen5);



 		 $("#idsite").val(data.idsite);
		 $("#archivo").attr("href", "../files/escuelas/"+data.imagen);
		 $("#archivo2").attr("href", "../files/escuelas/"+data.imagen2);
		 $("#archivo3").attr("href", "../files/escuelas/"+data.imagen3);
		 $("#archivo4").attr("href", "../files/escuelas/"+data.imagen4);
		 $("#archivo5").attr("href", "../files/escuelas/"+data.imagen5);
		 $("#archivo6").attr("href", "../files/escuelas/"+data.imagen5);
		 $("#imagenactual").val(data.imagen);
		 $("#idsite").val(data.idsite);
 		generarbarcode();

 	})
}

//Función para desactivar registros
function desactivar(idsite)
{
	bootbox.confirm("¿Está Seguro de Rechazar el Sitio?", function(result){
		if(result)
        {
        	$.post("../ajax/site.php?op=desactivar", {idsite : idsite}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}

//Función para activar registros
function activar(idsite)
{
	bootbox.confirm("¿Está Seguro de Aprobar el Sitio?", function(result){
		if(result)
        {
        	$.post("../ajax/site.php?op=activar", {idsite : idsite}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
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
					url: '../ajax/base_escuelas.php?op=listar',
					type : "get",
					dataType : "json",						
					error: function(e){
						console.log(e.responseText);	
					}
				},
		"bDestroy": true,
		"iDisplayLength": 5,//Paginación
		"scrollY": "500px",
		"responsive": true,
        "paging": false,
	    "order": [[ 0, "asc" ]]//Ordenar (columna,orden)
		
		
	}
	
	
	).DataTable();
		

	
}

//función para generar el código de barras
function generarbarcode()
{
	codigo=$("#codigo").val();
	JsBarcode("#barcode", codigo);
	$("#print").show();
}

//Función para imprimir el Código de barras
function imprimir()
{
	$("#print").printArea();
}

function cambio(){
	// if ($(elemento).val() === "PENDIENTE") {
	//   $(elemento).css("background-color", "red");
	// }
	// else{
	//   $(elemento).css("background-color", "blue");
	// }

	var x = document.getElementById("estado1").value;
  document.getElementById("demo").innerHTML = "You selected: " + x;
  }



init();