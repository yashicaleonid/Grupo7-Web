<?php
include("conexion.php");
  $read= $con->query("SELECT c.id AS id_cita, m.nombre AS medico, p.nombre AS paciente,c.fecha_cita,c.hora_cita,c.motivo FROM citas c INNER JOIN medicos m ON c.id_medico = m.id
        INNER JOIN pacientes p ON c.id_paciente = p.id ORDER BY c.fecha_cita, c.hora_cita");


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Citas Medicas</title>
    
</head>
<body>

<h1>Lista de Citas Registradas</h1>

<table>
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

<a  href="form_registro.html"> Registrar nueva cita</a>

</body>
</html>
