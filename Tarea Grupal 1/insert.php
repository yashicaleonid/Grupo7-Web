<?php

    include("conexion.php");

    $n = $_POST['n'];

    $nombre = [];
    $apellidos = [];
    $cu = [];
    $sexo = [];
    $carrera = [];
    $fotografia = [];

    for($i=0;$i<$n;$i++){

        $nombre[] = $_POST['nombre'.$i];
        $apellidos[] = $_POST['apellidos'.$i];
        $cu[] = $_POST['cu'.$i];
        $sexo[] = $_POST['sexo'.$i];
        $carrera[] = $_POST['carrera'.$i];

        if(isset($_FILES['fotografia'.$i]['name'])){
            $nombre_archivo=$_FILES['fotografia'.$i]['name'];
            $nombre_temporal=$_FILES['fotografia'.$i]['tmp_name'];
            $extension= explode(".", $nombre_archivo);
            $nombre_nuevo=uniqid().".".end($extension);
            copy($nombre_temporal, "images/".$nombre_nuevo);
            $fotografia[] = "images/" . $nombre_nuevo;
        }
    }

    $insert = $conexion->prepare("INSERT INTO alumnos(fotografia,nombres,apellidos,cu,sexo,codigocarrera) VALUES (?,?,?,?,?,?)");

    $insert->bind_param("sssssi",$fotografia_param,$nombre_param,$apellidos_param,$cu_param,$sexo_param,$carrera_param);
    
    for($i=0;$i<$n;$i++){
        
        $nombre_param = $nombre[$i];
        $apellidos_param = $apellidos[$i];
        $cu_param = $cu[$i];
        $sexo_param = $sexo[$i];
        $carrera_param = $carrera[$i];
        $fotografia_param = $fotografia[$i];

        if($insert->execute()){
            echo "Se registro correctamente";
        }
    }
    
?>

<meta http-equiv="refresh" content="2;url=read.php">