<?php

include('conexion.php');

$sql = "SELECT id, nombre, documento, telefono, correo FROM pacientes";
$result = $con->query($sql);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Pacientes</title>
    <script src="fetch.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="table-responsive">
    <table class="table table-striped mt-4">
        <thead class="table-primary">
            <tr>
                <th>Nombre</th>
                <th>Documento</th>
                <th>Teléfono</th>
                <th>Correo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>{$row['nombre']}</td>";
                echo "<td>{$row['documento']}</td>";
                echo "<td>{$row['telefono']}</td>";
                echo "<td>{$row['correo']}</td>";
                echo "<td>
                        <a class='btn btn-danger btn-sm' href='javascript:eliminarpaciente({$row['id']})'>Eliminar</a>
                        <a class='btn btn-warning btn-sm' href='javascript:mostrar(\"form_editar_paciente.php?id={$row['id']}\")'>Actualizar</a>
                      </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5' class='text-center'>No hay pacientes registrados</td></tr>";
        }
        ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<?php
$con->close();
?>

</body>
</html>

