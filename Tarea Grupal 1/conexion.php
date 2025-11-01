<?php

    $conexion = mysqli_connect("localhost","root","","bd_alumnos");

    if(mysqli_connect_errno()){
        die("No se pudo conectar a la base de datos".mysqli_connect_error());
    }

?>