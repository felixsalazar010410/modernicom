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
	$('#pDelivery').tab('show');
}

//Función limpiar
function limpiar()
{
	$("#iddelivery").val("");
	$("#sitename").val("");
	$("#codigo").val("");
	$("#proceso").val("");
	$("#smp").val("");
	$("#smr").val("");
	$("#el_delivery").val("");
	$("#el_inventario").val("");
	$("#estado").val("");
	$("#equipo").val("");
	$("#cantidad").val("");
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
					url: '../ajax/delivery.php?op=listar',
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
		url: "../ajax/delivery.php?op=guardaryeditar",
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

function mostrar(iddelivery)
{
	$.post("../ajax/delivery.php?op=mostrar",{iddelivery : iddelivery}, function(data, status)
	{
		data = JSON.parse(data);		
		mostrarform(true);

		$("#sitename").val(data.sitename);
		$("#codigo").val(data.codigo);
		$("#proceso").val(data.proceso);
		$("#smp").val(data.smp);
		$("#smr").val(data.smr);
		$("#el_delivery").val(data.el_delivery);
		$("#el_inventario").val(data.el_inventario);
		$("#estado").val(data.estado);
		$("#equipo").val(data.equipo);
		$("#cantidad").val(data.cantidad);
 		$("#iddelivery").val(data.iddelivery);
		 
		$("#imagenmuestra").show();
		$("#imagenmuestra").attr("src","../files/delivery_700/"+data.imagen);
		$("#imagenactual").val(data.imagen);




 	})
}

//Función para desactivar registros
function desactivar(iddelivery)
{
	bootbox.confirm("¿Está Seguro de Rechazar el Packing List?", function(result){
		if(result)
        {
        	$.post("../ajax/delivery.php?op=desactivar", {iddelivery : iddelivery}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}

//Función para activar registros
function activar(iddelivery)
{
	bootbox.confirm("¿Está Seguro de Aprobar el Packing List?", function(result){
		if(result)
        {
        	$.post("../ajax/delivery.php?op=activar", {iddelivery : iddelivery}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}


init();