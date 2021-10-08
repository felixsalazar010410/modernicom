var tabla;

//Función que se ejecuta al inicio
function init(){
	mostrarform(false);
	listar();

	$("#formulario").on("submit",function(e)
	{
		guardaryeditar(e);	
	})

	
	$("#imagenmuestra").hide();
	$('#mAlmacen').addClass("treeview active");
    $('#lArticulos').addClass("active");
	$('#pDSalidas').tab('show')

	$.post("../ajax/venta.php?op=selectCliente2", function(r){
		$("#idsite").html(r);
		$('#idsite').selectpicker('refresh');
});

//Cargamos los items al select proyecto
$.post("../ajax/site.php?op=selectProyecto", function(r){
	$("#idproyecto").html(r);
	$('#idproyecto').selectpicker('refresh');


});
}

//Función limpiar
function limpiar()
{
	$("#idventa").val("");
	$("#idproyecto").val("");
	$("#idsite").val("");
	$("#iddetalle_venta").val("");
	$("#cantidad").val("");
	$("#precio_venta").val("");
	$("#descuento").val("");
	$("#iddetalle_venta").val("");
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


//Función Listar
function listar()
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
				title: 'Consolidado Control SV - CW_'+`${day}-0${month}-${year}`,
                exportOptions: {
                    columns: [2,3,4,5,6], 
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
            {
                extend: 'colvis',
                text: 'Visor de columnas',
                collectionLayout: 'fixed three-column'
				},
				
				
        ],
		"ajax":

				{
					url: '../ajax/detalle_venta.php?op=listar',
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
function listar2()
{
	
	var idsite = $("#idsite").val();

let date = new Date()
	
	let day = date.getDate()
	let month = date.getMonth() + 1
	let year = date.getFullYear()
	
	if(month < 10){
	  console.log(`${day}-0${month}-${year}`)
	}else{
	  console.log(`${day}-${month}-${year}`)
	}
	
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
				title: 'Consolidado Control SV - CW_'+`${day}-0${month}-${year}`,
                exportOptions: {
                    columns: [2,3,4,5,6], 
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
            {
                extend: 'colvis',
                text: 'Visor de columnas',
                collectionLayout: 'fixed three-column'
				},
				
				
        ],
		"ajax":

				{
					url: '../ajax/detalle_venta.php?op=filtrositio',
					data:{idsite: idsite},
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

function enviar(value){

	    
	$.post("../ajax/venta.php?op=selectCliente", { elegido: value }, function(data){
	 //$("#idsite").append(data);
		$("#idsite").html(data);
		//$("#idsite").val("");
		$('#idsite').selectpicker('refresh');
	});
	
} 


init();