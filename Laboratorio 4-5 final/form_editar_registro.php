<?php
include("conexion.php");
$id=$_GET['id'];
$stmt=$con->prepare('SELECT id_medico, id_paciente, fecha_cita, hora_cita, motivo FROM citas WHERE id=?');
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
    <title>Document</title>
</head>
<body>
      <div class="registrocitas" style="margin-top: 30px;">
        <div class="encabezado">
            <h2>Editar Cita</h2>
       
        </div>
        <form id="formeditarregistro" action="javascript:editarregistro(<?php echo $id; ?>)" method="POST">
            <label>Medico</label><br>
            <input type="text" name="id_medico" value="<?php echo $row['id_medico']; ?>"><br>
            <label>Paciente</label><br>
            <input type="text" name="id_paciente" value="<?php echo $row['id_paciente']; ?>"><br>
            <label>Fecha</label><br>
            <input type="date" name="fecha_cita" value="<?php echo $row['fecha_cita']; ?>"><br>
            <label>Hora</label><br>
            <input type="time" name="hora_cita" value="<?php echo $row['hora_cita']; ?>"><br><br>
            <label>Motivo</label><br>
            <input type="text" name="motivo" value="<?php echo $row['motivo']; ?>"><br><br>
            <label>Estado</label><br>
            <input type="text" name="estado" value="<?php echo $row['estado']; ?>"><br><br>
            <input type="submit" value="Actualizar">
        </form>
    </div>
</body>
</html>