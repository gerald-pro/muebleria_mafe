<?php

class ControladorPagos {

    /*=============================================
    CREAR PAGOS
    =============================================*/

    static public function ctrCrearPagos() {
        if (isset($_POST["nuevoFecha"])) {
            if (preg_match('/^[()\-0-9 ]+$/', $_POST["idventapago"]) &&
                $fecha_pago = $_POST["nuevoFecha"] &&
                preg_match('/^[0-9]+(\.[0-9]{1,2})?$/', $_POST["montoPago"])) {

                $tabla = "pagos";

                $datos = array(
                    "id_venta" => $_POST["idventapago"],
                    "fecha_pago" => $_POST["nuevoFecha"],
                    "pago" => $_POST["montoPago"]
                );

                $respuesta = ModeloPagos::mdlIngresarPagos($tabla, $datos);

                if ($respuesta == "ok") {
                    $detalleVenta = ModeloPagos::mdlObtenerTotalPagadoPorVenta($_POST["idventapago"]);

                    if ($detalleVenta && $detalleVenta["monto_restante"] == 0) {
                        ModeloVentas::mdlActualizarEstadoPagadoVenta($_POST["idventapago"]);
                    }

                    echo '<script>
                        swal({
                            type: "success",
                            title: "El pago ha sido guardado correctamente",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        }).then(function(result) {
                            if (result.value) {
                                window.location = "pagos"; // Redirige a la página de pagos
                            }
                        });
                    </script>';
                } else {
                    echo '<script>
                        swal({
                            type: "error",
                            title: "' . $respuesta . '",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        }).then(function(result) {
                            
                        });
                    </script>';
                }
            } else {
                echo '<script>
                    swal({
                        type: "error",
                        title: "¡Los campos no pueden estar vacíos o contener caracteres especiales!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then(function(result) {
                        if (result.value) {
                            window.location = "pagos"; // Redirige a la página de pagos
                        }
                    });
                </script>';
            }
        }
    }

   
    /*=============================================
    MOSTRAR PAGOS
    =============================================*/
    static public function ctrMostrarPagos($item, $valor) {
        $tabla = "pagos";
        $respuesta = ModeloPagos::mdlMostrarPagos($tabla, $item, $valor);
        return $respuesta;
    }

	 /*=============================================
    OBTENER TOTAL PAGADO POR ID DE VENTA
    =============================================*/
    static public function ctrObtenerTotalPagadoPorVenta($idVenta) {
        return ModeloPagos::mdlObtenerTotalPagadoPorVenta($idVenta);
    }

	static public function ctrMostrarDetallePagoPorVenta($id_venta){
		$respuesta = ModeloPagos::ctrMostrarDetallePagoPorVenta($id_venta);
		return $respuesta;
	
	}

    /*=============================================
	ELIMINAR CLIENTE
	=============================================*/

	static public function ctrEliminarPago() {
        if (isset($_GET["id_pago"])) {
            $tabla = "Pagos";
            $datos = $_GET["id_pago"];
            $respuesta = ModeloPagos::mdlEliminarPago($tabla, $datos);
    
            if ($respuesta == "ok") {
                echo '<script>
                    swal({
                        type: "success",
                        title: "El pago ha sido borrado correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false
                    }).then(function(result){
                        if (result.value) {
                            window.location = "pagos";
                        }
                    });
                </script>';
            } else {
                echo '<script>
                    swal({
                        type: "error",
                        title: "Hubo un error al borrar el pago",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    });
                </script>';
            }
        }
    }
    
}

// Manej

