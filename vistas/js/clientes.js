/*=============================================
EDITAR CLIENTE
=============================================*/
$(".tablas").on("click", ".btnEditarCliente", function(){

	var idCliente = $(this).attr("idCliente");

	var datos = new FormData();
    datos.append("idCliente", idCliente);

    $.ajax({

      url:"ajax/clientes.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){
          console.log("respuesta", respuesta);
      
      	   $("#idCliente").val(respuesta["id"]);
	       $("#editarCliente").val(respuesta["nombre"]);
	       $("#editarDocumentoId").val(respuesta["documento"]);
	       $("#editarTelefono").val(respuesta["telefono"]);
	       $("#editarDireccion").val(respuesta["direccion"]);
        
	  }

  	})

})

/*=============================================
ELIMINAR CLIENTE
=============================================*/
$(".tablas").on("click", ".btnEliminarCliente", function(){

	var idCliente = $(this).attr("idCliente");
	
	swal({
        title: '¿Está seguro de borrar el cliente?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar cliente!'
      }).then(function(result){
        if (result.value) {
          
            window.location = "index.php?ruta=clientes&idCliente="+idCliente;
        }

  })

})


/*=============================================
VALIDACION AGREGAR CLIENTE
=============================================*/
function validarSoloLetras() {
  var input = document.getElementById('nuevoCliente');
  var errorMensaje = document.getElementById('errorMensajeNombre');
  var regex = /^[a-zA-Z\s]+$/;

  // Validar si el valor contiene solo letras y espacios
  if (!regex.test(input.value)) {
    errorMensaje.style.display = 'block';
    input.value = input.value.replace(/[^a-zA-Z\s]/g, '');  // Elimina números y caracteres no permitidos
  } else {
    errorMensaje.style.display = 'none';
  }
}

function validarSoloNumeros() {
  var input = document.getElementById('nuevoTelefono');
  var errorMensaje = document.getElementById('errorMensajeTelefono');
  var regex = /^[0-9]+$/;

  // Validar si el valor contiene solo números
  if (!regex.test(input.value)) {
    errorMensaje.style.display = 'block';
    input.value = input.value.replace(/[^0-9]/g, '');  // Elimina letras y caracteres no permitidos
  } else {
    errorMensaje.style.display = 'none';
  }
}


/*=============================================
VALIDACION EDITAR CLIENTE
=============================================*/
function validarSoloLetrasEditar() {
  var input = document.getElementById('editarCliente');
  var errorMensaje = document.getElementById('errorMensajeEditarCliente');
  var regex = /^[a-zA-Z\s]+$/;

  // Validar si el valor contiene solo letras y espacios
  if (!regex.test(input.value)) {
    errorMensaje.style.display = 'block';
    input.value = input.value.replace(/[^a-zA-Z\s]/g, '');  // Elimina caracteres no permitidos
  } else {
    errorMensaje.style.display = 'none';
  }
}

function validarSoloNumerosEditar() {
  var input = document.getElementById('editarTelefono');
  var errorMensaje = document.getElementById('errorMensajeEditarTelefono');
  var regex = /^[0-9]+$/;

  // Validar si el valor contiene solo números
  if (!regex.test(input.value)) {
    errorMensaje.style.display = 'block';
    input.value = input.value.replace(/[^0-9]/g, '');  // Elimina letras y caracteres no permitidos
  } else {
    errorMensaje.style.display = 'none';
  }
}

