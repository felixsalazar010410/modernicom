var tabla;

//Función que se ejecuta al inicio
function init(){
	mostrarform(false);
	mostrarform2(false);

	
	listar();
	listarhw();

	mysDocumentos();

	$("#formulario").on("submit",function(e)
	{
		guardaryeditar(e);
		
	});

	$("#imagenmuestra").hide();
	$('#mSYF').addClass("treeview active");
	$('#lProyectosyf').addClass("active");
	$('#pSite').tab('show');
	$("#documentador").hide();

	//Cargamos los items al select proyecto
	$.post("../ajax/site.php?op=selectProyectosyfDominion", function(r){
	            $("#idproyecto").html(r);
				$('#idproyecto').selectpicker('refresh');
	

	});

	
	//Cargamos los items al select Usuario
	$.post("../ajax/site.php?op=selectUsuario", function(r){
		$("#idusuario").html(r);
		$('#idusuario').selectpicker('refresh');
		//$('#idusuario option:not(:selected)').attr('disabled',true);
		
});

$.post("../ajax/site.php?op=selectUsuario", function(r){
	$("#idusuario").html(r);
	//$('#idusuario option:not(:selected)').attr('disabled',true);
	
});


$.post("../ajax/site.php?op=selectUsuario", function(r){
	$("#idusuario2").html(r);
	$('#idusuario2').selectpicker('refresh');
	
});


$.post("../ajax/site.php?op=selectUsuario", function(r){
	$("#idusuario3").html(r);
	$('#idusuario3').selectpicker('refresh');
	
});

$.post("../ajax/site.php?op=selectUsuario", function(r){
	$("#idusuario4").html(r);
	$('#idusuario4').selectpicker('refresh');
	
});


//Cargamos los items al select persona
	$.post("../ajax/site.php?op=selectDocumentador", function(r){
		$("#lider_cuadrilla").html(r);
		$('#lider_cuadrilla').selectpicker('refresh');


});

//Cargamos los items al select persona
$.post("../ajax/site.php?op=selectsyf_documentador", function(r){
	$("#documentador").html(r);
	$('#documentador').selectpicker('refresh');


});



	
}

//Función limpiar
function limpiar()
{
	$("#nombre").val("");
	$("#idwomhw").val("");
	$("#lider_cuadrilla").val("");
	$("#estado_campo").val("");
	$("#actividad").val("");
	$("#observaciones_campo").val("");
	$("#documentador").val("");
	$("#doc_pre").val("");
	$("#doc_post").val("");
	$("#observaciones_doc").val("");
	$("#observaciones_doc").val("");
	$("#auditor").val("");
	$("#estado_nokia").val("");
	$("#observaciones_nokia").val("");
	$("#imagenmuestra").attr("src","");
	$("#imagenmuestra2").attr("src","");
	$("#imagenmuestra3").attr("src","");
	$("#imagenmuestra4").attr("src","");
	$("#imagenmuestra5").attr("src","");
	$("#imagenmuestra6").attr("src","");
	$("#imagenmuestra7").attr("src","");
	$("#imagenmuestra8").attr("src","");
	$("#imagenmuestra9").attr("src","");
	$("#imagenmuestra10").attr("src","");
	$("#imagenmuestra11").attr("src","");
	$("#imagenmuestra12").attr("src","");
	$("#imagenmuestra13").attr("src","");
	$("#archivo").attr("src","");
	$("#archivo1").attr("src","");
	$("#archivo2").attr("src","");
	$("#imagenactual").val("");
	$("#imagenactual2").val("");
	$("#imagenactual3").val("");
	$("#imagenactual4").val("");
	$("#imagenactual5").val("");
	$("#imagenactual6").val("");
	$("#imagenactual7").val("");
	$("#imagenactual8").val("");
	$("#imagenactual9").val("");
	$("#imagenactual10").val("");
	$("#imagenactual11").val("");
	$("#imagenactual12").val("");
	$("#imagenactual13").val("");
	$("#print").hide();
	$("#idsite").val("");
	$("#codigo").val("");
	$("#idusuario").val("");


}

//Función mostrar formulario
function mostrarform(flag)
{
	limpiar();
	if (flag)
	{
		$("#listadoregistros").hide();
		$("#listadoregistros2").hide();
		$("#formularioregistros").show();
		$("#formularioregistros2").hide();
		$("#btnGuardar").prop("disabled",false);
		$("#btnagregar").hide();
		listarArticulos();
		$("#btnall").hide();
		$("#btnaprobados").hide();
		$("#btnrechazado").hide();
		$("#btninformacion").show();
		$("#btndocumentos").show();	
		$("#btnhw").show();
		$("#btnAgregarArt").hide();
		
		
		

	}
	else
	{
		$("#listadoregistros").show();
		$("#listadoregistros2").hide();
		$("#formularioregistros").hide();
		$("#formularioregistros2").hide();
		$("#btninformacion").hide();
		$("#btndocumentos").hide();
		$("#btnhw").hide();
		$("#btnagregar").show();
		$("#btnall").show();
		$("#btnaprobados").show();
		$("#btnrechazado").show();
		
		$("#btnAgregarArt").show();
		

	}
}

function mostrarform2(flag)
{
	limpiar();
	if (flag)
	{
		$("#listadoregistros").hide();
		$("#listadoregistros2").show();
		$("#formularioregistros").hide();
		$("#formularioregistros2").hide();
		$("#btnGuardar").prop("disabled",false);
		$("#btnagregar").hide();
		$("#btnagregar2").hide();
		$("#btnall").hide();
		$("#btnaprobados").hide();
		$("#btnrechazado").hide();
		$("#btninformacion").hide();
		$("#btndocumentos").hide();
	}
	else
	{
		$("#formularioregistros").hide();
		$("#formularioregistros2").hide();
		$("#btninformacion").hide();
		$("#btndocumentos").hide();
		$("#btnagregar").show();
		$("#btnagregar2").hide();
		$("#btnall").show();
		$("#btnaprobados").show();
		$("#btnrechazado").show();
	}
}


function mostrarforms(flag)
{
	limpiar();
	if (flag)
	{
		$("#listadoregistros").hide();
		$("#listadoregistros2").show();
		$("#formularioregistros").hide();
		$("#formularioregistros2").show();
		$("#btnGuardar").prop("disabled",false);
		$("#btnagregar").hide();
		$("#btnagregar2").hide();
		$("#btnall").hide();
		$("#btnaprobados").hide();
		$("#btnrechazado").hide();
		$("#btninformacion").hide();
		$("#btndocumentos").hide();
	}
	else
	{
		$("#formularioregistros").hide();
		$("#formularioregistros2").hide();
		$("#btninformacion").hide();
		$("#btndocumentos").hide();
		$("#btnagregar").show();
		$("#btnagregar2").hide();
		$("#btnall").show();
		$("#btnaprobados").show();
		$("#btnrechazado").show();
	}
}


//Función cancelarform
function cancelarform()
{
	limpiar();
	mostrarform(false);
	mostrarform2(false);
}

function cancelarform()
{
	limpiar();
	mostrarform(false);
	mostrarform2(false);
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

	$("#btnaprobados").show();
	$("#btnrechazado").show();
	$("#btnall").hide();
	$("#btninformacion").hide();
	$("#btndocumentos").hide();
	

	tabla=$('#tbllistado').dataTable(
	{

		
		"aProcessing": false,//Activamos el procesamiento del datatables
	    "aServerSide": false,//Paginación y filtrado realizados por el servidor
	    dom: '<Bl<f>rtip>',//Definimos los elementos del control de tabla

		
	
	    buttons: [		          
			{
                extend: 'copyHtml5',
				text:'<i class="fa fa-files-o"></i>',
                exportOptions: {
                    columns: [ 0, ':visible' ]
                }
            },

			
            {
				title: 'CONSOLIDADO SITIOS_DOCUMENTACION_DOMINION_'+`${day}-0${month}-${year}`,
                extend: 'excelHtml5',
				autoFilter: true,
				text:'<i class="fa fa-file-excel-o"></i>',
				sheetName: 'SITIOS',
				customize: function( xlsx ) {
					var sheet = xlsx.xl.worksheets['sheet1.xml'];

					
	 
					$('row c[r^="B"]', sheet).attr( 's', '2' );
					$('row c[r^="O"]', sheet).each( function () {
						// Get the value
						if ( $('is t', this).text() == 'Aprobado' ) {
							$(this).attr( 's', '20' );
						} });
				}
				
				,
                exportOptions: {
                    columns: [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16]
                }
            },
            // {
            //     extend: 'colvis',
            //     text: 'Visor de columnas',
            //     collectionLayout: 'fixed two-column'
			// 	},
			{
				extend: 'colvisGroup',
				text: 'All',
				show: ':hidden'

			},
			{
				extend: 'colvisGroup',
				text: 'OBSERVACIONES',
				show: [ 1,3,4,5],
				hide: [ 2,5,6,7,9,8,10,11,12,13,14,15,16,17,18,19]
			},
				{
					extend: 'colvisGroup',
					text: 'DOCUMENTACION PRE',
					show: [ 1,3,6,7,8,9,10,11 ],
					hide: [ 2,4,5,12,13,14,15,16,17,18]
				},
				{
				extend: 'colvisGroup',
                text: 'DOCUMENTACION POST',
                show: [ 1,4,15,16,17,18],
                hide: [ 2,4,5,6,7,8,9,10,11,12,13,14]
           	 },
				{
					extend: 'colvisGroup',
					text: 'ACTAS',
					show: [ 1,3,12,13,14],
					hide: [ 2,4,5,6,7,8,9,10,11,15,16,17,18]
					},
				

			
		        ],
		"ajax":
				{
					url: '../ajax/site.php?op=listar700documentadorsyfDominion',
					type : "get",
					dataType : "json",						
					error: function(e){
						console.log(e.responseText);	
					},

					// "aoColumns" : [
					// 	{ sWidth: '10px' },
					// 	{ sWidth: '10px' },
					// 	{ sWidth: '10px' },
						
					// ],
					
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
	    "order": [[ 0, "desc" ]],//Ordenar (columna,orden)


		
		
		
	}).DataTable();

	var tableX = $('#tbllistado').DataTable();
	tableX.button(0).nodes().css('background', 'white');
	tableX.button(1).nodes().css('background', 'green');
	tableX.button(2).nodes().css('background', 'white');
	tableX.button(3).nodes().css('background', 'white');
	tableX.button(4).nodes().css('background', 'red');
	tableX.button(4).nodes().css('color', 'white');
	tableX.button(5).nodes().css('background', 'red');
	tableX.button(5).nodes().css('color', 'white');
	tableX.button(6).nodes().css('background', 'blue');
	tableX.button(6).nodes().css('color', 'white');


}


function hw(){
	listarhw();
}




function listarhw()
{
	//var idsite = $("#nombre").val();

	//var idsite = '79';
	//var idsite = 'CBUC Giron San Jorge';

	//var idsite = $("#idsite").val();

	var idsite = $("#nombre").val();

	tabla=$('#tbllistado2').dataTable(
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
					url: '../ajax/womhw.php?op=listarsitiohw',
					data:{ idsite: idsite},
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



function listarwomactivos()


{
	$("#btnaprobados").hide();
	$("#btnrechazado").show();
	$("#btninformacion").hide();
	$("#btndocumentos").hide();
	$("#btnall").show();
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
					url: '../ajax/site.php?op=listar700aprobados',
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


function listarwomrechazados()
  
{

	$("#btnaprobados").show();
	$("#btnall").show();
	$("#btnrechazado").hide();
	$("#btninformacion").hide();
	$("#btndocumentos").hide();

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
					url: '../ajax/site.php?op=listar700rechazados',
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
		url: "../ajax/site.php?op=guardaryeditar700",
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
		$("#idusuario").val(data.idusuario);
		$('#idusuario').selectpicker('refresh');
		$("#nombre").val(data.nombre);
		$("#codigo").val(data.codigo);
		$("#lider_cuadrilla").val(data.lider_cuadrilla);
		$('#lider_cuadrilla').selectpicker('refresh');
		$("#estado_campo").val(data.estado_campo);
		$('#estado_campo').selectpicker('refresh');
		$("#actividad").val(data.actividad);
		$('#actividad').selectpicker('refresh');
		$("#observaciones_campo").val(data.observaciones_campo);
		$("#documentador").val(data.documentador);
		$('#documentador').selectpicker('refresh');
		$("#doc_pre").val(data.doc_pre);
		$('#doc_pre').selectpicker('refresh');
		$("#doc_post").val(data.doc_post);
		$('#doc_post').selectpicker('refresh');
		$("#observaciones_doc").val(data.observaciones_doc);
		$("#auditor").val(data.auditor);
		$('#auditor').selectpicker('refresh');
		$("#estado_nokia").val(data.estado_nokia);
		$('#estado_nokia').selectpicker('refresh');
		$("#observaciones_nokia").val(data.observaciones_nokia);
		$('#observaciones_nokia').selectpicker('refresh');
		

		$("#idsite").val(data.idsite);


		$("#imagenmuestra").show();
		$("#imagenmuestra").attr("src","../files/tss_700/"+data.imagen);
		$("#imagenactual").val(data.imagen);

		$("#imagenmuestra2").show();
		$("#imagenmuestra2").attr("src","../files/packinglist_700/"+data.imagen2);
		$("#imagenactual2").val(data.imagen2);


		$("#imagenmuestra3").show();
		$("#imagenmuestra3").attr("src","../files/hwcontrol_700/"+data.imagen3);
		$("#imagenactual3").val(data.imagen3);


		$("#imagenmuestra4").show();
		$("#imagenmuestra4").attr("src","../files/seriales_700/"+data.imagen4);
		$("#imagenactual4").val(data.imagen4);


		$("#imagenmuestra5").show();
		$("#imagenmuestra5").attr("src","../files/comisionamiento_pre_700/"+data.imagen5);
		$("#imagenactual5").val(data.imagen5);

		$("#imagenmuestra6").show();
		$("#imagenmuestra6").attr("src","../files/reporte_radiante_pre_700/"+data.imagen6);
		$("#imagenactual6").val(data.imagen6);

		$("#imagenmuestra7").show();
		$("#imagenmuestra7").attr("src","../files/acta_hfd_700/"+data.imagen7);
		$("#imagenactual7").val(data.imagen7);

		$("#imagenmuestra8").show();
		$("#imagenmuestra8").attr("src","../files/acta_hfni_700/"+data.imagen8);
		$("#imagenactual8").val(data.imagen8);

		$("#imagenmuestra9").show();
		$("#imagenmuestra9").attr("src","../files/acta_hb_700/"+data.imagen9);
		$("#imagenactual9").val(data.imagen9);

		$("#imagenmuestra10").show();
		$("#imagenmuestra10").attr("src","../files/reporte_radiante_post_700/"+data.imagen10);
		$("#imagenactual10").val(data.imagen10);


		$("#imagenmuestra11").show();
		$("#imagenmuestra11").attr("src","../files/comisionamiento_post_700/"+data.imagen11);
		$("#imagenactual11").val(data.imagen11);

		$("#imagenmuestra12").show();
		$("#imagenmuestra12").attr("src","../files/registro_bts_700/"+data.imagen12);
		$("#imagenactual12").val(data.imagen12);
 	
		$("#imagenmuestra13").show();
		$("#imagenmuestra13").attr("src","../files/pruebasvozydatos_700/"+data.imagen13);
		$("#imagenactual13").val(data.imagen13);

		 $("#archivo").attr("href", "../files/tss_700/"+data.imagen);
		 $("#imagenactual").val(data.imagen);

		 $("#archivo2").attr("href", "../files/packinglist_700/"+data.imagen2);
		 $("#imagenactual2").val(data.imagen2);

		 $("#archivo3").attr("href", "../files/hwcontrol_700/"+data.imagen3);
		 $("#imagenactual3").val(data.imagen3);

		 $("#archivo4").attr("href", "../files/seriales_700/"+data.imagen4);
		 $("#imagenactual4").val(data.imagen4);

		 $("#archivo5").attr("href", "../files/comisionamiento_pre_700/"+data.imagen5);
		 $("#imagenactual5").val(data.imagen5);

		 $("#archivo6").attr("href", "../files/reporte_radiante_pre_700/"+data.imagen6);
		 $("#imagenactual6").val(data.imagen6);

		 $("#archivo7").attr("href", "../files/acta_hfd_700/"+data.imagen7);
		 $("#imagenactual7").val(data.imagen7);

		 $("#archivo8").attr("href", "../files/acta_hfni_700/"+data.imagen8);
		 $("#imagenactual8").val(data.imagen8);


		 $("#archivo9").attr("href", "../files/acta_hb_700/"+data.imagen9);
		 $("#imagenactual9").val(data.imagen9);

		 $("#archivo10").attr("href", "../files/reporte_radiante_post_700/"+data.imagen10);
		 $("#imagenactual10").val(data.imagen10);


		 $("#archivo11").attr("href", "../files/comisionamiento_post_700/"+data.imagen11);
		 $("#imagenactual11").val(data.imagen11);


		 $("#archivo12").attr("href", "../files/registro_bts_700/"+data.imagen12);
		 $("#imagenactual12").val(data.imagen12);

		 $("#archivo13").attr("href", "../files/pruebasvozydatos_700/"+data.imagen13);
		 $("#imagenactual13").val(data.imagen13);


		 listarhw();

 		generarbarcode();

 	})
}

function mostrarhw(idsite)
{
	$.post("../ajax/womhw.php?op=mostrarhw",{idsite : idsite}, function(data, status)
	{
		data = JSON.parse(data);		
		mostrarform2(true);

		$('#idsite').selectpicker('refresh');
		$("#idsite").val(data.idsite);
		// $("#nombre").val(data.documento);
		// $('#idwomhw').selectpicker('refresh');
		// $("#documento").val(data.documento);
		// $('#documento').selectpicker('refresh');
		// $("#num_documento").val(data.num_documento);
		// $("#idcapex").val(data.idcapex);
		// $('#idcapex').selectpicker('refresh');
		// $("#idsite").val(data.idsite);
		// $('#idsite').selectpicker('refresh');
		// $("#codigo").val(data.codigo);
		// $("#elemento").val(data.elemento);
		// $("#serial").val(data.serial);
		// $("#estado").val(data.estado);
		// $('#estado').selectpicker('refresh');
		// $("#ubicacion").val(data.ubicacion);
		// $('#ubicacion').selectpicker('refresh');
		// $("#sitiofinal").val(data.sitiofinal);
		// $('#sitiofinal').selectpicker('refresh');
		// $("#observacion").val(data.observacion);
		// $("#imagenmuestra").show();
		// $("#imagenmuestra").attr("src","../files/womhws/"+data.imagen);
		// $("#imagenactual").val(data.imagen);

	 });
}

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
					url: '../ajax/site.php?op=listarArticulos',
					type : "get",
					dataType : "json",						
					error: function(e){
						console.log(e.responseText);	
					}
				},
		"bDestroy": true,
		"iDisplayLength": 5,//Paginación
	    "order": [[ 0, "desc" ]]//Ordenar (columna,orden)
	}).DataTable();
}


//Función para desactivar registros
function desactivar(idsite)
{
	bootbox.confirm("¿Está Seguro de rechazar el Sitio?", function(result){
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
	bootbox.confirm("¿Está Seguro de aprobar el Sitio?", function(result){
		if(result)
        {
        	$.post("../ajax/site.php?op=activar", {idsite : idsite}, function(e){
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


function myInformacion(){

	var x1 = document.getElementById("divInformacion");
	var x2 = document.getElementById("divDocumentos");
	var uno = document.getElementById('btndocumentos');
	
   
	if (x1.style.display === "none" && uno.innerText == 'INFORMACION' ) {

        x1.style.display = "block";
		x2.style.display = "none";
		
		
		$('#btndocumentos').removeClass('btn-primary').addClass('btn-success');
	
		uno.innerText = 'DOCUMENTOS';

		//$('#btndocumentos').removeClass('fa fa-file-archive-o').addClass('fa fa-info');

		$("#btnhw").show();	


    } else {
			x1.style.display = "none";
			x2.style.display = "block";

	   $('#btndocumentos').removeClass('btn-success').addClass('btn-primary');
	   uno.innerText = 'INFORMACION';
	   $("#btnhw").hide();	

			
    }

}


function myInfo(){

	var x1 = document.getElementById("divInformacion");
	var x2 = document.getElementById("divDocumentos");
	var x3 = document.getElementById("listadoregistros2");
	var uno = document.getElementById('btnhw');

	
   
	if (x1.style.display === "none" && uno.innerText == 'INFORMACION' ) {

        x1.style.display = "block";
		x2.style.display = "none";
		x3.style.display = "none";
		$("#btndocumentos").show();	
		$("#btnGuardar").show();
		$("#btnCancelar").show();
		$("#btnagregar2").hide();	
		
		
	
		$('#btnhw').removeClass('btn-primary').addClass('btn-danger');
	
		uno.innerText = 'HADWARE';

		//$('#btndocumentos').removeClass('fa fa-file-archive-o').addClass('fa fa-info');


    } else {
			x1.style.display = "none";
			x2.style.display = "none";
			x3.style.display = "block";
			$("#btndocumentos").hide();	
		$('#btnhw').removeClass('btn-danger').addClass('btn-primary');
	   uno.innerText = 'INFORMACION';

	   $("#btnGuardar").hide();
	   $("#btnCancelar").hide();
	   $("#btnagregar2").show();	

			
    }

}



function mysDocumentos(){

	var x1 = document.getElementById("divDocumentos");
	
   
	if (x1.style.display === "none"  ) {
        x1.style.display = "block";
	
    } else {
		x1.style.display = "none";
    }

}



function myUbicacion() {
	
    var x1 = document.getElementById("myU1");
    var x2 = document.getElementById("myU2");
    var x4 = document.getElementById("myU4");
    var x5 = document.getElementById("myU5");
    var x6 = document.getElementById("myU6");
    var x7 = document.getElementById("myU7");

    if (x1.style.display === "none" && x2.style.display === "none"  && x4.style.display === "none" && x5.style.display === "none"  && x6.style.display === "none" && x7.style.display === "none" ) {
        x1.style.display = "block";
		x2.style.display = "block";
		x4.style.display = "block";
		x5.style.display = "block";
		x6.style.display = "block";
		x7.style.display = "block";
    } else {
		x1.style.display = "none";
		x2.style.display = "none";
		x4.style.display = "none";
		x5.style.display = "none";
		x6.style.display = "none";
		x7.style.display = "none";
    }
}


function myFunction() {
    var x = document.getElementById("myDIV");
	var y = document.getElementById("myDIV2");
	var z = document.getElementById("myDIV3");
    if (x.style.display === "none" && y.style.display === "none" && z.style.display === "none") {
        x.style.display = "block";
		y.style.display = "block";
		z.style.display = "block";
    } else {
        x.style.display = "none";
		y.style.display = "none";
		z.style.display = "none";
    }
}



init();