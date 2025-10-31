<?php

    $tipo = $_GET['tipo'];

    switch($tipo){
    case "Medico":
        echo '<div class="mensaje" style="background-color: rgba(82, 245, 88, 1);">Se ha insertado correctamente un médico</div>';
        break;
    case "Paciente":
        echo '<div class="mensaje" style="background-color: rgba(82, 245, 88, 1);">Se ha insertado correctamente un paciente</div>';
        break;
    case "Eliminar Medico":
        echo '<div class="mensaje" style="background-color: rgba(239, 100, 82, 1);">Se ha eliminado correctamente el medico</div>';
        break;
    case "Eliminar Paciente":
        echo '<div class="mensaje" style="background-color: rgba(239, 100, 82, 1);">Se ha eliminado correctamente el paciente</div>';
        break;
    case "Actualizar Medico":
        echo '<div class="mensaje" style="background-color: rgb(244, 244, 101);">Se ha actualizado correctamente el medico</div>';
        break;
    case "Actualizar Paciente":
        echo '<div class="mensaje" style="background-color: rgb(244, 244, 101);">Se ha actualizado correctamente el paciente</div>';
        break;
    case "Error":
        echo '<div class="mensaje">Ocurrió un error al procesar la petición</div>';
        break;
    default:
        echo '<div class="mensaje">Acción completada</div>';
        break;
}
?>