<?php
include("conexion.php");
$id=$_POST['id'];
$estado=$_POST['estado'];
$sql ='UPDATE citas SET estado=? WHERE id=?';
$stmt=$con->prepare($sql);
$stmt->bind_param("si",$estado,$id);
if($stmt->execute()){
    echo "Estado";
}
?>