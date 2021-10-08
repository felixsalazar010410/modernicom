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
	})


	$("#formulario2").on("submit",function(e)
	{
		//yguardaryeditar(e);	
	})

	//Cargamos los items al select proyecto
	$.post("../ajax/site.php?op=selectProyecto", function(r){
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


	$("#imagenmuestra").hide();
	$('#mTemwok').addClass("treeview active");
	$('#lProyectos').addClass("active");
	$('#pSran').tab('show')


	

	
//Cargamos los items al select persona
	$.post("../ajax/site.php?op=selectPersona", function(r){
		$("#lider_cuadrilla").html(r);
		$('#lider_cuadrilla').selectpicker('refresh');

 
});
	
}

//Función limpiar
function limpiar()
{
	$("#nombre").val("");
	$("#idwomhw").val("");
	$("#descripcion").val("");
	$("#nombre2").val("");
	$("#torrero").val("");
	$("#tipo_instalacion").val("");
	$("#configuracion").val("");
	$("#carrier").val("");
	$("#transmision").val("");
	$("#banda11").val("");
	$("#banda12").val("");
	$("#banda13").val("");
	$("#banda21").val("");
	$("#banda22").val("");
	$("#banda23").val("");
	$("#banda31").val("");
	$("#banda32").val("");
	$("#banda33").val("");
	$("#altura11").val("");
	$("#altura12").val("");
	$("#altura13").val("");
	$("#altura21").val("");
	$("#altura22").val("");
	$("#altura23").val("");
	$("#altura31").val("");
	$("#altura32").val("");
	$("#altura33").val("");
	$("#azimut11").val("");
	$("#azimut12").val("");
	$("#azimut13").val("");
	$("#azimut21").val("");
	$("#azimut22").val("");
	$("#azimut23").val("");
	$("#azimut31").val("");
	$("#azimut32").val("");
	$("#azimut33").val("");
	$("#electrico11").val("");
	$("#electrico12").val("");
	$("#electrico13").val("");
	$("#electrico21").val("");
	$("#electrico22").val("");
	$("#electrico23").val("");
	$("#electrico31").val("");
	$("#electrico32").val("");
	$("#electrico33").val("");
	$("#mecanico11").val("");
	$("#mecanico12").val("");
	$("#mecanico13").val("");
	$("#mecanico21").val("");
	$("#mecanico22").val("");
	$("#mecanico23").val("");
	$("#mecanico31").val("");
	$("#mecanico32").val("");
	$("#mecanico33").val("");
	$("#regional").val("");
	$("#departamento").val("");
	$("#municipal_dane").val("");
	$("#categoria").val("");
	$("#direccion").val("");
	$("#latitud").val("");
	$("#longitud").val("");
	$("#lider_cuadrilla").val("");
	$("#estado_sitio").val("");
	$("#imagenmuestra").attr("src","");
	$("#imagenmuestra2").attr("src","");
	$("#imagenmuestra3").attr("src","");
	$("#imagenmuestra4").attr("src","");
	$("#archivo").attr("src","");
	$("#imagenactual").val("");
	$("#imagenactual2").val("");
	$("#imagenactual3").val("");
	$("#imagenactual4").val("");
	$("#print").hide();
	$("#idsite").val("");
	$("#codigo").val("");
	$("#idusuario").val("");
	$("#fecha_carga").val("");
	$("#observacion").val("");
	$("#idusuario2").val("");
	$("#fecha_carga2").val("");
	$("#observacion2").val("");
	$("#idusuario3").val("");
	$("#fecha_carga3").val("");
	$("#observacion3").val("");
	$("#idusuario4").val("");
	$("#fecha_carga4").val("");
	$("#observacion4").val("");
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
		$("#btnall").hide();
		$("#btnaprobados").hide();
		$("#btnrechazado").hide();
		$("#btninformacion").show();
		$("#btndocumentos").show();	
		$("#btnhw").show();	
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

	$("#btnaprobados").show();
	$("#btnrechazado").show();
	$("#btnall").hide();
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
					url: '../ajax/site.php?op=listarsran',
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
					url: '../ajax/site.php?op=listarwomaprobados',
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
					url: '../ajax/site.php?op=listarwomrechazados',
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
		url: "../ajax/site.php?op=guardaryeditarwom",
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


function guardaryeditar2(e)
{
	e.preventDefault(); //No se activará la acción predeterminada del evento
	$("#btnGuardar").prop("disabled",true);
	var formData = new FormData($("#formulario2")[0]);
	

	$.ajax({
		url: "../ajax/site.php?op=guardaryeditarwom",
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
		$("#idusuario2").val(data.idusuario2);
		$('#idusuario2').selectpicker('refresh');
		$("#idusuario3").val(data.idusuario3);
		$('#idusuario3').selectpicker('refresh');
		$("#nombre").val(data.nombre);
		$("#codigo").val(data.codigo);
		$("#regional").val(data.regional);
		$('#regional').selectpicker('refresh');
		$("#departamento").val(data.departamento);
		$('#departamento').selectpicker('refresh');
		$("#municipal_dane").val(data.municipal_dane);
		$("#categoria").val(data.categoria);
		$('#categoria').selectpicker('refresh');
		$("#direccion").val(data.direccion);
		$("#latitud").val(data.latitud);
		$("#longitud").val(data.longitud);
		$("#lider_cuadrilla").val(data.lider_cuadrilla);
		$('#lider_cuadrilla').selectpicker('refresh');
		$("#estado_sitio").val(data.estado_sitio);
		$("#descripcion").val(data.descripcion);
		$("#nombre2").val(data.nombre2);
		$("#torrero").val(data.torrero);
		$('#torrero').selectpicker('refresh');
		$("#tipo_instalacion").val(data.tipo_instalacion);
		$('#tipo_instalacion').selectpicker('refresh');
		$("#configuracion").val(data.configuracion);
		$("#carrier").val(data.carrier);
		$("#transmision").val(data.transmision);
		$("#banda11").val(data.banda11);
		$("#banda12").val(data.banda12);
		$("#banda13").val(data.banda13);
		$("#banda21").val(data.banda21);
		$("#banda22").val(data.banda22);
		$("#banda23").val(data.banda23);
		$("#banda31").val(data.banda31);
		$("#banda32").val(data.banda32);
		$("#banda33").val(data.banda33);
		$("#altura11").val(data.altura11);
		$("#altura12").val(data.altura12);
		$("#altura13").val(data.altura13);
		$("#altura21").val(data.altura21);
		$("#altura22").val(data.altura22);
		$("#altura23").val(data.altura23);
		$("#altura31").val(data.altura31);
		$("#altura32").val(data.altura32);
		$("#altura33").val(data.altura33);
		$("#azimut11").val(data.azimut11);
		$("#azimut12").val(data.azimut12);
		$("#azimut13").val(data.azimut13);
		$("#azimut21").val(data.azimut21);
		$("#azimut22").val(data.azimut22);
		$("#azimut23").val(data.azimut23);
		$("#azimut31").val(data.azimut31);
		$("#azimut32").val(data.azimut32);
		$("#azimut33").val(data.azimut33);
		$("#electrico11").val(data.electrico11);
		$("#electrico12").val(data.electrico12);
		$("#electrico13").val(data.electrico13);
		$("#electrico21").val(data.electrico21);
		$("#electrico22").val(data.electrico22);
		$("#electrico23").val(data.electrico23);
		$("#electrico31").val(data.electrico31);
		$("#electrico32").val(data.electrico32);
		$("#electrico33").val(data.electrico33);
		$("#mecanico11").val(data.mecanico11);
		$("#mecanico12").val(data.mecanico12);
		$("#mecanico13").val(data.mecanico13);
		$("#mecanico21").val(data.mecanico21);
		$("#mecanico22").val(data.mecanico22);
		$("#mecanico23").val(data.mecanico23);
		$("#mecanico31").val(data.mecanico31);
		$("#mecanico32").val(data.mecanico32);
		$("#mecanico33").val(data.mecanico33);
		$("#idsite").val(data.idsite);

		$("#fecha_carga").val(data.fecha_carga);
		$("#observacion").val(data.observacion);

		$("#fecha_carga2").val(data.fecha_carga2);
		$("#observacion2").val(data.observacion2);

		
		$("#fecha_carga3").val(data.fecha_carga3);
		$("#observacion3").val(data.observacion3);
		
		
		$("#imagenmuestra").show();
		$("#imagenmuestra").attr("src","../files/packinglist/"+data.imagen);
		$("#imagenactual").val(data.imagen);

		$("#imagenmuestra2").show();
		$("#imagenmuestra2").attr("src","../files/preatp/"+data.imagen2);
		$("#imagenactual2").val(data.imagen2);


		$("#imagenmuestra3").show();
		$("#imagenmuestra3").attr("src","../files/invdesmonte/"+data.imagen3);
		$("#imagenactual3").val(data.imagen3);


		$("#imagenmuestra4").show();
		$("#imagenmuestra4").attr("src","../files/atp/"+data.imagen4);
		$("#imagenactual4").val(data.imagen4);

 	

		 $("#archivo").attr("href", "../files/packinglist/"+data.imagen);
		 $("#imagenactual").val(data.imagen);

		 $("#archivo2").attr("href", "../files/preatp/"+data.imagen2);
		 $("#imagenactual2").val(data.imagen2);

		 $("#archivo3").attr("href", "../files/invdesmonte/"+data.imagen3);
		 $("#imagenactual3").val(data.imagen3);

		 $("#archivo4").attr("href", "../files/atp/"+data.imagen4);
		 $("#imagenactual4").val(data.imagen4);


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
//Función para desactivar registros
function desactivar(idsite)
{
	bootbox.confirm("¿Está Seguro de desactivar el artículo?", function(result){
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
	bootbox.confirm("¿Está Seguro de activar el Artículo?", function(result){
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
    var x3 = document.getElementById("myU3");
    var x4 = document.getElementById("myU4");
    var x5 = document.getElementById("myU5");
    var x6 = document.getElementById("myU6");
    var x7 = document.getElementById("myU7");

    if (x1.style.display === "none" && x2.style.display === "none" && x3.style.display === "none" && x4.style.display === "none" && x5.style.display === "none"  && x6.style.display === "none" && x7.style.display === "none" ) {
        x1.style.display = "block";
		x2.style.display = "block";
		x3.style.display = "block";
		x4.style.display = "block";
		x5.style.display = "block";
		x6.style.display = "block";
		x7.style.display = "block";
    } else {
		x1.style.display = "none";
		x2.style.display = "none";
		x3.style.display = "none";
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