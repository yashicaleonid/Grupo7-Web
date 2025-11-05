<?php

header('Content-Type: application/json');
include("conexion.php");

if ($_SERVER['REQUEST_METHOD'] === "POST"){
    $id = isset($_POST['id']) ? intval($_POST['id']) : 0;
    $estado = isset($_POST['estado']) ? $_POST['estado'] : '';

    $estados_validos = ['pendiente', 'atendida', 'cancelada'];

    if (!in_array($estado, $estados_validos)) {
        echo json_encode(['success' => false, 'message' => 'Estado inválido']);
        exit;
    }

    if($id <= 0){
        echo json_encode(['success' => false, 'message' => 'ID inválido']);
        exit;
    }

    $stmt = $con->prepare("UPDATE citas SET estado = ? WHERE id = ?");
    $stmt->bind_param("si", $estado, $id);

    if($stmt->execute()){
        if($stmt->affected_rows > 0 ){
            echo json_encode([
                'success' => true,
                'message' => 'Estado actualizado correctamente',
                'nuevo_estado' => $estado
            ]);
        } else {
            echo json_encode(['success' => false, 'message' => 'No se encontró la cita con el ID proporcionado']);
        }
    } else {
        echo json_encode(['success'=> false, 'message' => 'Error al actualizar: ' .$stmt->error]);
    }

    $stmt->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Método no permitido']);
}

$con->close();
?>