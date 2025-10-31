<?php  

    include("conexion.php");

    $nombre = $_POST['nombre'];
    $documento = $_POST['documento'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];

    $insert = $con->prepare("INSERT INTO pacientes(nombre,documento,telefono,correo) VALUES (?,?,?,?)");
    $insert->bind_param("ssss",$nombre,$documento,$telefono,$correo);

    
    if($insert->execute()){
        echo "Se registro correctamente";
    }
?>