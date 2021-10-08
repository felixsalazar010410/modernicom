var tabla;

//Función que se ejecuta al inicio
function init(){
	mostrarform(false);
	listar();

	$("#formulario").on("submit",function(e)
	{
		guardaryeditar(e);	
	});
    $('#mAlmacen').addClass("treeview active");
    $('#lCronogramas').addClass("active");
}

//Función limpiar
function limpiar()
{
	$("#idcronograma").val("");
	$("#fecha").val("");
	$("#site").val("");
	$("#banda").val("");
	$("#actividad").val("");
	$("#chg").val("");
	$("#lider").val("");
	$("#telefono").val("");
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
	    //dom: '<Bl<f>rtip>',//Definimos los elementos del control de tabla
		dom: 'lrtip',
	    buttons: [		          
		          
		        ],
		"ajax":
				{
					url: '../ajax/cronograma.php?op=listar',
					type : "get",
					dataType : "json",						
					error: function(e){
					}
				},
		"language": {
            "lengthMenu": "Mostrar : _MENU_ registros",
        },

		"paging": false,
	}
	
	
	).DataTable()	

	$('#tbllistado')
	.on( 'mouseenter', 'td', function () {
		var colIdx = tabla.cell(this).index().column;

		$( tabla.cells().nodes() ).removeClass( 'highlight' );
		$( tabla.column( colIdx ).nodes() ).addClass( 'highlight' );
	} );
		
}
//Función para guardar o editar

function guardaryeditar(e)
{
	e.preventDefault(); //No se activará la acción predeterminada del evento
	$("#btnGuardar").prop("disabled",true);
	var formData = new FormData($("#formulario")[0]);

	$.ajax({
		url: "../ajax/cronograma.php?op=guardaryeditar",
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

function mostrar(idcronograma)
{
	$.post("../ajax/cronograma.php?op=mostrar",{idcronograma : idcronograma}, function(data, status)
	{
		data = JSON.parse(data);		
		mostrarform(true);

		$("#fecha").val(data.fecha);
		$("#site").val(data.site);
		$("#banda").val(data.banda);
		$("#actividad").val(data.actividad);
		$("#chg").val(data.chg);
		$("#lider").val(data.lider);
		$("#telefono").val(data.telefono);
 		$("#idcronograma").val(data.idcronograma);

 	})
}

//Función para desactivar registros
function desactivar(idcronograma)
{
	bootbox.confirm("¿Está Seguro de desactivar la Site?", function(result){
		if(result)
        {
        	$.post("../ajax/cronograma.php?op=desactivar", {idcronograma : idcronograma}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}

//Función para activar registros
function activar(idcronograma)
{
	bootbox.confirm("¿Está Seguro de activar la Site?", function(result){
		if(result)
        {
        	$.post("../ajax/cronograma.php?op=activar", {idcronograma : idcronograma}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}


init();