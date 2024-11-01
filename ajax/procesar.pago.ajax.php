<?php
include "modelos/conexion.php"; // Asegúrate de que tu conexión a la base de datos esté incluida

// Verificar si se recibieron los datos por POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pago = isset($_POST['pago']) ? floatval($_POST['pago']) : 0; // Obtener el monto a pagar
    $id_pago = isset($_POST['id_pago']) ? intval($_POST['id_pago']) : 0; // Obtener el ID del pago

    // Aquí deberías validar los datos según sea necesario
    if ($pago <= 0) {
        echo json_encode(['status' => 'error', 'message' => 'El monto debe ser mayor que cero.']);
        exit();
    }

    // Preparar la consulta SQL para insertar el pago
    $query = "INSERT INTO PAGOS (pago, id_pago) VALUES (:pago, :id_pago)";
    
    // Usar sentencias preparadas para evitar inyecciones SQL
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':pago', $pago);
    $stmt->bindParam(':id_pago', $id_pago);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        // Retornar respuesta exitosa
        echo json_encode(['status' => 'success', 'monto' => $pago]);
    } else {
        // Retornar error si la ejecución falla
        echo json_encode(['status' => 'error', 'message' => 'Error al guardar el pago.']);
    }
} else {
    // Manejar métodos de solicitud no permitidos
    echo json_encode(['status' => 'error', 'message' => 'Método no permitido.']);
}
?>
