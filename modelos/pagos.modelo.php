<?php

require_once "conexion.php";

class ModeloPagos {

    /*=============================================
    CREAR PAGOS
    =============================================*/

    static public function mdlIngresarPagos($tabla, $datos) {
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_venta, fecha_pago, pago, total_pagado) VALUES (:id_venta, :fecha_pago, :pago, 0)");

        $stmt->bindParam(":id_venta", $datos["id_venta"], PDO::PARAM_INT);    
        $stmt->bindParam(":fecha_pago", $datos["fecha_pago"], PDO::PARAM_STR);
        $stmt->bindParam(":pago", $datos["pago"], PDO::PARAM_INT);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return $stmt->errorInfo()[2];
        }

        $stmt->close();
        $stmt = null;
    }

    /*=============================================
    MOSTRAR PAGOS
    =============================================*/

    static public function mdlMostrarPagos($tabla, $item, $valor) {
        if ($item != null) {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
            $stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch();
        } else {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
            $stmt->execute();
            return $stmt->fetchAll();
        }

        $stmt->close();
        $stmt = null;
    }

	  /*=============================================
    OBTENER TOTAL PAGADO POR ID DE VENTA
    =============================================*/
    static public function mdlObtenerTotalPagadoPorVenta($idVenta) {
        $stmt = Conexion::conectar()->prepare("
            SELECT v.id, v.total, COALESCE(SUM(p.pago), 0) AS total_pagado, (v.total - COALESCE(SUM(p.pago), 0)) AS monto_restante
            FROM ventas v
            LEFT JOIN pagos p ON v.id = p.id_venta
            WHERE v.id = :id_venta
            GROUP BY v.id, v.total
        ");
        $stmt->bindParam(":id_venta", $idVenta, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    static public function ctrMostrarDetallePagoPorVenta($id_venta){

		$stmt = Conexion::conectar()->prepare("
		SELECT 
			v.id AS id_venta, 
			p.id_pago AS id_pago, 
			v.total AS total_venta, 
			p.pago AS monto_pago, 
			p.fecha_pago AS fecha_pago
		
		FROM ventas v
		INNER JOIN pagos p ON v.id = p.id_venta
		WHERE v.id = :id_venta;
		");

		$stmt->bindParam(":id_venta", $id_venta, PDO::PARAM_INT);

		$stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);

		$stmt->close();

		$stmt = null;

	}

    /*=============================================
	ELIMINAR CLIENTE
	=============================================*/

	static public function mdlEliminarPago($tabla, $datos) {
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_pago = :id_pago");
        $stmt->bindParam(":id_pago", $datos, PDO::PARAM_INT);
    
        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error"; // Esto te ayudará a identificar problemas
        }
    
        $stmt->close();
        $stmt = null;
    }
    

}
