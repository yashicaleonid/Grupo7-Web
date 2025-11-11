<?php

include('conexion.php');

$sql1 = "SELECT id, nombre, especialidad, telefono, correo FROM medicos";
$medico = $con->query($sql1);

$sql2 = "SELECT id, nombre, documento, telefono, correo FROM pacientes";
$paciente = $con->query($sql2);

$pacientes = [];
    while($paci = mysqli_fetch_assoc($paciente)){
        $pacientes[] = $paci; 
    }

$medicos = [];
    while($med = mysqli_fetch_assoc($medico)){
        $medicos[] = $med; 
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Cita Médica</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="fetch.js"></script>
</head>
<body>
    <div class="card shadow container-sm p-4 bg-warning-subtle" style="max-width: 500px;">
        <div class="row justify-content-center">
            <h2 class="text-center text-warning">Registro de Cita Médica</h2>
            <img src="images/citamedica.png" class="img-fluid" style="width: 100px; height: 100px;">
        </div>
        <form action="javascript:insertarregistro()" method="POST" id="formcita">
            <label for="id_medico" class="form-label">Médico:</label><br>
            <select name="id_medico" id="id_medico" class="form-select" required>
                <?php foreach($medicos as $m){ ?>
                    <option value="<?php echo $m['id']; ?>"><?php echo $m['nombre'];?></option>
                <?php } ?>
            </select><br>

            <label for="id_paciente" class="form-label">Paciente:</label><br>
            <select name="id_paciente" id="id_paciente" class="form-select" required>
                <?php foreach($pacientes as $p){ ?>
                    <option value="<?php echo $p['id']; ?>"><?php echo $p['nombre'];?></option>
                <?php } ?>
            </select><br>

            <label for="fecha_cita" class="form-label">Fecha:</label><br>
            <input type="date" name="fecha_cita" id="fecha_cita" class="form-control" required><br>

            <label for="hora_cita" class="form-label">Hora:</label><br>
            <input type="time" name="hora_cita" id="hora_cita" class="form-control" required><br>
         
            <label for="motivo" class="form-label">Motivo:</label><br>
            <textarea name="motivo" id="motivo" rows="4" class="form-control" required></textarea><br>
            
            <div class="d-flex gap-2 justify-content-center">
                <input type="submit" value="Registrar cita" class="btn btn-warning btn-lg">
                <input type="reset" value="Limpiar" class="btn btn-secondary">
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>