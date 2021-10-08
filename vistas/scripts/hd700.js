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
	$.post("../ajax/womhw.php?op=selectSite2", function(r){
	            $("#idsite").html(r);
				$('#idsite').selectpicker('refresh');
				

	});

	$.post("../ajax/womhw.php?op=selectSite2", function(r){
		$("#sitiofinal").html(r);
		$('#sitiofinal').selectpicker('refresh');
		

});

$.post("../ajax/womhw.php?op=selectSite2", function(r){
	$("#idsite2").html(r);
	$('#idsite2').selectpicker('refresh');
	
});

	
	$.post("../ajax/womhw.php?op=selectCapex", function(r){
		$("#idcapex").html(r);
		$('#idcapex').selectpicker('refresh');
		

});
	$("#imagenmuestra").hide();
	$('#mOFG').addClass("treeview active");
	$('#lHadwarede').addClass("active");
	$('#pFailury').tab('show');
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
                    columns: [2,3,4,5,6,7,8,9]
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
					url: '../ajax/womhw.php?op=listar3',
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

function listar2()
{

	let date = new Date()
	
	let day = date.getDate()
	let month = date.getMonth() + 1
	let year = date.getFullYear()
	
	if(month < 10){
	  console.log(`${day}-0${month}-${year}`)
	}else{
	  console.log(`${day}-${month}-${year}`)
	}

	var idsite = $("#idsite2").val();
	tabla=$('#tbllistado').dataTable(
	{
		"lengthMenu": [ 5, 10, 25, 75, 100],//mostramos el menú de registros a revisar
		"aProcessing": true,//Activamos el procesamiento del datatables
	    "aServerSide": true,//Paginación y filtrado realizados por el servidor
	    dom: '<Bl<f>rtip>',//Definimos los elementos del control de tabla
		buttons: [		          
			{
                extend: 'copyHtml5',
				text:'<i class="fa fa-files-o"></i>',
				titleAttr: 'Copiar Texto',
                exportOptions: {
                    columns: [ 0, ':visible' ]
                }
            },
            {
				
                extend: 'excelHtml5',
				name: 'csv',
				text:'<i class="fa fa-file-excel-o"></i>',
				//className: 'btn btn-success',
				// titleAttr: 'Exportar a Excel',
				title: 'CONSOLIDADO HW_CONTROL_'+`${day}-0${month}-${year}`,
                exportOptions: {
                    columns: [2,3,4,5,6,7,8,9], 
                },
				customize: function(xlsx) {
					var sheet = xlsx.xl.worksheets['sheet1.xml'];
	 
					// Loop over the cells in column `C`
					$('row c[r^="C"]', sheet).each( function () {
						// Get the value
						if ( $('is t', this).text() == 'NO' ) {
							$(this).attr( 's', '20' );
						}
					});
				}
            },
			// {
            //     extend: 'colvisGroup',
            //     text: 'Office info',
            //     show: [ 1, 2 ],
            //     hide: [ 3, 4, 5 ]
            // },
            // {
            //     extend: 'colvisGroup',
            //     text: 'HR info',
            //     show: [ 3, 4, 5 ],
            //     hide: [ 1, 2 ]
            // },
            // {
            //     extend: 'colvisGroup',
            //     text: 'Show all',
            //     show: ':hidden'
            // },
            // {
            //     extend: 'colvis',
            //     text: 'Visor de columnas',
            //     collectionLayout: 'fixed three-column'
			// 	},
				
				
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
	$.post("../ajax/womhw.php?op=mostrar",{idwomhw : idwomhw} , function(data, status)
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
		$("#despachado").val(data.despachado);
		$("#instalado").val(data.instalado);
		$("#bodega").val(data.bodega);
		$("#movido").val(data.movido);
		$("#devuelto").val(data.devuelto);
		$("#imagenmuestra").show();
		$("#imagenmuestra").attr("src","../files/womhws/"+data.imagen);
		$("#imagenactual").val(data.imagen);
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