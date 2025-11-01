<?php

    include("conexion.php");

    $read = $conexion->query("SELECT a.id,a.fotografia,a.nombres,a.apellidos,a.cu,a.sexo,c.carrera FROM alumnos a INNER JOIN carrera c
    ON a.codigocarrera = c.codigo");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="2px" style="border-collapse: collapse; border-color:black;">
        <tr style="background-color:  rgb(188, 187, 187);">
            <th>Numero</th>
            <th>Fotografia</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>CU</th>
            <th>Sexo</th>
            <th>Carrera</th>
        </tr>

        <?php
        while($resultado = mysqli_fetch_assoc($read)){
        ?>
            <tr>
                <td>
                    <?php echo $resultado['id']; ?>
                </td>
                <td>
                    <img width="100px" src="<?php echo  $resultado['fotografia'];?>" >  
                </td>
                <td>
                    <?php echo $resultado['nombres']; ?>
                </td>
                <td>
                    <?php echo $resultado['apellidos']; ?>
                </td>
                <td>
                    <?php echo $resultado['cu']; ?>
                </td>
                <td>
                    <?php echo $resultado['sexo']; ?>
                </td>
                <td>
                    <?php echo $resultado['carrera']; ?>
                </td>
            </tr>
        <?php
        }
        ?>
        </table>
</body>
</html>