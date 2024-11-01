<?php

require_once "../../../controladores/productos.controlador.php";
require_once "../../../modelos/productos.modelo.php";
require_once "../examples/tcpdf_include.php";

class imprimirReporteProductos {

    public function generarReporteProductos() {
        // Crear una nueva instancia de TCPDF en orientación vertical (Portrait)
        $pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        // Añadir una página
        $pdf->AddPage();

        // Información del encabezado del reporte
        $bloque1 = <<<EOF
        <table style="width: 100%; margin-bottom: 20px;">
            <tr>
                <td style="width: 60%; vertical-align: top;"><img src="../../../vistas/img/factura/1.png" width="70" height="auto"></td>
                <td style="width: 40%; text-align:right; vertical-align: top;">
                    <div style="font-size:10px; line-height:15px;">
                        Dirección: Barrio Roca y Coronado calle 12 de octubre<br>
                        Teléfono: 78171596<br>
                        muebleriaa&f@gmail.com
                    </div>
                </td>
            </tr>
        </table>
EOF;

        $pdf->writeHTML($bloque1, false, false, false, false, '');

        // Título del reporte
        $bloqueTitulo = <<<EOF
        <h1 style="text-align:center; margin-bottom: 20px; color: #747a80;">REPORTE DE PRODUCTOS</h1>
        <br>
EOF;
        $pdf->writeHTML($bloqueTitulo, false, false, false, false, '');

        // Traemos la información de todos los productos
        $productos = ControladorProductos::ctrMostrarProductos(null, null, 'id');

        // Inicializar contador de filas
        $contadorFilas = 0;

        // Tabla de productos con los nuevos campos añadidos
        $tablaProductos = <<<EOF
        <table style="font-size:10px; padding:5px 10px; border-collapse: collapse; text-align: center;">
            <tr>
                <td style="border: 1px solid #666; background-color:#d2b48c; width:80px; font-weight: bold;">Código</td>
                <td style="border: 1px solid #666; background-color:#d2b48c; width:150px; font-weight: bold;">Descripción</td>
                <td style="border: 1px solid #666; background-color:#d2b48c; width:80px; font-weight: bold;">Stock</td>
                <td style="border: 1px solid #666; background-color:#d2b48c; width:80px; font-weight: bold;">Medidas</td>
                <td style="border: 1px solid #666; background-color:#d2b48c; width:80px; font-weight: bold;">Color</td>
                <td style="border: 1px solid #666; background-color:#d2b48c; width:80px; font-weight: bold;">Precio Venta (Bs.)</td>
            </tr>
EOF;

        // Agregar las filas de productos
        foreach ($productos as $producto) {
            // Incrementar el contador de filas
            $contadorFilas++;

            $codigo = $producto['codigo'];
            $descripcion = $producto['descripcion'];
            $stock = $producto['stock'];
            $medidas = $producto['medidas'];
            $color = $producto['color'];
            $precioVenta = number_format($producto['precio_venta'], 2); // Formatear el precio a 2 decimales

            $tablaProductos .= <<<EOF
            <tr>
                <td style="border: 1px solid #666;">$codigo</td>
                <td style="border: 1px solid #666;">$descripcion</td>
                <td style="border: 1px solid #666;">$stock</td>
                <td style="border: 1px solid #666;">$medidas</td>
                <td style="border: 1px solid #666;">$color</td>
                <td style="border: 1px solid #666;">Bs. $precioVenta</td>
            </tr>
EOF;
        }

        $tablaProductos .= "</table>";

        // Mostrar la tabla de productos en el PDF
        $pdf->writeHTML($tablaProductos, false, false, false, false, '');

        // Mostrar el total de filas al final
        $bloqueTotalFilas = <<<EOF
        <br><br>
        <h3 style="text-align: center;">Total de productos registrados: $contadorFilas</h3>
EOF;
        $pdf->writeHTML($bloqueTotalFilas, false, false, false, false, '');

        // Salida del archivo en formato vertical
        $pdf->Output('productos.pdf', 'I'); // Mostrar en el navegador
    }
}

// Instanciar la clase e invocar el método para generar el reporte de productos
$reporteProductos = new imprimirReporteProductos();
$reporteProductos->generarReporteProductos();
?>
