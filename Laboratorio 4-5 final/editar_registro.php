<?php
include("conexion.php");
$id_medico=$_POST['id_medico'];
$id_paciente=$_POST['id_paciente'];
$fecha_cita=$_POST['fecha_cita'];
$hora_cita=$_POST['hora_cita'];
$motivo=$_POST['motivo'];
$stmt=$con->prepare('UPDATE citas SET id_medico=?, id_paciente=?, fecha_cita=?, hora_cita=?, motivo=? WHERE id=?');
$stmt->bind_param("iisssi",$id_medico,$id_paciente,$fecha_cita,$hora_cita,$motivo,$id);
if($stmt->execute()){
    echo "Cita actualizada correctamente";  
}else{
    echo "Error al actualizar cita:". $stmt->error;
}
$con->close();
?>
