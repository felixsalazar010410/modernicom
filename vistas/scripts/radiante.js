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
	$('#pradiante').tab('show');
	

}

//Función limpiar
function limpiar()
{
	$("#idradiante").val("");
	$("#site").val("");
	$("#dec_nombre").val("");
	$("#documentador").val("");
	$("#observaciones").val("");
	$("#imagenmuestra").attr("src","");
	$("#archivo").attr("src","");
	$("#imagenactual").val("");
	//2
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
					url: '../ajax/radiante.php?op=listar',
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
		url: "../ajax/radiante.php?op=guardaryeditar",
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

function mostrar(idradiante)
{
	$.post("../ajax/radiante.php?op=mostrar",{idradiante : idradiante}, function(data, status)
	{
		data = JSON.parse(data);		
		mostrarform(true);

		$("#site").val(data.site);
		$("#dec_nombre").val(data.dec_nombre);
		$("#documentador").val(data.documentador);
		$("#observaciones").val(data.observaciones);
 		$("#idradiante").val(data.idradiante);
		$("#imagenmuestra").show();
		$("#imagenmuestra").attr("src","../files/radiante/"+data.imagen);
		$("#imagenactual").val(data.imagen);
		//2sw
		$("#imagenmuestra2").show();
		$("#imagenmuestra2").attr("src","../files/radiante/"+data.imagen2);
		$("#imagenactual2").val(data.imagen2);

 	})
}

//Función para desactivar registros
function desactivar(idradiante)
{
	bootbox.confirm("¿Está Seguro de rechazar el formato de radiante?", function(result){
		if(result)
        {
        	$.post("../ajax/radiante.php?op=desactivar", {idradiante : idradiante}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}

//Función para activar registros
function activar(idradiante)
{
	bootbox.confirm("¿Está Seguro de aprobar el formato de Radiante?", function(result){
		if(result)
        {
        	$.post("../ajax/radiante.php?op=activar", {idradiante : idradiante}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}


init();