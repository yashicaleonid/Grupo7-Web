<?php include("conexion.php");

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$especialidad = $_POST['especialidad'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];
$stmt = $con->prepare("UPDATE medicos SET nombre=?, especialidad=?, telefono=?, correo=? WHERE id=?");
$stmt->bind_param("ssssi", $nombre, $especialidad, $telefono, $correo, $id);
if ($stmt->execute()) {
    echo "Médico actualizado correctamente";
} else {
    echo "Error al actualizar médico: " . $stmt->error;
}
$con->close();
?>
