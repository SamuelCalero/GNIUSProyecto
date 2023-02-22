$.validator.setDefaults({
    highlight: function(element) {
        $(element).closest("#codigo").addClass("is-invalid");
    },
    unhighlight: function(element) {
        $(element).closest("#codigo").removeClass("is-invalid");
        $(element).closest("#codigo").addClass("is-valid");
    },
});

function retornar() {
    return {
        "codigo": document.getElementById('codigo').value,
        "email": document.getElementById('email').value
    };
}

$('#codigo').mask('00000');
$("#FrmActivar").validate();

$('#activar').click(function() {
    if ($("#FrmActivar").valid() == false) {
        return;
    } else {
        $.ajax({
            url: '?path=publico&c=Registro&a=activarcodigo',
            data: retornar(),
            type: 'POST',
            dataType: 'json',
            success: function(data) {
                if(data=="Activado"){//IR A...
                    Alerta("success", "Gracias por registrarte", "Ya puedes iniciar sesión en nuestra pagina de inicio", "2");
                }else if(data=="Inactivo"){//NORMAL
                    Alerta("info", "Estimado Usuario", "No se pudo activar tu cuenta, por favor intenta de nuevo", '1');//NORMAL
                }else{//NORMAL
                    Alerta("question", data, "Algo salió mal, por favor intenta de nuevo", '1')//NORMAl
                }
            },
            error: function(error) {
                Alerta("warning", "Error", "Error en enviar los datos", '1');
            }
        })
    }
})


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
                window.location.href = "?path=Publico&c=Principal&a=inicio";
                //$('#Login').modal('show');
            }, 4000);
            break;
    }
}
