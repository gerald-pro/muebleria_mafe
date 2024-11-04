$(".tablas").on("click", ".btnpagarventa", function () {
    var idVenta = $(this).attr("idVenta");

    $("#idventapago").val(idVenta);

    var datos = new FormData();
    datos.append("idVenta", idVenta);

    $.ajax({
        url: "ajax/pagos.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
            $("#totalPagado").val(respuesta.total_pagado);
            $("#totalVenta").val(respuesta.total);
            $("#cliente").val(respuesta.cliente);
            $("#vendedor").val(respuesta.vendedor);
            $("#saldoPendiente").val(respuesta.monto_restante);

            console.log(respuesta);
            if (respuesta.monto_restante > 0) {
                $("#montoPago").prop('disabled', false);
                $("#btnConfirmarCambio").prop('disabled', false);
                $("#montoPago").attr({
                    "max": respuesta.monto_restante,
                });
            } else {
                $("#montoPago").prop('disabled', true);
                $("#btnConfirmarCambio").prop('disabled', true);
            }
            
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.error("Error en la solicitud AJAX: ", textStatus, errorThrown);
            console.error("Respuesta del servidor: ", jqXHR.responseText);
        }
    });


})

$(".tablas").on("click", ".btnsumatoria", function () {

    var idVenta = $(this).attr("idVenta");

    // Colocar el idVenta en el campo correspondiente del modal
    $("#idventapago").val(idVenta);

    // Hacer la solicitud AJAX para obtener el total pagado
    $.ajax({
        url: "ajax/pagos.ajax.php", // Archivo PHP que manejará la consulta
        method: "POST",
        data: { idVenta: idVenta }, // Enviar el idVenta al servidor
        dataType: "json",
        success: function (respuesta) {
            if (respuesta && respuesta.total_pagado !== null) {
                // Colocar la sumatoria del total pagado en el campo del modal
                $("#totalPagado").val(respuesta.total_pagado);
            } else {
                $("#totalPagado").val("0"); // Si no hay pagos, mostrar 0
            }
        },
        error: function () {
            $("#totalPagado").val("Error al obtener el total pagado");
        }
    });

});


/*=============================================
ELIMINAR CLIENTE
=============================================*/
// Suponiendo que tienes jQuery incluido en tu proyecto
$(".tablas").on("click", ".btnEliminarPago", function () {
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
    }).then(function (result) {
        if (result.value) {
            window.location = "index.php?ruta=pagos&id_pago=" + id_pago;
        }
    });
});


