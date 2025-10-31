<?php
session_start();
include("conexion.php");

$id = $_GET['id'];

$stmt = $con->prepare('DELETE FROM pacientes WHERE id=?');
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    echo "Paciente eliminado correctamente";
} else {
    echo "Error al eliminar paciente: " . $stmt->error;
}

$con->close();
?>
<meta http-equiv="refresh" content="3;url=read.php">