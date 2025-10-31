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
        document.querySelector('#contenido').innerHTML = html;
    })
}

function eliminarmedico(id){
    fetch(`eliminar_medico.php?id=${id}`)
    .then(response=>{
        return response.text();
    })
    .then(html=>{
        document.querySelector('#contenido').innerHTML = html;
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
        document.querySelector('#contenido').innerHTML = html;
    })
}

function eliminarpaciente(id){
    fetch(`eliminar_paciente.php?id=${id}`)
    .then(response=>{
        return response.text();
    })
    .then(html=>{
        document.querySelector('#contenido').innerHTML = html;
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
    .then(html=>{
        document.querySelector('#contenido').innerHTML = html;
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
    .then(html=>{
        document.querySelector('#contenido').innerHTML = html;
    })
}