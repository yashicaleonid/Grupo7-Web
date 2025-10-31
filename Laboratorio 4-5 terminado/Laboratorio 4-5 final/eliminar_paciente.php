<?php
session_start();
include("conexion.php");

$id = $_GET['id'];

$stmt = $con->prepare('DELETE FROM pacientes WHERE id=?');
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
} else {
    echo "Error al eliminar paciente: " . $stmt->error;
}

$con->close();
?>