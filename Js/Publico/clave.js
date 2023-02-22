$.validator.addMethod("correoCompleto", function(value, element, parametro){
    return this.optional(element) || /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i.test(value);
}, "Por favor, escribe una dirección de correo válida");
$.validator.setDefaults({
    highlight: function(element) {
        $(element).closest("#username").addClass("is-invalid");
        $(element).closest("#email").addClass("is-invalid");
        $(element).closest("#codigo").addClass("is-invalid");
        $(element).closest("#clave1").addClass("is-invalid");
        $(element).closest("#clave2").addClass("is-invalid");
    },
    unhighlight: function(element) {
        $(element).closest("#codigo").removeClass("is-invalid");
        $(element).closest("#username").removeClass("is-invalid");
        $(element).closest("#email").removeClass("is-invalid");
        $(element).closest("#clave1").removeClass("is-invalid");
        $(element).closest("#clave2").removeClass("is-invalid");
        $(element).closest("#codigo").addClass("is-valid");
        $(element).closest("#username").addClass("is-valid");
        $(element).closest("#email").addClass("is-valid");
        $(element).closest("#clave1").addClass("is-valid");
        $(element).closest("#clave2").addClass("is-valid");
    },
});

function retornar() {
    return {
        "username": document.getElementById('username').value,
        "email": document.getElementById('email').value
    };
}
$("#FrmCambiar").validate({
    rules: {
        email:{
            correoCompleto:true
        }
    }
});
$('#cambiar').click(function() {
    if ($("#FrmCambiar").valid() == false) {
        return;
    } else {
        $.ajax({
            url: "?path=Publico&c=CambiarClave&a=cambiar",
            data: retornar(),
            type: 'POST',
            dataType: 'json',
            beforeSend: function() {
                Alerta("info", "Espere un momento...", "-", '2');//SPINNER
            },
            success: function(data) {
                if(data=="Exito"){
                    Alerta("success", "El cambio de contraseña está en proceso", "Te hemos enviado un código a tu correo para continuar con el proceso", "4");//IR A...
                    document.getElementById('input-1').classList.add('d-none');
                    document.getElementById('input-2').classList.remove('d-none');
                }else if(data=="No"){
                    Alerta("info", "Estimado Usuario", "La cuenta no existe, por favor intenta de nuevo", '1');//NORMAL
                }else{
                    Alerta("question", data, "Algo salió mal, por favor intenta de nuevo", '1')//NORMAl
                }
            },
            error: function(error) {
                Alerta("warning", "Error", "Error en enviar los datos", '1');
            }
        })
    }
});
//----------------------------------
function retornarActualizar() {
    return {
        "username": document.getElementById('username').value,
        "email": document.getElementById('email').value,
        "codigo": document.getElementById('codigo').value,
        "clave1": document.getElementById('clave1').value,
        "clave2": document.getElementById('clave2').value
    };
}
$('#codigo').mask('00000');
$("#FrmActualizar").validate();
$('#actualizar').click(function() {
    var c1 = document.getElementById("clave1").value;
    var c2 = document.getElementById("clave2").value;

    if ($("#FrmActualizar").valid() == false) {
        return;
    } else {
        if (c1 != c2) {
            Alerta("error", "Error", "Las contraseñas no coinciden", '1');
        }else{
            $.ajax({
                url: "?path=Publico&c=CambiarClave&a=actualizar",
                data: retornarActualizar(),
                type: 'POST',
                dataType: 'json',
                success: function(data) {
                    if(data=="Ok"){
                        Alerta("success", "Cambio de contraseña realizado", "Haz cambiado tu contraseña, ahora puedes iniciar sesión nuevamente", '3');//Ir a...
                    }else if(data=="-"){
                        Alerta("info", "Error", "Por favor vuelve a intentarlo", '5');//NORMAL
                    }else{
                        Alerta("question", data, "Algo salió mal, por favor intenta de nuevo", '1')//NORMAl
                    }
                },
                error: function(error) {
                    Alerta("warning", "Error", "Error en enviar los datos", '1');
                }
            })
        }
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
                timer:3000
            });
            break;
        case '2'://SPINNER
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
        case '3'://IR A...
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
            }, 4000);
            break;
        case '4'://SUCCESS
            Swal.fire({
                icon: tipoAlerta,
                title: titulo,
                text: descripcion,
                timerProgressBar: true,
                showCloseButton: false,
                allowOutsideClick: false,
                showConfirmButton: false,
                timer:4000
            });
            break;
        case '5'://NORMAL
            Swal.fire({
                icon: tipoAlerta,
                title: titulo,
                text: descripcion,
                showConfirmButton: false,
                timerProgressBar: true,
                allowOutsideClick: false,
                timer: 2000
            })
                setTimeout(function() {
                window.location.reload();
            }, 2000);
        break;
    }
}