<?php

if ($_SESSION["perfil"] == "Especial" || $_SESSION["perfil"] == "Vendedor") {
    echo '<script>window.location = "inicio";</script>';
    return;
}

?>

<div class="content-wrapper">

    <section class="content-header">
        <h1 align="center">REPORTES DE VENTAS Y PEDIDOS</h1>
        <ol class="breadcrumb">
            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">ADMINISTRAR REPORTES</li>
        </ol>
    </section>

    <section class="content">

        <div class="box" style="margin-top: 20px;"> <!-- Agregar margen superior aquí -->

            <!-- Nueva sección para dos cuadros: ventas y pedidos en la parte superior -->
            <div class="row">
                
                <!-- Columna para el cuadro del reporte de ventas -->
                <div class="col-xs-6">
                    <div class="box box-info" style="max-width: 100%;">
                        <div class="box-header with-border">
                            <h3 class="box-title" style="text-transform: uppercase; font-weight: bold;">Reporte de Ventas</h3> <!-- Texto en mayúsculas y negrita -->
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <!-- Resumen de ventas -->
                                <div class="col-xs-12">
                                    <h4>Resumen de ventas:</h4>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <!-- Botón para el reporte de ventas alineado a la izquierda -->
                                <div class="col-xs-12 text-left">
                                    <a href="extensiones/tcpdf/pdf/ventas.php" class="btn btn-info" target="_blank"> <!-- Abrir en nueva pestaña -->
                                        <i class="fa fa-print"></i> Imprimir Reporte Ventas
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Columna para el cuadro del reporte de pedidos -->
                <div class="col-xs-6">
                    <div class="box box-success" style="max-width: 100%;">
                        <div class="box-header with-border">
                            <h3 class="box-title" style="text-transform: uppercase; font-weight: bold;">Reporte de Pedidos</h3> <!-- Texto en mayúsculas y negrita -->
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <!-- Resumen de pedidos -->
                                <div class="col-xs-12">
                                    <h4>Resumen de pedidos:</h4>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <!-- Botón para el reporte de pedidos alineado a la izquierda -->
                                <div class="col-xs-12 text-left">
                                    <a href="extensiones/tcpdf/pdf/pedidos.php" class="btn btn-success" target="_blank"> <!-- Abrir en nueva pestaña -->
                                        <i class="fa fa-print"></i> Imprimir Reporte Pedidos
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-xs-6">
                    <div class="box box-success" style="max-width: 100%;">
                        <div class="box-header with-border">
                            <h3 class="box-title" style="text-transform: uppercase; font-weight: bold;">Reporte de productos</h3> <!-- Texto en mayúsculas y negrita -->
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <!-- Resumen de pedidos -->
                                <div class="col-xs-12">
                                    <h4>Productos:</h4>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <!-- Botón para el reporte de pedidos alineado a la izquierda -->
                                <div class="col-xs-12 text-left">
                                    <a href="extensiones/tcpdf/pdf/productos.php" class="btn btn-success" target="_blank"> <!-- Abrir en nueva pestaña -->
                                        <i class="fa fa-print"></i> Imprimir Reporte Productos
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div> <!-- Fin de la fila para los cuadros de ventas y pedidos -->

            <!-- Mantener la sección de gráficos de ventas debajo -->
            <div class="box-header with-border">
                <div class="input-group">
                    <form action="facturaprueba.php" method="GET">
                        <button type="button" class="btn btn-default" id="daterange-btn2">
                            <span>
                                <i class="fa fa-calendar"></i>
                                <?php
                                    if (isset($_GET['fechaInicial']) && isset($_GET['fechaFinal'])) {
                                        echo "Fecha inicial: " . $_GET['fechaInicial'] . "<br>";
                                        echo "Fecha final: " . $_GET['fechaFinal'] . "<br>";
                                    } else {
                                        echo "Por favor, selecciona un rango de fechas.";
                                    }
                                ?>
                            </span>
                            <i class="fa fa-caret-down"></i>
                        </button>

                        <?php
                            $codigo = isset($_GET["codigo"]) ? $_GET["codigo"] : "default";
                        ?>

                        <!-- Nuevo botón para abrir reporte -->
                       
                    </form>
                </div>
            </div>

            <div class="box-body">
                <div class="row">
                    <div class="col-xs-12">
                        <?php include "reportes/grafico-ventas.php"; ?>
                    </div>
                </div>
            </div>

        </div>

    </section>

</div>
