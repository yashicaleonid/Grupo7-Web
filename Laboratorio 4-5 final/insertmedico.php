<?php  

    include("conexion.php");

    $nombre = $_POST['nombre'];
    $especialidad = $_POST['especialidad'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];

    $insert = $con->prepare("INSERT INTO medicos(nombre,especialidad,telefono,correo) VALUES (?,?,?,?)");
    $insert->bind_param("ssss",$nombre,$especialidad,$telefono,$correo);

    
    if($insert->execute()){
        echo "Se registro correctamente";
    }
?>