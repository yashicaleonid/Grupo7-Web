<?php
session_start();
include("conexion.php");
$id=$_GET['id'];
$stmt =$con->prepare('DELETE FROM citas WHERE id=?');
$stmt->bind_param("i",$id);
if($stmt->execute()){
  
}else{
    echo "Error al eliminar cita:". $stmt->error;
}
  
