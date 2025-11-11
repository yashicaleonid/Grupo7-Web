<?php

    $tipo = $_GET['tipo'];

    switch($tipo){
    case "Medico":
        echo '<div class="alert alert-success" role="alert">Se ha insertado correctamente un médico</div>';
        break;
    case "Paciente":
        echo '<div class="alert alert-success" role="alert">Se ha insertado correctamente un paciente</div>';
        break;
    case "Cita":
        echo '<div class="alert alert-success" role="alert">Se ha insertado correctamente una cita</div>';
        break;
    case "Citav":
        echo '<div class="alert alert-danger" role="alert">La cita ya existe para el medico en la fecha y hora seleccionada</div>';
        break;
    case "Eliminar Medico":
        echo '<div class="alert alert-danger" role="alert">Se ha eliminado correctamente el medico</div>';
        break;
    case "Eliminar Paciente":
        echo '<div class="alert alert-danger" role="alert">Se ha eliminado correctamente el paciente</div>';
        break;
    case "Actualizar Medico":
        echo '<div class="alert alert-warning" role="alert">Se ha actualizado correctamente el medico</div>';
        break;
    case "Actualizar Paciente":
        echo '<div class="alert alert-warning" role="alert">Se ha actualizado correctamente el paciente</div>';
        break;
    case "Error":
        echo '<div class="alert alert-danger" role="alert">Ocurrió un error al procesar la petición</div>';
        break;
    case "Estado":
         echo '<div class="alert alert-success" role="alert">Estado de la cita actualizado correctamente</div>';
          break;

    default:
        echo '<div class="mensaje">Acción completada</div>';
        break;
}
?>