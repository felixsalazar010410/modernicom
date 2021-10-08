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
	$("#imagenmuestra").hide();
	$('#mOFG').addClass("treeview active");
	$('#lProyecto').addClass("active");
	$('#pvideos').tab('show');
	

}

//Función limpiar
function limpiar()
{
	$("#idvideos").val("");
	$("#site").val("");
	$("#dec_nombre").val("");
	$("#observaciones").val("");
	$("#imagenmuestra").attr("src","");
	$("#archivo").attr("src","");
	$("#imagenactual").val("");
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
					url: '../ajax/videos.php?op=listar',
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
		"iDisplayLength": 20,//Paginación
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
		url: "../ajax/videos.php?op=guardaryeditar",
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

function mostrar(idvideos)
{
	$.post("../ajax/videos.php?op=mostrar",{idvideos : idvideos}, function(data, status)
	{
		data = JSON.parse(data);		
		mostrarform(true);

		$("#site").val(data.site);
		$("#dec_nombre").val(data.dec_nombre);
		$("#observaciones").val(data.observaciones);
 		$("#idvideos").val(data.idvideos);
		$("#imagenmuestra").show();
		$("#imagenmuestra").attr("src","../files/videos/"+data.imagen);
		$("#imagenactual").val(data.imagen);

 	})
}

//Función para desactivar registros
function desactivar(idvideos)
{
	bootbox.confirm("¿Está Seguro de rechazar el formato de videos?", function(result){
		if(result)
        {
        	$.post("../ajax/videos.php?op=desactivar", {idvideos : idvideos}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}

//Función para activar registros
function activar(idvideos)
{
	bootbox.confirm("¿Está Seguro de aprobar el formato de Videos?", function(result){
		if(result)
        {
        	$.post("../ajax/videos.php?op=activar", {idvideos : idvideos}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}


init();