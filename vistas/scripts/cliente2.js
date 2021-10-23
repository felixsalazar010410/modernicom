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
	$('#mSYF').addClass("treeview active");
    $('#lPersona2').addClass("active");
}

//Función limpiar
function limpiar()
{
	$("#nombre").val("");
	$("#num_documento").val("");
	$("#fecha_expedicion").val("");
	$("#genero").val("");
	$("#ciudad_expedicion").val("");
	$("#fecha_nacimiento").val("");
	$("#ciudad").val("");
	$("#pais").val("");
	$("#numero_cuenta").val("");
	$("#tipo_cuenta").val("");
	$("#banco").val("");
	$("#direccion").val("");
	$("#telefono").val("");
	$("#celular").val("");
	$("#email").val("");
	$("#email_empresarial").val("");
	$("#cargo").val("");
	$("#imagenmuestra").attr("src","");
	$("#imagenactual").val("");
	$("#empresa").val("");
	$("#zona").val("");
	$("#fecha_inicio").val("");
	$("#fecha_fin").val("");
	$("#estado").val("");
	$("#idpersona").val("");
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
					url: '../ajax/persona.php?op=listarsyf',
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
		url: "../ajax/persona.php?op=guardaryeditar",
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

function mostrar(idpersona)
{
	$.post("../ajax/persona.php?op=mostrar",{idpersona : idpersona}, function(data, status)
	{
		data = JSON.parse(data);		
		mostrarform(true);

		$("#nombre").val(data.nombre);
		$("#tipo_documento").val(data.tipo_documento);
		$("#tipo_documento").selectpicker('refresh');
		$("#num_documento").val(data.num_documento);
		$("#fecha_expedicion").val(data.fecha_expedicion);
		$("#genero").val(data.genero);
		$("#genero").selectpicker('refresh');
		$("#ciudad_expedicion").val(data.ciudad_expedicion);
		$("#ciudad_expedicion").selectpicker('refresh');
		$("#fecha_nacimiento").val(data.fecha_nacimiento);
		$("#ciudad").val(data.ciudad);
		$("#ciudad").selectpicker('refresh');
		$("#pais").val(data.pais);
		$("#pais").selectpicker('refresh');
		$("#numero_cuenta").val(data.numero_cuenta);
		$("#tipo_cuenta").val(data.tipo_cuenta);
		$("#tipo_cuenta").selectpicker('refresh');
		$("#banco").val(data.banco);
		$("#banco").selectpicker('refresh');
		$("#direccion").val(data.direccion);
		$("#telefono").val(data.telefono);
		$("#celular").val(data.celular);
		$("#email").val(data.email);
		$("#email_empresarial").val(data.email_empresarial);
		$("#cargo").val(data.cargo);
		$("#cargo").selectpicker('refresh');
		$("#imagenmuestra").show();
		$("#imagenmuestra").attr("src","../files/personal/"+data.imagen);
		$("#imagenactual").val(data.imagen);
		$("#empresa").val(data.empresa);
		$("#empresa").selectpicker('refresh');
		$("#zona").val(data.zona);
		$("#fecha_inicio").val(data.fecha_inicio);
		$("#fecha_fin").val(data.fecha_fin);
		$("#estado").val(data.estado);
		$("#estado").selectpicker('refresh');
		$("#idpersona").val(data.idpersona);
		

 	})
}


//Función para desactivar registros
function desactivar(idpersona)
{
	bootbox.confirm("¿Está Seguro de Inactivar a la persona ?", function(result){
		if(result)
        {
        	$.post("../ajax/persona.php?op=desactivar", {idpersona : idpersona}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}

//Función para activar registros
function activar(idpersona)
{
	bootbox.confirm("¿Está Seguro de Activar a la persona ?", function(result){
		if(result)
        {
        	$.post("../ajax/persona.php?op=activar", {idpersona : idpersona}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}


//Función para eliminar registros
function eliminar(idpersona)
{
	bootbox.confirm("¿Está Seguro de eliminar el cliente?", function(result){
		if(result)
        {
        	$.post("../ajax/persona.php?op=eliminar", {idpersona : idpersona}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}

init();