<?php
include('conexion.php');

$id = $_GET['id'];

$stmt = $con->prepare('SELECT nombre, documento, telefono, correo FROM pacientes WHERE id = ?');
$stmt->bind_param('i', $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$stmt->close();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Paciente</title>
</head>
<body>

    <h2>Editar Paciente</h2>
    <form id="formeditarpaciente" action="javascript:editarPaciente(<?php echo $id; ?>)" method="POST">
        <label>Nombre</label><br>
        <input type="text" name="nombre" value="<?php echo $row['nombre']; ?>"><br>
        <label>Documento</label><br>
        <input type="text" name="documento" value="<?php echo $row['documento']; ?>"><br>
        <label>Teléfono</label><br>
        <input type="text" name="telefono" value="<?php echo $row['telefono']; ?>"><br>
        <label>Correo</label><br>
        <input type="email" name="correo" value="<?php echo $row['correo']; ?>"><br>
        <input type="submit" value="Actualizar">
    </form>

</body>
</html>
