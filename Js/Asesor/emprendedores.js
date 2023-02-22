$(document).ready(function() {
    Consultar();
    Contar();
});
function Consultar() {
    $.ajax({
        data: { "consultar": "Datos" },
        url: "?path=Asesor&c=Emprendedores&a=consultar",
        type: 'POST',
        dataType: 'json'
    }).done(function(response) {
        var html = "";
        $.each(response, function(index, data) {
            html += "<tr>";
            html += "<td>" + data.id_emprendedor + "</td>";
            html += "<td>" + data.nombre + "</td>";
            html += "<td>" + data.correo + "</td>";
            html += "<td>" + data.telefono + "</td>";
            html += "<td><button name='ver' class='ver btn btn-sm' data-bs-toggle='modal' data-bs-target='#verEmprendedor'><i class='btn-table bi bi-eye-fill'></i></button></td>";
            html += "<td><button name='eliminar' class='eliminar btn btn-sm'><i class='btn-table bi bi-trash-fill'></i></button></td>";
            html += "</tr>";
        });
        document.getElementById("datos").innerHTML = html;
        $('#tabla_emprendedores').DataTable({
            language: {
                "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json"
            },
            "columnDefs":[
            {
                "targets":[4, 5],
                "orderable":false,
            }]
        });
    }).fail(function(response) {
        console.log(response);
    });
}
function Contar(){
    $.ajax({
        data: { "contar": "Datos" },
        url: "?path=Asesor&c=Emprendedores&a=contar",
        type: 'POST',
        dataType: 'json'
    }).done(function(data) { 
        document.getElementById('cantidad').innerHTML = data.cantidad;
    }).fail(function(data) {
        document.getElementById('cantidad').innerHTML = "000";
    });
}
$(document).on("click",".ver", function(){
    fila = $(this).closest("tr");
    id = parseInt(fila.find('td:eq(0)').text());
    $.ajax({
        data: { "id": id },
        url: "?path=Asesor&c=Emprendedores&a=obtener",
        type: 'POST',
        dataType: 'json'
    }).done(function(response) {
        $.each(response, function(index, data) {
            document.getElementById("nombre_emp").value = data.nombre;
            document.getElementById("correo_emp").value = data.correo;
            document.getElementById("telefono_emp").value = data.telefono;
        });
    }).fail(function(data) {
        console.log("error");
    });
});
$(document).on("click",".eliminar", function(){
    Swal.fire({
        title: '¿Estas seguro de eliminar el registro?',
        text: '',
        showDenyButton: true,
        confirmButtonColor: '#431220',
        denyButtonColor: '#8A8A8A',
        confirmButtonText: 'Eliminar',
        denyButtonText: 'Cancelar',
    }).then((result) => {
        if(result.isConfirmed) {
            fila = $(this).closest("tr");
            id = parseInt(fila.find('td:eq(0)').text());
            $.ajax({
                data: { "id": id },
                url: "?path=Asesor&c=Emprendedores&a=eliminar",
                type: 'POST',
                dataType: 'json'
            }).done(function(data) {
                if(data == "Ok"){
                    Alerta("success", "Se ha eliminado con exito", "", "2");
                }else{
                    Alerta("error", "No se ha podido eliminar", "", "2");
                }
            }).fail(function(error) {
                Alerta("warning", "Hubo un error", "Error al momento de eliminar", "1");
            });
        }else if (result.isDenied) {
            Alerta("info", "Cancelado", "", "1");
        }
    })
});
function Alerta(tipoAlerta, titulo, descripcion, num) {
    switch (num) {
        case '1'://NORMAL
            Swal.fire({
                icon: tipoAlerta,
                title: titulo,
                text: descripcion,
                timerProgressBar: true,
                showCloseButton: true,
                allowOutsideClick: false,
                showConfirmButton: false,
                timer:2000
            });
            break;
        case '2'://IR A...
            Swal.fire({
                icon: tipoAlerta,
                title: titulo,
                text: descripcion,
                showConfirmButton: false,
                timerProgressBar: true,
                allowOutsideClick: false,
                timer: 1500
            })
            setTimeout(function() {
                location.reload();
            }, 2000);
            break;
        case '3'://SPINNER
            Swal.fire({
                icon: tipoAlerta,
                title: titulo,
                showCloseButton: false,
                allowOutsideClick: false,
                showConfirmButton: false,
                didOpen: () => {
                    Swal.showLoading()
                }
            });
            break;
    }
}
