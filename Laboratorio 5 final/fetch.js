function mostrar(abrir) {
    fetch(abrir)
    .then(response => {
        return response.text();
    })
    .then(html => {
        document.querySelector('#contenido').innerHTML=html;
    })
}

function insertarmedico(){

    var dtformmedico = document.querySelector('#formmedico')
    var datosmedico = new FormData(dtformmedico);

    fetch("insertmedico.php", {method:"POST", body:datosmedico})
    .then(response => {
        return response.text();
    })
    .then(html => {
        mdl("Medico");
        mostrar("form_medicos.html");
    })
}


function eliminarmedico(id){
    fetch(`eliminar_medico.php?id=${id}`)
    .then(response=>{
        return response.text();
    })
    .then(html=>{
        mdl("Eliminar Medico");
        mostrar("readmedicos.php");
    })
    
}

function insertarpaciente(){

    var dtformpaciente = document.querySelector('#formpaciente')
    var datospaciente = new FormData(dtformpaciente);

    fetch("insertarpaciente.php", {method:"POST", body:datospaciente})
    .then(response => {
        return response.text();
    })
    .then(html => {
        mdl("Paciente");
        mostrar("form_pacientes.html");
    })
}

function eliminarpaciente(id){
    fetch(`eliminar_paciente.php?id=${id}`)
    .then(response=>{
        return response.text();
    })
    .then(html=>{
       mdl("Eliminar Paciente");
       mostrar("readpacientes.php");
    })
    
}

function editarmedico(id){
    var dtformeditarmedico = document.querySelector('#formeditarmedico')
    var datoseditarmedico = new FormData(dtformeditarmedico);
    datoseditarmedico.append("id", id);
    fetch("editar_medico.php", {method:"POST", body:datoseditarmedico})
    .then(response=>{
        return response.text();
    })
    .then(html => {
        mdl("Actualizar Medico");
        mostrar("readmedicos.php");

    })
}

function editarPaciente(id){
    var dtformeditarpaciente = document.querySelector('#formeditarpaciente')
    var datoseditarpaciente = new FormData(dtformeditarpaciente);
    datoseditarpaciente.append("id", id);
    fetch("editarpaciente.php", {method:"POST", body:datoseditarpaciente})
    .then(response=>{
        return response.text();
    })
    .then(html => {
        mdl("Actualizar Paciente");
        mostrar("readpacientes.php");
    })
}

function mdl(tipo){
    console.log("Ejecutando mdl con tipo:", tipo);
    fetch(`notificaciones.php?tipo=${tipo}`)
    .then(response => {
        return response.text();
    })
    .then(html => {
        document.querySelector('#modal').innerHTML = html;
    })
    setTimeout(() => { document.querySelector('#modal').innerHTML = '';}, 2000);
}



function insertarregistro() {
    var dtformcita = document.querySelector('#formcita');
    var datoscita = new FormData(dtformcita);

    fetch("insertar_registro.php", { method: "POST", body: datoscita })
        .then(response => response.text())
        .then(respuesta => {
            if (respuesta === "Cita") {
                mdl("Cita");
                mostrar("form_registro.php");
            } else if (respuesta === "Citav") {
                mdl("Citav");
            }
        });
}

function eliminarregistro(id){
    fetch(`eliminar_registro.php?id=${id}`)
    .then(response=>{
        return response.text();
    })
    .then(html=>{
       mdl("Eliminar Cita");
       mostrar("read_registro.php");
    })
    
    }
    function editarregistro(id){
    var dtformeditarregistro= document.querySelector('#formeditarregistro')
    var datoseditarregistro = new FormData(dtformeditarregistro);
    datoseditarregistro.append("id", id);
    fetch("editar_registro.php", {method:"POST", body:datoseditarregistro})
    .then(response=>{
        return response.text();
    })
    .then(html => {
        mdl("Actualizar Cita");
        mostrar("read_registro.php");
    })
}
function cambiarEstado(selectElement, idCita) {
        let nuevo_estado = selectElement.value;
    fetch("estado.php", { method: "POST", headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: `id=${idCita}&estado=${nuevo_estado}`
    })
    .then(response => response.text())
    .then(respuesta => {
        if (respuesta === "Estado") {
            mdl("Estado");
        } 
    });
}

function read_citas() {
    var form = document.querySelector('#form_buscar');
    var datos = new FormData(form);

    fetch("read_registro.php", {method: "POST",body: datos})
    .then(response => response.text())
    .then(html => {
        document.querySelector('#contenido').innerHTML = html;
    });
}
