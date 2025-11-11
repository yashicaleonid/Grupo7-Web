<?php
include("conexion.php");
$id=$_GET['id'];
$stmt=$con->prepare('SELECT id_medico, id_paciente, fecha_cita, hora_cita, motivo, estado FROM citas WHERE id=?');
$stmt->bind_param("i",$id);
$stmt->execute();
$result=$stmt->get_result();
$row=$result->fetch_assoc();
$stmt->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cita</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="card shadow container-sm p-4 bg-warning-subtle" style="max-width: 500px">
        <div class="row justify-content-center">
            <h2 class="text-center text-warningy">Editar Cita</h2>
            <img src="images/citamedica.png" class="img-fluid" style="width: 100px; height: 100px;">
        </div>
        <form id="formeditarregistro" action="javascript:editarregistro(<?php echo $id; ?>)" method="POST">
            <label class="form-label">Medico</label><br>
            <input type="text" name="id_medico" class="form-control" value="<?php echo $row['id_medico']; ?>"><br>
            <label class="form-label">Paciente</label><br>
            <input type="text" name="id_paciente" class="form-control" value="<?php echo $row['id_paciente']; ?>"><br>
            <label class="form-label">Fecha</label><br>
            <input type="date" name="fecha_cita" class="form-control" value="<?php echo $row['fecha_cita']; ?>"><br>
            <label class="form-label">Hora</label><br>
            <input type="time" name="hora_cita" class="form-control" value="<?php echo $row['hora_cita']; ?>"><br><br>
            <label class="form-label">Motivo</label><br>
            <input type="text" name="motivo" class="form-control" value="<?php echo $row['motivo']; ?>"><br><br>
            <label class="form-label">Estado</label><br>
            <select name="estado" id="estado" class="form-select" required>
                <option value="Pendiente" <?php echo ($row['estado'] == 'Pendiente') ? 'selected' : ''; ?>>Pendiente</option>
                <option value="Atendida" <?php echo ($row['estado'] == 'Atendida') ? 'selected' : ''; ?>>Atendida</option>
                <option value="Cancelada" <?php echo ($row['estado'] == 'Cancelada') ? 'selected' : ''; ?>>Cancelada</option>
            </select><br><br>
            <div class="d-flex gap-2 justify-content-center">
                <input type="submit" value="Actualizar" class="btn btn-warning btn-lg">
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>