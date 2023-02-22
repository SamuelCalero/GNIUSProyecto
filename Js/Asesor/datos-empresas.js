$(document).ready(function() {
    Consultar();
    Contar();
});

function Consultar() {
    $.ajax({
        data: { "consultar": "Datos" },
        url: "?path=Asesor&c=DatosEmpresas&a=consultar",
        type: 'POST',
        dataType: 'json'
    }).done(function(response) {
        var html = "";
        $.each(response, function(index, data) {
            html += "<tr>";
            html += "<td>" + data.id_empresas + "</td>";
            html += "<td>" + data.nombre_empresa + "</td>";
            html += "<td>" + data.rubro + "</td>";
            html += "<td><button class='ver btn btn-sm' data-bs-toggle='modal' data-bs-target='#ModalEmpresa'><i class='btn-table bi bi-eye-fill'></i></button></td>";
            html += "</tr>";
        });
        document.getElementById("datos_empresas").innerHTML = html;
        $('#tabla_empresas').DataTable({
            language: {
                "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json"
            },
            "columnDefs":[
            {
                "targets":[3],
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
        url: "?path=Asesor&c=DatosEmpresas&a=obtener",
        type: 'POST',
        dataType: 'json'
    }).done(function(response) {
        $.each(response, function(index, data) {
            document.getElementById("nombre").value = data.nombre_empresa;
            document.getElementById("rubro").value = data.rubro;
        });
    }).fail(function(data) {
        //document.getElementById('cantidad').innerHTML = "000";
    });

});

function Contar(){
    $.ajax({
        data: { "contar": "Datos" },
        url: "?path=Asesor&c=DatosEmpresas&a=contar",
        type: 'POST',
        dataType: 'json'
    }).done(function(data) { 
        document.getElementById('cantidad').innerHTML = data.cantidad;
    }).fail(function(data) {
        document.getElementById('cantidad').innerHTML = "000";
    });
}

$("#reporte").click(function() {
    window.open('?path=Asesor&c=DatosEmpresas&a=reporte');
});