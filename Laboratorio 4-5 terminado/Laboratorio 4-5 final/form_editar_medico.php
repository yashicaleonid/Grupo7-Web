<?php
include('conexion.php');

$id = $_GET['id'];

$stmt = $con->prepare('SELECT nombre, especialidad, telefono, correo FROM medicos WHERE id = ?');
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
    <title>Editar Médico</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body{
            background-color: #d2f0e2;
            font-family: Arial, sans-serif;
        }
    </style>
</head>
<body>
    <div class="registromedicos" style="margin-top: 30px;">
        <div class="encabezado">
            <h2>Editar Médico</h2>
            <img src="images/medico.png" alt="Doctor" class="img" style="width: 30px; padding-left: 10px;">
        </div>
        <form id="formeditarmedico" action="javascript:editarmedico(<?php echo $id; ?>)" method="POST">
            <label>Nombre</label><br>
            <input type="text" name="nombre" value="<?php echo $row['nombre']; ?>"><br>
            <label>Especialidad</label><br>
            <input type="text" name="especialidad" value="<?php echo $row['especialidad']; ?>"><br>
            <label>Teléfono</label><br>
            <input type="text" name="telefono" value="<?php echo $row['telefono']; ?>"><br>
            <label>Correo</label><br>
            <input type="email" name="correo" value="<?php echo $row['correo']; ?>"><br><br>
            <input type="submit" value="Actualizar">
        </form>
    </div>
</body>
</html>