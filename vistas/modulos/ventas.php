<?php

if ($_SESSION["perfil"] == "Especial") {
    echo '<script>window.location = "inicio";</script>';
    return;
}

$xml = ControladorVentas::ctrDescargarXML();

if ($xml) {
    rename($_GET["xml"] . ".xml", "xml/" . $_GET["xml"] . ".xml");
    echo '<a class="btn btn-block btn-success abrirXML" archivo="xml/' . $_GET["xml"] . '.xml" href="ventas">Se ha creado correctamente el archivo XML <span class="fa fa-times pull-right"></span></a>';
}

?>
<div class="content-wrapper">

    <section class="content-header">
        <h1 align="center">ADMINISTRACIÓN DE VENTAS/PEDIDOS</h1>
        <ol class="breadcrumb">
            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Administrar ventas / Pedidos</li>
        </ol>
    </section>

    <section class="content">

        <div class="box">
            <div class="box-header with-border">
                <a href="crear-venta">
                    <button class="btn btn-primary">Agregar Venta / Pedido</button>
                </a>

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
                            <th>CLIENTE</th>
                            <th>VENDEDOR</th>
                            <th>FORMA DE PAGO</th>
                            <th>TOTAL</th>
                            <th>SALDO</th>
                            <th>DESCUENTO</th>
                            <th>TIPO</th>
                            <th>ESTADO</th>
                            <th>PAGADO</th>
                            <th>FECHA</th>
                            <th>ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($_GET["fechaInicial"])) {
                            $fechaInicial = $_GET["fechaInicial"];
                            $fechaFinal = $_GET["fechaFinal"];
                        } else {
                            $fechaInicial = null;
                            $fechaFinal = null;
                        }

                        $respuesta = ControladorVentas::ctrRangoFechasVentas($fechaInicial, $fechaFinal);

                        foreach ($respuesta as $key => $value) {
                            echo '<tr>
                                <td>' . ($key + 1) . '</td>';

                            $itemCliente = "id";
                            $valorCliente = $value["id_cliente"];
                            $respuestaCliente = ControladorClientes::ctrMostrarClientes($itemCliente, $valorCliente);
                            echo '<td>' . $respuestaCliente["nombre"] . '</td>';

                            $itemUsuario = "id";
                            $valorUsuario = $value["id_vendedor"];
                            $pagado = $value["pagado"];
                            $respuestaUsuario = ControladorUsuarios::ctrMostrarUsuarios($itemUsuario, $valorUsuario);

                            $montos = ControladorPagos::ctrObtenerTotalPagadoPorVenta($value['id']);

                            echo '<td>' . $respuestaUsuario["nombre"] . '</td>
                                  <td>' . $value["metodo_pago"] . '</td>
                                  <td style="text-align:center">Bs ' . number_format($value["neto"]) . '</td>
                                  <td style="text-align:center">Bs ' . number_format($montos["total_pagado"]) . '</td>
                                  <td style="text-align:center">Bs ' . number_format($value["total"]) . '</td>
                                  <td>' . $value["tipo"] . '</td>';

                            $tipovp = $value["tipo"];
                            $estado = $value["estado"];

                            if ($tipovp == 'Venta') {
                                if ($estado == 2) {
                                    echo '<td><button class="btn btn-danger btn-xs btnActivarPedido" idVenta="' . $value["id"] . '" estadovp="2" tipo="' . $tipovp . '">Finalizado</button></td>';
                                } else {
                                    echo '<td><button class="btn btn-danger btn-xs btnActivarPedido" idVenta="' . $value["id"] . '" estadovp="2" tipo="' . $tipovp . '">Finalizado</button></td>';
                                }
                            } else {
                                if ($estado == 2) {
                                    echo '<td><button class="btn btn-danger btn-xs btnActivarPedido" idVenta="' . $value["id"] . '" estadovp="2" tipo="' . $tipovp . '" data-clics="0">Finalizado</button></td>';
                                } elseif ($estado == 1) {
                                    echo '<td><button class="btn btn-warning btn-xs btnActivarPedido" idVenta="' . $value["id"] . '" estadovp="1" tipo="' . $tipovp . '" data-clics="0">En Proceso</button></td>';
                                } else {
                                    echo '<td><button class="btn btn-success btn-xs btnActivarPedido" idVenta="' . $value["id"] . '" estadovp="0" tipo="' . $tipovp . '" data-clics="0">En Inicio</button></td>';
                                }
                            }

                            if ($montos['monto_restante'] > 0) {
                                echo '<td><button class="btn btn-danger btn-xs">No</button></td>';
                            } else {
                                echo '<td><button class="btn btn-success btn-xs">Si</button></td>';
                            }

                            echo '<td>' . $value["fecha"] . '</td>';

                            echo '<td>
                                <div class="btn-group">
                                  <button class="btn btn-info btnImprimirFactura" codigoVenta="' . $value["codigo"] . '">
                                    <i class="fa fa-print"></i>
                                  </button>';

                            // Verificación para mostrar el botón del modal solo si el método de pago es "A Crédito"
                            //if ($tipovp != 'Venta' && $estado != 2) {
                            echo '<button class="btn btn-success btnpagarventa" data-toggle="modal" data-target="#modalConfirmarpago1" idVenta="' . $value["id"] . '"><i class="fa fa-dollar"></i></button>';

                            //}

                            if ($_SESSION["perfil"] == "Administrador") {
                                echo '<button class="btn btn-warning btnEditarVenta" idVenta="' . $value["id"] . '"><i class="fa fa-pencil"></i></button>
                                      <button class="btn btn-danger btnEliminarVenta" idVenta="' . $value["id"] . '"><i class="fa fa-times"></i></button>';
                            }

                            echo '</div>  
                              </td>
                            </tr>';
                        }
                        ?>
                    </tbody>
                </table>

                <?php
                $eliminarVenta = new ControladorVentas();
                $eliminarVenta->ctrEliminarVenta();
                ?>
            </div>

        </div>

    </section>

</div>

<!-- Modal de Confirmación de Pago -->
<div class="modal fade" id="modalConfirmarpago1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Formulario del modal -->
            <form role="form" method="post" enctype="multipart/form-data">
                <!-- Cabecera del modal en color verde -->
                <div class="modal-header" style="background:#28a745; color:white"> <!-- Cambiado a verde -->
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title" id="exampleModalLabel">PAGOS</h5> <!-- Cambiado el título -->
                </div>

                <div class="modal-body">
                    <div class="box-body">
                        <!-- Campo para ID de Venta -->
                        <!-- Campo para ID de Venta (readonly) -->
                        <div class="form-group">
                            <label for="">ID</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-id-card"></i></span>
                                <input type="text" class="form-control input-md" name="idventapago" id="idventapago" placeholder="Ingresar ID de Venta" required readonly>
                            </div>
                            <small id="errorMensajeId" style="color:red; display:none;">Por favor, ingrese un ID válido.</small>
                        </div>

                        <div class="form-group">
                            <label for="">Cliente</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-id-card"></i></span>
                                <input type="text" class="form-control input-md" name="cliente" id="cliente" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">Vendedor</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-id-card"></i></span>
                                <input type="text" class="form-control input-md" name="vendedor" id="vendedor" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">Costo venta</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                                <input type="number" class="form-control input-md" name="totalVenta" id="totalVenta" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">Saldo</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                                <input type="number" class="form-control input-md" name="totalPagado" id="totalPagado" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">Saldo pendiente</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                                <input type="number" class="form-control input-md" name="saldoPendiente" id="saldoPendiente" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">Fecha</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                                <input type="date" class="form-control input-md" name="nuevoFecha" id="nuevoFecha" required>
                            </div>
                        </div>

                        <!-- Campo para Monto de Pago -->
                        <div class="form-group">
                            <label for="">Monto a pagar</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                                <input type="number" min="1" class="form-control input-md" name="montoPago" id="montoPago" placeholder="Ingresar monto" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success" id="btnConfirmarCambio">Confirmar Pago</button>

                </div>

                <!-- Llamado a la función del controlador para crear el pago -->
                <?php
                $crearPago = new ControladorPagos();
                $crearPago->ctrCrearPagos();
                ?>
            </form>
        </div>
    </div>
</div>




<div class="modal fade" id="modalConfirmarCambio" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">

            <form role="form" method="post" enctype="multipart/form-data">

                <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

                <div class="modal-header" style="background:#473119; color:white">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                    <h5 class="modal-title" id="exampleModalLabel">Confirmación de cambio de estado</h5>

                </div>

                <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

                <div class="modal-body">

                    <div class="box-body">
                        ¿Quieres cambiar esta opción a "En Inicio"?
                    </div>



                    <!--=====================================
        PIE DEL MODAL
        ======================================-->

                    <div class="modal-footer">

                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary" id="btnConfirmarCambio">Sí</button>

                    </div>

            </form>
        </div>