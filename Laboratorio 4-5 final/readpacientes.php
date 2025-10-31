<?php

include('conexion.php');

$sql = "SELECT id, nombre, documento, telefono, correo FROM pacientes";
$result = $con->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="fetch.js"></script>
</head>
<body>
    <?php
if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr>
          <th>Nombre</th>
          <th>Documento</th>
          <th>Telefono</th>
          <th>Correo</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
               
                <td>{$row['nombre']}</td>
                <td>{$row['documento']}</td>
                <td>{$row['telefono']}</td>
                <td>{$row['correo']}</td>
                <td><a href=\"javascript:eliminarpaciente({$row['id']})\">Eliminar</a></td>
                <td><a href=\"javascript:mostrar('form_editar_paciente.php?id={$row['id']}')\">Actualizar</a></td>
              </tr>";
    }

    echo "</table>";
} else {
    echo "No hay pacientes registrados";
}

$con->close();
?>    
</body>
</html>

