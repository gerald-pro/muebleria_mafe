/*=============================================
EDITAR CATEGORIA
=============================================*/
$(".tablas").on("click", ".btnEditarCategoria", function(){

	var idCategoria = $(this).attr("idCategoria");

	var datos = new FormData();
	datos.append("idCategoria", idCategoria);

	$.ajax({
		url: "ajax/categorias.ajax.php",
		method: "POST",
      	data: datos,
      	cache: false,
     	contentType: false,
     	processData: false,
     	dataType:"json",
     	success: function(respuesta){

     		$("#editarCategoria").val(respuesta["categoria"]);
     		$("#idCategoria").val(respuesta["id"]);

     	}

	})


})

/*=============================================
ELIMINAR CATEGORIA
=============================================*/
$(".tablas").on("click", ".btnEliminarCategoria", function(){

	 var idCategoria = $(this).attr("idCategoria");

	 swal({
	 	title: '¿Está seguro de borrar la categoría?',
	 	text: "¡Si no lo está puede cancelar la acción!",
	 	type: 'warning',
	 	showCancelButton: true,
	 	confirmButtonColor: '#3085d6',
	 	cancelButtonColor: '#d33',
	 	cancelButtonText: 'Cancelar',
	 	confirmButtonText: 'Si, borrar categoría!'
	 }).then(function(result){

	 	if(result.value){

	 		window.location = "index.php?ruta=categorias&idCategoria="+idCategoria;

	 	}

	 })

})

/*=============================================
VALIDACION AGREGAR CATEGORIA
=============================================*/

function validarLetrasNumeros() {
    var input = document.getElementById('nuevaCategoria');
    var errorMensaje = document.getElementById('errorMensaje');
    
    // Expresión regular que solo permite letras, números y espacios
    var regex = /^[a-zA-Z0-9\s]+$/;

    // Validar si el valor contiene solo letras y números
    if (!regex.test(input.value)) {
      // Si hay caracteres no válidos, mostramos el mensaje de error
      errorMensaje.style.display = 'block';
      // Elimina caracteres no permitidos
      input.value = input.value.replace(/[^a-zA-Z0-9\s]/g, '');
    } else {
      // Si el valor es válido, ocultamos el mensaje de error
      errorMensaje.style.display = 'none';
    }
}

/*=============================================
VALIDACION EDITAR CATEGORIA
=============================================*/
function validarLetrasNumerosEditar() {
	var input = document.getElementById('editarCategoria');
	var errorMensaje = document.getElementById('errorMensajeEditar');
	var regex = /^[a-zA-Z0-9\s]+$/;
  
	// Validar si el valor contiene solo letras y números
	if (!regex.test(input.value)) {
	  errorMensaje.style.display = 'block';
	  input.value = input.value.replace(/[^a-zA-Z0-9\s]/g, '');  // Elimina caracteres especiales
	} else {
	  errorMensaje.style.display = 'none';
	}
}