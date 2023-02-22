$(document).ready(function() {
    Consultar();
    Contar();
});

function Consultar() {
    $.ajax({
        data: { "consultar": "Datos" },
        url: "?path=Asesor&c=DatosEmprendedores&a=consultar",
        type: 'POST',
        dataType: 'json'
    }).done(function(response) {
        var html = "";
        $.each(response, function(index, data) {
            html += "<tr>";
            html += "<td>" + data.id_datoEmprendedor + "</td>";
            html += "<td>" + data.nombre_emprendedor + "</td>";
            html += "<td>" + data.correo + "</td>";
            html += "<td>" + data.telefono + "</td>";
            html += "<td><button class='ver btn btn-sm' data-bs-toggle='modal' data-bs-target='#ModalEmprendedor'><i class='btn-table bi bi-eye-fill'></i></button></td>";
            //html += "<td><a href=''><i class='btn-table bi bi-trash-fill'></i></a></td>";
            html += "</tr>";
        });
        document.getElementById("datos_emprendedores").innerHTML = html;
        $('#tabla_emprendedores').DataTable({
            language: {
                "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json"
            },
            "columnDefs":[
            {
                "targets":[4],
                "orderable":false,
            }]
        });
    }).fail(function(response) {
        console.log(response);
    });
}

$(document).on("click",".ver", function(){
    fila = $(this).closest("tr");
    id = parseInt(fila.find('td:eq(0)').text());
    $.ajax({
        data: { "id": id },
        url: "?path=Asesor&c=DatosEmprendedores&a=obtener",
        type: 'POST',
        dataType: 'json'
    }).done(function(response) {
        $.each(response, function(index, data) {
            document.getElementById("nombre").value = data.nombre_emprendedor;
            document.getElementById("correo").value = data.correo;
            document.getElementById("telefono").value = data.telefono;
            document.getElementById("direccion").value = data.direccion;
        });
    }).fail(function(data) {
        //document.getElementById('cantidad').innerHTML = "000";
    });

});

function Contar(){
    $.ajax({
        data: { "contar": "Datos" },
        url: "?path=Asesor&c=DatosEmprendedores&a=contar",
        type: 'POST',
        dataType: 'json'
    }).done(function(data) { 
        document.getElementById('cantidad').innerHTML = data.cantidad;
    }).fail(function(data) {
        document.getElementById('cantidad').innerHTML = "000";
    });
}
$("#reporte").click(function() {
    window.open('?path=Asesor&c=DatosEmprendedores&a=reporte');
});