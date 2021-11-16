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
	$.post("../ajax/sitewom.php?op=selectCategoria", function(r){
	            $("#idcategoria").html(r);
	            $('#idcategoria').selectpicker('refresh');

	});
	$("#imagenmuestra").hide();
	$('#mAlmacen').addClass("treeview active");
    $('#lsitewoms').addClass("active");
	$('#psitewom').tab('show')
}

//Función limpiar
function limpiar()
{
	$("#codigo").val("");
	$("#nombre").val("");
	$("#regional").val("");
	$("#torrero").val("");
	$("#especialista").val("");
	$("#auditor").val("");
	$("#imagenmuestra").attr("src","");
	$("#imagenactual").val("");
	$("#archivo").attr("src","");
	
	$("#idsitewom").val("");
	
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
		$("#imagenmuestra").show();

		
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
		"orderCellsTop": true,
        "fixedHeader": true,
		"lengthMenu": [ 5, 10, 25, 75, 100],//mostramos el menú de registros a revisar
		"aProcessing": true,//Activamos el procesamiento del datatables
		"aServerSide": true,//Paginación y filtrado realizados por el servidor

	
		
		dom: '<Bl<f>rtip>',//Definimos los elementos del control de tabla
		ordering: false,
	    buttons: [		          
			{
                extend: 'copyHtml5',
                text:'Copiar',
                exportOptions: {
                    columns: [ 0, ':visible' ]
                }
            },
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: [2,3,4,5,6]
                }
            },
            {
                extend: 'colvis',
                text: 'Visor de columnas',
                collectionLayout: 'fixed three-column'
				},
				
				
        ],
		"ajax":

				{
					url: '../ajax/sitewom.php?op=listar',
					type : "get",
					dataType : "json",
					columnDefs:[{
						targets: "_all",
						searchable: false
					}],
											
					error: function(e){
						console.log(e.responseText);	
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
		"iDisplayLength": 10,//Paginación
		"order": [[ 0, "desc" ]]//Ordenar (columna,orden)



		
		
	}
	

	).DataTable();


	
		


}
//Función para guardar o editar


function guardaryeditar(e)
{
	e.preventDefault(); //No se activará la acción predeterminada del evento
	$("#btnGuardar").prop("disabled",true);
	var formData = new FormData($("#formulario")[0]);

	$.ajax({
		url: "../ajax/sitewom.php?op=guardaryeditar",
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

function mostrar(idsitewom)
{
	$.post("../ajax/sitewom.php?op=mostrar",{idsitewom : idsitewom}, function(data, status)
	{
		data = JSON.parse(data);		
		mostrarform(true);

		$("#idcategoria").val(data.idcategoria);
		$('#idcategoria').selectpicker('refresh');
		$("#codigo").val(data.codigo);
		$("#nombre").val(data.nombre);
		$("#especialista").val(data.especialista);
		$("#torrero").val(data.torrero);
		$("#regional").val(data.regional);
    	$('#regional').selectpicker('refresh');
		$("#auditor").val(data.auditor);
		$("#imagenmuestra").show();
		$("#imagenmuestra").attr("src","../files/sitewoms/"+data.imagen);
		$("#imagenactual").val(data.imagen);
		$("#idsitewom").val(data.idsitewom);
		$("#archivo").attr("href", "../files/sitewoms/"+data.imagen);

		$("#imagenmuestra").attr("src","../files/dco/"+data.imagen);
		$("#imagenactual").val(data.imagen);

		$("#archivo").attr("href", "../files/dco/"+data.imagen);
		$("#imagenactual").val(data.imagen);


		$("#archivo2").attr("href", "../files/inventario/"+data.imagen2);
		$("#imagenactual2").val(data.imagen2);

		$("#archivo3").attr("href", "../files/preatp/"+data.imagen3);
		$("#imagenactual3").val(data.imagen3);

		
		$("#archivo4").attr("href", "../files/atp/"+data.imagen4);
		$("#imagenactual4").val(data.imagen4);
 		generarbarcode();

 	})
}

//Función para desactivar registros
function desactivar(idsitewom)
{
	bootbox.confirm("¿Está Seguro de desactivar el artículo?", function(result){
		if(result)
        {
        	$.post("../ajax/sitewom.php?op=desactivar", {idsitewom : idsitewom}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}

//Función para activar registros
function activar(idsitewom)
{
	bootbox.confirm("¿Está Seguro de activar el Artículo?", function(result){
		if(result)
        {
        	$.post("../ajax/sitewom.php?op=activar", {idsitewom : idsitewom}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}


init();