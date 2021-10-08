var tabla;

//Función que se ejecuta al inicio
function init(){

	$("#formulario").on("submit",function(e)
	{
		guardaryeditar(e);	
	})

	//Cargamos los items al select categoria
	$.post("../ajax/articulo.php?op=selectCategoria", function(r){
	            $("#idcategoria").html(r);
				$('#idcategoria').selectpicker('refresh');
				

	});
	$("#imagenmuestra").hide();
	$('#mAlmacen').addClass("treeview active");
	$('#lArticulos').addClass("active");
	$('#pArticulo').tab('show')
}

init();