<?php
include('conexion.php');

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$documento = $_POST['documento'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];

$stmt = $con->prepare('UPDATE pacientes SET nombre = ?, documento = ?, telefono = ?, correo = ? WHERE id = ?');
$stmt->bind_param('ssssi', $nombre, $documento, $telefono, $correo, $id);
if ($stmt->execute()) {
    echo 'Paciente actualizado correctamente';
} else {
    echo 'Error al actualizar paciente: ' . $stmt->error;
}

$con->close();
?>
