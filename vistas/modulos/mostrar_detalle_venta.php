<?php
include "controladores/ventas.controlador.php"; // Asegúrate de incluir tu controlador

$idVenta = $_GET['id'];

// Llamar a la función que obtiene los detalles de la venta
$pagos = ControladorVentas::ctrMostrarDetallePago($idVenta);

foreach ($pagos as $pago) {
    echo "<tr>
        <td>{$pago['id_venta']}</td>
        <td>{$pago['id_pago']}</td>
        <td>Bs " . number_format($pago['total_venta'], 2) . "</td>
        <td>Bs " . number_format($pago['monto_pago'], 2) . "</td>
        <td>{$pago['fecha_pago']}</td>
    </tr>";
}
?>
