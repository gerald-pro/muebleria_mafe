<?php

require_once "../controladores/pagos.controlador.php";
require_once "../modelos/pagos.modelo.php";

if (isset($_POST["idVenta"])) {
    $idVenta = $_POST["idVenta"];
    
    // Llamar al controlador que obtiene el total pagado
    $respuesta = ControladorPagos::ctrMostrarDetallePagoPorVenta($idVenta);
    
    // Devolver la respuesta como JSON
    echo json_encode($respuesta);
}