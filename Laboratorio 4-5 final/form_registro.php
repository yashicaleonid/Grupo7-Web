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
    <title>Document</title>
    <style>
        body{
            background-color: #d2f0e2;
            font-family: Arial, sans-serif;
        }
        .formulario{
            background-color: #d0ffe0;
            width: 400px;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 100px;
            padding: 30px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
    </style>
</head>
<body>
    <div class="formulario" style="margin-top: 30px;">
        <div class="encabezado">
            <h1>Registro de cita medica</h1>
        </div>
        <form action="insertar_registro.php" method="post">
        <label for="medico">Medico:</label><br>
        <select name="id_medico">
                    <?php
                    foreach($medicos as $m){
                    ?>
                        <option value="<?php echo $m['id']; ?>"><?php echo $m['nombre'];?></option>
                    <?php
                    }
                    ?>
        </select><br><br>
        <label for="paciente">Paciente:</label><br>
        <select name="id_paciente">
                    <?php
                    foreach($pacientes as $p){
                    ?>
                        <option value="<?php echo $p['id']; ?>"><?php echo $p['nombre'];?></option>
                    <?php
                    }
                    ?>
        </select><br><br>
        <label for="fecha">Fecha:</label><br>
        <input type="date" name="fecha_cita"><br><br>
        <label for="hora">Hora:</label><br>
        <input type="time" name="hora_cita"><br><br>
        <input type="submit" value="Registrar cita">    
        <input type="reset" value="Limpiar formulario"><br><br>
        <label for="motivo">Motivo:</label><br>
        <textarea name="motivo" id="" rows="5" ></textarea>
        </form>
    </div>
</body>
</html>