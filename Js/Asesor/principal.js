$(document).ready(function() {
    cont_emp();
    cont_preguntas();
    cont_reuniones();
});

function cont_emp(){
    $.ajax({
        data: { "a": "contEmp" },
        url: "?path=Asesor&c=Principal",
        type: 'GET',
        dataType: 'json'
    }).done(function(data) {
        document.getElementById('cont_emp').innerHTML = data.cantidad;
    }).fail(function(data) {
        document.getElementById('cont_emp').innerHTML = "00";
    });
}

function cont_preguntas(){
    $.ajax({
        data: { "a": "contPre" },
        url: "?path=Asesor&c=Principal",
        type: 'GET',
        dataType: 'json'
    }).done(function(data) {
        document.getElementById('cont_pre').innerHTML = data.cantidad;
    }).fail(function(data) {
        document.getElementById('cont_pre').innerHTML = "00";
    });
}

function cont_reuniones(){
    $.ajax({
        data: { "a": "conReuniones" },
        url: "?path=Asesor&c=Principal",
        type: 'GET',
        dataType: 'json'
    }).done(function(data) {
        document.getElementById('cont_reuniones').innerHTML = data.cantidad;
    }).fail(function(data) {
        document.getElementById('cont_reuniones').innerHTML = "00";
    });
}