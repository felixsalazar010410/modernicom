var tabla;

//Función que se ejecuta al inicio
function init(){
	mostrarform(false);
	listar();

	$("#formulario").on("submit",function(e)
	{
		guardaryeditar(e);	
	});
	$("#imagenmuestra").hide();
	$('#mOFG').addClass("treeview active");
	$('#lHadwarede').addClass("active");
	$('#pFailury').tab('show');
}

//Función limpiar
function limpiar()
{
	$("#idfailure").val("");
	$("#site").val("");
	$("#equipo").val("");
	$("#serial").val("");
	$("#codigo").val("");
	$("#version").val("");
	$("#fecha_falla").val("");
	$("#fecha_envio").val("");
	$("#descripcion").val("");
	$("#devolver").val("");
	$("#imagenmuestra").attr("src","");
	$("#archivo").attr("src","");
	$("#imagenactual").val("");

	$("#imagenmuestra2").attr("src","");
	$("#archivo2").attr("src","");
	$("#imagenactual2").val("");
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
					url: '../ajax/failure.php?op=listar',
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
		"iDisplayLength": 10,//Paginación
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
		url: "../ajax/failure.php?op=guardaryeditar",
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

function mostrar(idfailure)
{
	$.post("../ajax/failure.php?op=mostrar",{idfailure : idfailure}, function(data, status)
	{
		data = JSON.parse(data);		
		mostrarform(true);

		$("#site").val(data.site);
		$("#equipo").val(data.equipo);
		$("#serial").val(data.serial);
		$("#codigo").val(data.codigo);
		$("#version").val(data.version);
		$("#fecha_falla").val(data.fecha_falla);
		$("#fecha_envio").val(data.fecha_envio);
		$("#descripcion").val(data.descripcion);
		$("#devolver").val(data.devolver);
 		$("#idfailure").val(data.idfailure);

		$("#imagenmuestra").show();
		$("#imagenmuestra").attr("src","../files/failure/"+data.imagen);
		$("#imagenactual").val(data.imagen);

		$("#imagenmuestra2").show();
		$("#imagenmuestra2").attr("src","../files/rma/"+data.imagen2);
		$("#imagenactual2").val(data.imagen2);

 	})
}

//Función para desactivar registros
function desactivar(idfailure)
{
	bootbox.confirm("¿Está Seguro de desactivar la Categoría?", function(result){
		if(result)
        {
        	$.post("../ajax/failure.php?op=desactivar", {idfailure : idfailure}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}

//Función para activar registros
function activar(idfailure)
{
	bootbox.confirm("¿Está Seguro de activar la Categoría?", function(result){
		if(result)
        {
        	$.post("../ajax/failure.php?op=activar", {idfailure : idfailure}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}


init();