$.validator.setDefaults({
    highlight: function(element) {
        $(element).closest("#mensaje").addClass("is-invalid");
    },
    unhighlight: function(element) {
        $(element).closest("#mensaje").removeClass("is-invalid");
        $(element).closest("#mensaje").addClass("is-valid");
    },
});
function retornar() {
    return {
        "mensaje": document.getElementById('mensaje').value,
        "email": document.getElementById('email').value
    };
}
$("#FormContacto").validate();
$("#btnContacto").click(function() {
    if ($("#FormContacto").valid() == false) {
        return;
    } else {
        $.ajax({
            url: "?path=Emprendedor&c=Contacto&a=guardar",
            data: retornar(),
            type: 'POST',
            dataType: 'json',
            success: function(data) {
                if(data=="Ok"){
                    Alerta("success", "Mensaje Enviado", "Gracias por dejarnos tus dudas, pronto te responderemos", "2");
                }else{
                    Alerta("question", data, "Algo salió mal, por favor intenta de nuevo", '1')//NORMAl
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
                timer: 3000
            })
            setTimeout(function() {
                window.location.reload();
                //$('#Login').modal('show');
            }, 3000);
            break;
    }
}
