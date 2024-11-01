$(".tablas").on("click", ".btnpagarventa", function(){


	var idVenta = $(this).attr("idVenta");

	$("#idventapago").val(idVenta);

})

$(".tablas").on("click", ".btnsumatoria", function(){

    var idVenta = $(this).attr("idVenta");

    // Colocar el idVenta en el campo correspondiente del modal
    $("#idventapago").val(idVenta);

    // Hacer la solicitud AJAX para obtener el total pagado
    $.ajax({
        url: "ajax/pagos.ajax.php", // Archivo PHP que manejará la consulta
        method: "POST",
        data: { idVenta: idVenta }, // Enviar el idVenta al servidor
        dataType: "json",
        success: function(respuesta) {
            if (respuesta && respuesta.total_pagado !== null) {
                // Colocar la sumatoria del total pagado en el campo del modal
                $("#totalPagado").val(respuesta.total_pagado);
            } else {
                $("#totalPagado").val("0"); // Si no hay pagos, mostrar 0
            }
        },
        error: function() {
            $("#totalPagado").val("Error al obtener el total pagado");
        }
    });

});


/*=============================================
ELIMINAR CLIENTE
=============================================*/
// Suponiendo que tienes jQuery incluido en tu proyecto
$(".tablas").on("click", ".btnEliminarPago", function() {
    var id_pago = $(this).attr("id_pago");

    swal({
        title: '¿Está seguro de borrar este pago?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar pago!'
      }).then(function(result){
        if (result.value) {
            window.location = "index.php?ruta=pagos&id_pago=" + id_pago;
        }
    });
});


