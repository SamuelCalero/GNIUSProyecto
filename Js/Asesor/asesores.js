$(document).ready(function() {
    Consultar();
    Contar();
});
function Consultar() {
    var id = document.getElementById("idAsesor").value;
    $.ajax({
        data: { "consultar": "Datos" },
        url: "?path=Asesor&c=Asesores&a=consultar",
        type: 'POST',
        dataType: 'json'
    }).done(function(response) {
        var html = "";
        $.each(response, function(index, data) {
            html += "<tr>";
            html += "<td>" + data.id_asesor + "</td>";
            html += "<td>" + data.nombre + "</td>";
            html += "<td>" + data.correo + "</td>";
            html += "<td>" + data.telefono + "</td>";
            html += "<td>" + data.direccion + "</td>";
            if(data.id_asesor == id){
                html += "<td><button class='btn btn-sm disabled'><i class='btn-table bi bi-eye-fill'></i></button></td>";
                html += "<td><button class='btn btn-sm disabled'><i class='btn-table bi bi-trash-fill'></i></button></td>";
            }else{
                html += "<td><button name='ver' class='ver btn btn-sm' data-bs-toggle='modal' data-bs-target='#verAsesor'><i class='btn-table bi bi-eye-fill'></i></button></td>";
                html += "<td><button name='eliminar' class='eliminar btn btn-sm'><i class='btn-table bi bi-trash-fill'></i></button></td>";
            }
            html += "</tr>";
        });
        document.getElementById("datos").innerHTML = html;
        $('#tabla_asesores').DataTable({
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
        Alerta('info', 'Hubo un error', '', '1');
    });
}
function Contar(){
    $.ajax({
        data: { "contar": "Datos" },
        url: "?path=Asesor&c=Asesores&a=contar",
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
        url: "?path=Asesor&c=Asesores&a=obtener",
        type: 'POST',
        dataType: 'json'
    }).done(function(response) {
        $.each(response, function(index, data) {
            document.getElementById("nombre_asesor").value = data.nombre;
            document.getElementById("correo_asesor").value = data.correo;
            document.getElementById("telefono_asesor").value = data.telefono;
            document.getElementById("direccion_asesor").value = data.direccion;
        });
    }).fail(function(data) {
        Alerta('info', 'Hubo un error', '', '1');
    });
});
$(document).on("click",".eliminar", function(){
    Swal.fire({
        title: '¿Estas seguro de eliminar el registro?',
        text: 'Con ello eliminas todos sus datos registrados',
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
                url: "?path=Asesor&c=Asesores&a=eliminar",
                type: 'POST',
                dataType: 'json'
            }).done(function(data) {
                if(data == "Ok"){
                    Alerta('success', 'Se ha eliminado con éxito', '', '2')
                }else{
                    Alerta('error', 'No se ha podido eliminar', '', '2')
                }
            }).fail(function(error) {
                Alerta('warning', 'Hubo un error', 'Error al momento de eliminar', '1')
            });
        }else if (result.isDenied) {
            Alerta('info', 'Cancelado', '', '1');
        }
    })
});
$.validator.addMethod("correoCompleto", function(value, element, parametro){
    return this.optional(element) || /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i.test(value);
}, "Por favor, escribe una dirección de correo válida");
$.validator.setDefaults({
    highlight: function(element) {
        $(element).closest("#correo_add").addClass("is-invalid");
        $(element).closest("#telefono_add").addClass("is-invalid");
        $(element).closest("#direccion_add").addClass("is-invalid");
        $(element).closest("#nombre_add").addClass("is-invalid");
    },
    unhighlight: function(element) {
        $(element).closest("#correo_add").removeClass("is-invalid");
        $(element).closest("#telefono_add").removeClass("is-invalid");
        $(element).closest("#direccion_add").removeClass("is-invalid");
        $(element).closest("#nombre_add").removeClass("is-invalid");
        
        $(element).closest("#correo_add").addClass("is-valid");
        $(element).closest("#telefono_add").addClass("is-valid");
        $(element).closest("#direccion_add").addClass("is-valid");
        $(element).closest("#nombre_add").addClass("is-valid");
    },
});
$("#nuevo").click(function() {
    $("#agregarAsesor").modal("show");
});

$("#form_nuevo").validate({
    rules: {
        correo_add:{
            correoCompleto:true
        }
    }
});
var elemento = document.getElementsByName('telefono_add');
$(elemento).mask('0000-0000');

$("#guardar_asesor").click(function() {
    if ($("#form_nuevo").valid() == false) {
        return;
    } else {
        var formInfo = $('#form_nuevo').serialize();
        $.ajax({
            type: "POST",
            url: "?path=Asesor&c=Asesores&a=guardar",
            data: formInfo,
            dataType: 'json',
            beforeSend: function() {
                Alerta("info", "Espere un momento...", "-", '3');//SPINNER
            },
            success: function(data) {
                if(data == "Exito"){
                    Alerta('success', 'Se ha guardado éxito', '', '2')
                }else if(data == "Existe"){
                    Alerta('info', 'El correo ya existe', 'Por favor inténtalo de nuevo', '1')
                }else{
                    Alerta('error', data, 'Error en ingresar los datos', '2')
                }
            },
            error: function(error) {
                Alerta('warning', 'Hubo un error', 'Error al momento de enviar los datos', '1')
            }
        });
    }
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
