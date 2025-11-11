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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="card shadow container-sm p-4 bg-primary-subtle" style="max-width: 500px;">
        <div class="row justify-content-center">
            <h2 class="text-center text-info">Editar Médico</h2>
            <img src="images/medico.png" class="img-fluid" style="width: 100px; height: 100px;">
        </div>
        <form id="formeditarmedico" action="javascript:editarmedico(<?php echo $id; ?>)" method="POST">
            <label for="nombre" class="form-label">Nombre</label><br>
            <input type="text" name="nombre" class="form-control" value="<?php echo $row['nombre']; ?>" required><br>

            <label for="especialidad" class="form-label">Especialidad</label><br>
            <input type="text" name="especialidad" class="form-control" value="<?php echo $row['especialidad']; ?>" required><br>

            <label for="telefono" class="form-label">Teléfono</label><br>
            <input type="text" name="telefono" class="form-control" value="<?php echo $row['telefono']; ?>" required><br>

            <label for="correo" class="form-label">Correo electrónico</label><br>
            <input type="email" name="correo" class="form-control" value="<?php echo $row['correo']; ?>" required><br><br>

            <input type="submit" value="Actualizar" class="btn btn-primary btn-lg mx-auto d-block">
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>