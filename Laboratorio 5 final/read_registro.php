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
    <script src="fetch.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container-sm mb-4" style="max-width: 600px;">
    <form action="javascript:read_citas()" method="post" id="form_buscar" class="d-flex gap-2 justify-content-center align-items-center">
        <label for="buscar" class="form-label mb-0">Buscar:</label>
        <input type="text" name="buscar" id="buscar" class="form-control" value="<?php echo $termino_busqueda; ?>">
        <input type="submit" value="Buscar" class="btn btn-primary">
    </form>
</div>

<div class="table-responsive">
    <table class="table table-striped mt-4">
        <thead class="table-primary">
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
        </thead>

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
                        <a class='btn btn-danger' href='javascript:eliminarregistro({$row['id_cita']})'>Eliminar</a>
                        <a class='btn btn-warning btn-sm' href='javascript:mostrar(\"form_editar_registro.php?id={$row['id_cita']}\")'>Actualizar</a>
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
</div>

     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
     <script src="fetch.js"></script>  
</body>
</html>
