<?php

    include("conexion.php");

    $n = $_POST['numero'];

    $read = $conexion->query("SELECT codigo,carrera FROM carrera");

    $carreras = [];
    while($carrera = mysqli_fetch_assoc($read)){
        $carreras[] = $carrera; 
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="insert.php" method="post" enctype="multipart/form-data" style="border: 2px solid blue; display: inline-block; padding:20px; background-color:  rgb(56, 145, 200);">
        <table>
        <tr>
            <th></th>
            <th>Fotografia</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>CU</th>
            <th>Sexo</th>
            <th>Carrera</th>
        </tr>

        <?php
        for($i=0;$i<$n;$i++){
        ?>
            <tr>
                <td><?php echo $i+1; ?></td>
                <td>
                    <input type="file" name="fotografia<?php echo $i;?>">
                </td>
                <td>
                    <input type="text" name="nombre<?php echo $i;?>">
                </td>
                <td>
                    <input type="text" name="apellidos<?php echo $i;?>">
                </td>
                <td>
                    <input type="text" name="cu<?php echo $i;?>">
                </td>
                <td>
                    <input type="radio" name="sexo<?php echo $i;?>" value="M">Masculino
                    <input type="radio" name="sexo<?php echo $i;?>" value="F">Femenino
                </td>
                <td>
                    <select name="carrera<?php echo $i;?>">
                    <?php
                    foreach($carreras as $c){
                    ?>
                        <option value="<?php echo $c['codigo']; ?>"><?php echo $c['carrera'];?></option>
                    <?php
                    }
                    ?>
                    </select>
                </td>
            </tr>
        <?php
        }
        ?>
        </table>
        <br><br>
        <input type="submit" value="Insertar">
        <button><a href="fintroduccion.html">Atras</a></button>
        <input type="hidden" name="n" value="<?php echo $n;?>">
    </form>
</body>
</html>