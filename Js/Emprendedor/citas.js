$.validator.setDefaults({
    highlight: function(element) {
        $(element).closest("#nombres").addClass("is-invalid");
        $(element).closest("#telefono").addClass("is-invalid");
        $(element).closest("#fecha").addClass("is-invalid");
    },
    unhighlight: function(element) {
        $(element).closest("#nombres").removeClass("is-invalid");
        $(element).closest("#telefono").removeClass("is-invalid");
        $(element).closest("#fecha").removeClass("is-invalid");
        $(element).closest("#nombres").addClass("is-valid");
        $(element).closest("#telefono").addClass("is-valid");
        $(element).closest("#fecha").addClass("is-valid");
    },
});
$('#telefono').mask('0000-0000');
$('#fecha').mask('0000/00/00 00:00');

$("#form_cita").validate({
    messages: {
        telefono : "No contiene un formato correcto."
    }
});
function retornar() {
    return {
        "nombres": document.getElementById('nombres').value,
        "telefono": document.getElementById('telefono').value,
        "fecha": document.getElementById('fecha').value,
    };
}
$("#guardarCita").click(function() {
    if ($("#form_cita").valid() == false) {
        return;
    } else {
        $.ajax({
            url: "?path=Emprendedor&c=Citas&a=fecha",
            data: retornar(),
            type: 'POST',
            dataType: 'json',
            success: function(data) {
                if(data=="ok"){
                    $.ajax({
                        url: "?path=Emprendedor&c=Citas&a=guardar",
                        data: retornar(),
                        type: 'POST',
                        dataType: 'json',
                        success: function(data) {
                            if(data=='Ok'){
                                Alerta("success", "Gracias por agendar una cita", "Espera las indicaciones de tu asesor encargado", "2");
                            }else{
                                Alerta("question", data, "Algo salió mal, por favor intenta de nuevo", '1')
                            }
                        },
                        error: function(error) {
                            Alerta("warning", "Error", "Error en enviar los datos", '1');
                        }
                    });
                }else{
                    Alerta("warning", data, "Por favor intenta de nuevo", '1')
                }
            },
            error: function(error) {
                Alerta("warning", "Error", "Error en enviar los datos", '1');
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
                timer:3500
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
                timer: 4000
            })
            setTimeout(function() {
                window.location.href = "?path=Emprendedor&c=Principal&a=inicio";
                //$('#Login').modal('show');
            }, 4000);
            break;
    }
}
