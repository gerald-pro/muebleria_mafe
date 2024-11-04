<?php

require_once "../controladores/pagos.controlador.php";
require_once "../controladores/ventas.controlador.php";
require_once "../modelos/pagos.modelo.php";
require_once "../modelos/ventas.modelo.php";

if (isset($_POST["idVenta"])) {
    $idVenta = $_POST["idVenta"];

    // Llamar al controlador que obtiene el total pagado
    $totales = ControladorPagos::ctrObtenerTotalPagadoPorVenta($idVenta);

    $venta = ControladorVentas::buscarPorId($idVenta);

    $venta += $totales;

    // Devolver la respuesta como JSON
    echo json_encode($venta);
}
