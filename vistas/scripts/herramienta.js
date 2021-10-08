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
	$.post("../ajax/herramienta.php?op=selectcategoria_herramienta", function(r){
	            $("#idcategoria_herramienta").html(r);
	            $('#idcategoria_herramienta').selectpicker('refresh');

	});
	$("#imagenmuestra").hide();
	$('#mAlmacen').addClass("treeview active");
    $('#lherramientas').addClass("active");
	$('#pHerramienta').tab('show')
}

//Función limpiar
function limpiar()
{
	$("#codigo").val("");
	$("#nombre").val("");
	$("#descripcion").val("");
	$("#stock").val("");
	$("#observacion").val("");
	$("#imagenmuestra").attr("src","");
	$("#imagenactual").val("");
	$("#print").hide();
	$("#idherramienta").val("");
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
					url: '../ajax/herramienta.php?op=listar',
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


		// Setup - add a text input to each footer cell
		$('#tbllistado thead tr').clone(true).appendTo( '#tbllistado thead' );
		$('#tbllistado thead tr:eq(1) th').each( function (i) {
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
	$("#btnGuardar").prop("disabled",true);
	var formData = new FormData($("#formulario")[0]);

	$.ajax({
		url: "../ajax/herramienta.php?op=guardaryeditar",
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

function mostrar(idherramienta)
{
	$.post("../ajax/herramienta.php?op=mostrar",{idherramienta : idherramienta}, function(data, status)
	{
		data = JSON.parse(data);		
		mostrarform(true);

		$("#idcategoria_herramienta").val(data.idcategoria_herramienta);
		$('#idcategoria_herramienta').selectpicker('refresh');
		$("#codigo").val(data.codigo);
		$("#nombre").val(data.nombre);
		$("#observacion").val(data.observacion);
		$('#observacion').selectpicker('refresh');
		$("#stock").val(data.stock);
		$("#descripcion").val(data.descripcion);
		$("#imagenmuestra").show();
		$("#imagenmuestra").attr("src","../files/herramientas/"+data.imagen);
		$("#imagenactual").val(data.imagen);
		$("#idherramienta").val(data.idherramienta);
		$("#archivo").attr("href", "../files/herramientas/"+data.imagen);

 		generarbarcode();

 	})
}

//Función para desactivar registros
function desactivar(idherramienta)
{
	bootbox.confirm("¿Está Seguro de desactivar el artículo?", function(result){
		if(result)
        {
        	$.post("../ajax/herramienta.php?op=desactivar", {idherramienta : idherramienta}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}

//Función para activar registros
function activar(idherramienta)
{
	bootbox.confirm("¿Está Seguro de activar el Artículo?", function(result){
		if(result)
        {
        	$.post("../ajax/herramienta.php?op=activar", {idherramienta : idherramienta}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
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

init();