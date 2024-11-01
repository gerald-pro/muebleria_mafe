<div class="content-wrapper">
    <section class="content-header">
        <h1 align="center">ADMINISTRACIÓN DE PAGOS</h1>
        <ol class="breadcrumb">
            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Administrar pagos</li>
        </ol>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <!-- Botón para ir a Ventas -->
                <a href="ventas" class="btn btn-success">Ir a Ventas</a>
                
                <button type="button" class="btn btn-default pull-right" id="daterange-btn">
                    <span>
                        <i class="fa fa-calendar"></i>
                        <?php
                        if (isset($_GET["fechaInicial"])) {
                            echo $_GET["fechaInicial"] . " - " . $_GET["fechaFinal"];
                        } else {
                            echo 'Rango de fecha';
                        }
                        ?>
                    </span>
                    <i class="fa fa-caret-down"></i>
                </button>
            </div>

            <div class="box-body">
                <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
                    <thead>
                        <tr>
                            <th style="width:10px">#</th>
                            <th>ID VENTA</th>
                            <th>FECHA</th>
                            <th>TOTAL</th>
                            <th>TIPO</th>
                            <th>ESTADO</th>
                            <th>SALDO</th>
                            <th>ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Consulta para obtener los pagos
                        $respuesta = ControladorVentas::ctrMostrarVentasPagos();

                        foreach ($respuesta as $key => $value) {
                            // Comprobar si el saldo es igual al total para definir el estado
                            if ($value["saldo"] == $value["total"]) {
                                $estado = "Pagado";
                                $estadoClase = "btn-success";
                            } else {
                                $estado = "Debe";
                                $estadoClase = "btn-danger";
                            }

                            echo '<tr>
                                <td>' . ($key + 1) . '</td>
                                <td>' . $value["id"] . '</td>
                                <td>' . $value["fecha"] . '</td>
                                <td>Bs ' . number_format($value["total"]) . '</td>
                                <td>' . $value["tipo"] . '</td>
                                <td><button class="btn ' . $estadoClase . '">' . $estado . '</button></td>
                                <td>Bs ' . number_format($value["saldo"]) . '</td>
                                <td>
                                    <button class="btn btn-info btnVerPago" id="' . $value["id"] . '" data-toggle="modal" data-target="#modalVerVenta">
                                        <i class="fa fa-eye"></i> Ver
                                    </button>
                                </td>
                            </tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

<!-- Modal de Ver Detalles de Venta -->
<div class="modal fade" id="modalVerVenta" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Encabezado del Modal con fondo celeste oscuro y título en blanco -->
            <div class="modal-header" style="background-color: #357ca5;">
                <h4 class="modal-title text-white font-weight-bold" id="exampleModalLabel" style="font-size: 1.5rem;">
                    
                </h4>
                <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
            </div>

             <!-- Título debajo de la tabla -->
             <div style="margin-top: 20px;">
                    <h3 class="font-weight-bold text-center" style="color: black;">DETALLE  DE PAGOS</h3>
                </div>

            <div class="modal-body">
                <table class="table table-bordered">
                    <thead style="background-color: #357ca5; color: white;">
                        <tr>
                            <th>ID Venta</th>
                            <th>ID Pago</th>
                            <th>Total</th>
                            <th>Monto Pago</th>
                            <th>Fecha de Pago</th>
                        </tr>
                    </thead>
                    <tbody id="tablaPagos">
                        <?php
                        // Consulta para obtener los pagos
                        $pagos = ControladorVentas::ctrMostrarDetallePago();

                        foreach ($pagos as $key => $value) {
                            echo '<tr>
                                <td>' . $value["id_venta"] . '</td>
                                <td>' . $value["id_pago"] . '</td>
                                <td>Bs ' . number_format($value["total_venta"], 2) . '</td>
                                <td>Bs ' . number_format($value["monto_pago"], 2) . '</td>
                                <td>' . $value["fecha_pago"] . '</td>
                            </tr>';
                        }
                        ?>
                    </tbody>
                </table>

               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
