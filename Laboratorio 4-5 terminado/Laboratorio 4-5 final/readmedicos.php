<?php 

include('conexion.php');

$sql = "SELECT id, nombre, especialidad, telefono, correo FROM medicos";
$result = $con->query($sql);

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
    </style>
    <script src="fetch.js"></script>
</head>
<body>

    <?php
    if ($result->num_rows > 0) {
        echo "<br>";
        echo '<div style="background-color: #d0ffe0; border: 1px solid #90ee90; display: inline-block; padding: 10px; margin-top: 30px; border-radius: 8px;">';
        echo '<table border="1px"; style="border-collapse: collapse; background-color: white; border: 1px solid black;">';
        echo '<tr>
            <th>Nombre</th>
            <th>Especialidad</th>
            <th>Telefono</th>
            <th>Correo</th>
            <th colspan="2">Acciones</th></tr>';

    while ($row = $result->fetch_assoc()) {
    echo "<tr>
        <td>{$row['nombre']}</td>
        <td>{$row['especialidad']}</td>
        <td>{$row['telefono']}</td>
        <td>{$row['correo']}</td>
     <td><a href=\"javascript:eliminarmedico({$row['id']})\">Eliminar</a></td>
         <td><a href=\"javascript:mostrar('form_editar_medico.php?id={$row['id']}')\">Actualizar</a></td>
        </tr>";
    }
        echo "</table>";
        echo "</div>";
    } else {
        echo "<br>";
        echo '<div style="background-color: rgba(254, 254, 254, 1); border: 1px solid black; border-radius: 1px; padding: 5px;">No hay medicos registrados</div>';
    }

    $con->close();
    ?>
</body>
</html>

