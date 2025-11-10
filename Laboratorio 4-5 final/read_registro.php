<?php
include("conexion.php");
$buscar = "%%";
$termino_busqueda = "";

if (isset($_POST['buscar'])) {
    $termino_busqueda = $_POST['buscar'];
    $buscar = "%" . $_POST['buscar'] . "%";
}
$sql = "SELECT c.id AS id_cita, m.nombre AS medico, p.nombre AS paciente, 
               c.fecha_cita, c.hora_cita, c.motivo, c.estado
        FROM citas c 
        LEFT JOIN medicos m ON c.id_medico = m.id
        LEFT JOIN pacientes p ON c.id_paciente = p.id 
        WHERE m.nombre LIKE ? OR p.nombre LIKE ? OR c.estado LIKE ?
        ORDER BY c.fecha_cita, c.hora_cita";

$stmt = $con->prepare($sql);
$stmt->bind_param("sss", $buscar, $buscar, $buscar);
$stmt->execute();
$read = $stmt->get_result();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Citas Médicas</title>
    <style>
        body {
            background-color: #d2f0e2;
            font-family: Arial, sans-serif;
        }
        table {
            border-collapse: collapse;
            background-color: white;
            border: 1px solid black;
            width: 100%;
        }
        th, td {
            padding: 6px;
            border: 1px solid black;
            text-align: center;
        }
    
    </style>
    <script src="fetch.js"></script>
</head>
<body>
<br>
<form action="javascript:read_citas()" method="post" style="text-align:center;" id="form_buscar">
    <label for="buscar">Buscar por Médico, Paciente o Estado:</label>
    <input type="text" name="buscar" id="buscar" value="<?php echo $termino_busqueda; ?>">
    <input type="submit" value="Buscar">
</form>
<br>


<table>
    <tr>
        <th>ID</th>
        <th>Médico</th>
        <th>Paciente</th>
        <th>Fecha</th>
        <th>Hora</th>
        <th>Motivo</th>
        <th>Acciones</th>
        <th>Estado</th>
    </tr>

    <?php
    if ($read->num_rows > 0) {
        while ($row = $read->fetch_assoc()) {
            echo "<tr>";
            echo "<td>{$row['id_cita']}</td>";
            echo "<td>{$row['medico']}</td>";
            echo "<td>{$row['paciente']}</td>";
            echo "<td>{$row['fecha_cita']}</td>";
            echo "<td>{$row['hora_cita']}</td>";
            echo "<td>{$row['motivo']}</td>";
            echo "<td>
                    <a href=\"javascript:eliminarregistro({$row['id_cita']})\">Eliminar</a> |
                    <a href=\"javascript:mostrar('form_editar_registro.php?id={$row['id_cita']}')\">Actualizar</a>
                  </td>";
            echo "<td>
                    <select onchange=\"cambiarEstado(this, {$row['id_cita']})\">
                        <option value='Pendiente' " . ($row['estado'] == 'Pendiente' ? 'selected' : '') . ">Pendiente</option>
                        <option value='Atendida' " . ($row['estado'] == 'Atendida' ? 'selected' : '') . ">Atendida</option>
                        <option value='Cancelada' " . ($row['estado'] == 'Cancelada' ? 'selected' : '') . ">Cancelada</option>
                    </select>
                  </td>";
            echo "</tr>";
        }
    }
    ?>
</table>


</body>
</html>
