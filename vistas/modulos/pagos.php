<?php

if ($_SESSION["perfil"] == "Especial") {
    echo '<script>
        window.location = "inicio";
    </script>';
    return;
}

?>

<div class="content-wrapper">

    <section class="content-header">
        <h1 align="center"> PAGOS</h1>
        <ol class="breadcrumb">
            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Administrar pagos</li>
        </ol>
    </section>

    <section class="content">

        <div class="box">

            <div class="box-header with-border">
                <!-- Botones de navegación -->
                <a href="ventas">
                    <button class="btn btn-success">Ir a Ventas</button>
                </a>

                <a href="ventaspagos">
                    <button class="btn btn-info">Adm. Pagos</button>
                </a>
               
            </div>

            <div class="box-body">
                <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
                    <thead>
                        <tr>
                            <th style="width:10px">#</th>
                            <th>ID VENTA</th>
                            <th>FECHA</th>
                            <th>MONTO</th>
                            <th>ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $item = null;
                        $valor = null;

                        $pagos = ControladorPagos::ctrMostrarPagos($item, $valor);

                        foreach ($pagos as $key => $value) {
                            echo '<tr>
                                    <td>' . ($key + 1) . '</td>
                                    <td>' . $value["id_venta"] . '</td>
                                    <td>' . $value["fecha_pago"] . '</td>
                                    <td>' . $value["pago"] . '</td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-warning btnEditarPago" idPago="' . $value["id_pago"] . '"><i class="fa fa-pencil"></i></button>
                                            <button class="btn btn-danger btnEliminarPago" id_pago="' . $value["id_pago"] . '">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </div>
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

<!--=====================================
MODAL AGREGAR PAGO
======================================-->
<div id="modalAgregarPago" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" method="post">
                <div class="modal-header" style="background:#473119; color:white">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Agregar Pago</h4>
                </div>

                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-money"></i></span>
                                <input type="text" class="form-control input-lg" name="idventapago" id="idventapago" placeholder="Ingresar ID de Venta" required>
                            </div>
                            <small id="errorMensajeId" style="color:red; display:none;">Por favor, ingrese un ID válido.</small>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="far fa-calendar"></i></span>
                                <input type="date" class="form-control input-lg" name="nuevoFecha" id="nuevoFecha" placeholder="" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                                <input type="text" class="form-control input-lg" name="montoPago" id="montoPago" placeholder="Ingresar monto" required>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-primary">Guardar Pago</button>
                </div>
            </form>

            <?php
            $crearPago = new ControladorPagos();
            $crearPago->ctrCrearPagos();
            ?>
        </div>
    </div>
</div>

<!--=====================================
MODAL EDITAR PAGO
======================================-->
<div id="modalEditarPago" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" method="post">
                <div class="modal-header" style="background:#473119; color:white">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Editar Pago</h4>
                </div>

                <div class="modal-body">
                    <div class="box-body">
                        <input type="hidden" id="idPago" name="idPago">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-money"></i></span>
                                <input type="text" class="form-control input-lg" name="editarMonto" id="editarMonto" placeholder="Monto" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </div>
            </form>

            <?php
            // Lógica para editar el pago
            ?>
        </div>
    </div>
</div>


<?php

  $eliminarPago = new ControladorPagos();
  $eliminarPago -> ctrEliminarPago();

?>