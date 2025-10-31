<?php
include("conexion.php");
$id_medico=$_POST['id_medico'];
$id_paciente=$_POST['id_paciente'];
$fecha_cita=$_POST['fecha_cita'];
$hora_cita=$_POST['hora_cita'];
$motivo=$_POST['motivo'];
$sql="SELECT * FROM citas WHERE id_medico=? AND fecha_cita=? AND hora_cita=?";
$stmt=$con->prepare($sql);
$stmt->bind_param("iss",$id_medico,$fecha_cita,$hora_cita);
$stmt->execute();
$result=$stmt->get_result();
if($result->num_rows>0){
    echo "La cita ya existe para el medico en la fecha y hora seleccionada.";
}else{
    $insert="INSERT INTO citas(id_medico,id_paciente,fecha_cita,hora_cita,motivo) VALUES(?,?,?,?,?)";
    $stmt_insert=$con->prepare($insert);
    $stmt_insert->bind_param("iisss",$id_medico,$id_paciente,$fecha_cita,$hora_cita,$motivo);
    if($stmt_insert->execute()){
        echo "Cita registrada correctamente.";  }
}
?>
<meta http-equiv="refresh" content="2;url=read_registro.php">