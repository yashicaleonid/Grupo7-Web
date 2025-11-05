<?php
include("conexion.php");
  $read= $con->query("SELECT c.id AS id_cita, m.nombre AS medico, p.nombre AS paciente,c.fecha_cita,c.hora_cita,c.motivo 
        FROM citas c LEFT JOIN medicos m ON c.id_medico = m.id
        LEFT JOIN pacientes p ON c.id_paciente = p.id ORDER BY c.fecha_cita, c.hora_cita");

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Citas Medicas</title>
    <style>
        body{
            background-color: #d2f0e2;
            font-family: Arial, sans-serif;
        }
    </style>
</head>
<body>

<h1>Lista de Citas Registradas</h1>
<div style="background-color: #d0ffe0; border: 1px solid #90ee90; display: inline-block; padding: 10px; margin-top: 30px; border-radius: 8px;">
<table border="1px"; style="border-collapse: collapse; background-color: white; border: 1px solid black;">
    <tr>
        <th>ID</th>
        <th>Médico</th>
        <th>Paciente</th>
        <th>Fecha</th>
        <th>Hora</th>
        <th>Motivo</th>
    </tr>

    <?php
   
      if ($read->num_rows > 0) {
    while($row = $read->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" .$row['id_cita']. "</td>";
        echo "<td>" .$row['medico']. "</td>";
        echo "<td>" .$row['paciente']. "</td>";
        echo "<td>" .$row['fecha_cita']. "</td>";
        echo "<td>" .$row['hora_cita']. "</td>";
        echo "<td>" .$row['motivo']. "</td>";
        echo "</tr>";
    }
}
   
    ?>

</table>
</div>
<br><br>
<a  href="form_registro.php"> Registrar nueva cita</a>

</body>
</html>
