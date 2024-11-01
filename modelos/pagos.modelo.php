<?php

require_once "conexion.php";

class ModeloPagos {

    /*=============================================
    CREAR PAGOS
    =============================================*/

    static public function mdlIngresarPagos($tabla, $datos) {
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_venta, fecha_pago, pago) VALUES (:id_venta, :fecha_pago, :pago)");

        $stmt->bindParam(":id_venta", $datos["id_venta"], PDO::PARAM_INT);    
        $stmt->bindParam(":fecha_pago", $datos["fecha_pago"], PDO::PARAM_STR);
        $stmt->bindParam(":pago", $datos["pago"], PDO::PARAM_INT);



        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
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
            SELECT v.id, v.total, SUM(p.pago) AS total_pagado
            FROM ventas v
            JOIN pagos p ON v.id = p.id_venta
            WHERE v.id = :id_venta
            GROUP BY v.id, v.total
        ");
        $stmt->bindParam(":id_venta", $idVenta, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
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
