$(".tablas").on("click", ".btnVerPago", function () {
    var id = $(this).attr("id");
    var datos = new FormData();
    datos.append("idVenta", id);

    $.ajax({
        url: "ajax/ventaspagos.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
            console.log(respuesta)
             $("#tablaPagos").html("");

            var detallesHTML = ``;

            // Asignar detalles de las cuotas pagadas
             if (respuesta) {
                respuesta.forEach(function (detalle) {
                    detallesHTML += 
                       `<tr>
                            <td>${detalle.id_venta}</td>
                            <td>${detalle.id_pago}</td>
                            <td>${detalle.total_venta}</td>
                            <td>${detalle.monto_pago}</td>
                            <td>${detalle.fecha_pago}</td>
                        </tr>`
                });
            } else {
                detallesHTML += `
                    <tr>
                        <td colspan="5">No hay pagos asociados</td>
                    </tr>`;
            }

            $("#tablaPagos").html(detallesHTML);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.error("Error en la solicitud AJAX: ", textStatus, errorThrown);
            console.error("Respuesta del servidor: ", jqXHR.responseText);
        }
    });
});