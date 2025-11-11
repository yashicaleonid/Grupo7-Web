<?php
include("conexion.php");
$id=$_POST['id'];
$id_medico=$_POST['id_medico'];
$id_paciente=$_POST['id_paciente'];
$fecha_cita=$_POST['fecha_cita'];
$hora_cita=$_POST['hora_cita'];
$motivo=$_POST['motivo'];
$estado=$_POST['estado'];
$stmt=$con->prepare('UPDATE citas SET id_medico=?, id_paciente=?, fecha_cita=?, hora_cita=?, motivo=?, estado=? WHERE id=?');
$stmt->bind_param("iissssi",$id_medico,$id_paciente,$fecha_cita,$hora_cita,$motivo,$estado,$id);
if($stmt->execute()){
    echo "Cita actualizada correctamente";  
}else{
    echo "Error al actualizar cita:". $stmt->error;
}
$con->close();
?>
