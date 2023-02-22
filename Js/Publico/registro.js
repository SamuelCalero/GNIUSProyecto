$.validator.addMethod("correoCompleto", function(value, element, parametro){
    return this.optional(element) || /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i.test(value);
}, "Por favor, escribe una dirección de correo válida");
$.validator.setDefaults({
    highlight: function(element) {
        $(element).closest("#username").addClass("is-invalid");
        $(element).closest("#email").addClass("is-invalid");
        $(element).closest("#clave1").addClass("is-invalid");
        $(element).closest("#clave2").addClass("is-invalid");
        $(element).closest("#telefono").addClass("is-invalid");
    },
    unhighlight: function(element) {
        $(element).closest("#username").removeClass("is-invalid");
        $(element).closest("#email").removeClass("is-invalid");
        $(element).closest("#clave1").removeClass("is-invalid");
        $(element).closest("#clave2").removeClass("is-invalid");
        $(element).closest("#telefono").removeClass("is-invalid");
        $(element).closest("#username").addClass("is-valid");
        $(element).closest("#email").addClass("is-valid");
        $(element).closest("#clave1").addClass("is-valid");
        $(element).closest("#clave2").addClass("is-valid");
        $(element).closest("#telefono").addClass("is-valid");
    },
});

$('#telefono').mask('0000-0000');

$("#registrarse").validate({
    rules: {
        email:{
            correoCompleto:true
        }
    },
    messages: {
        telefono : "Formato incorrecto."
    }
});

function retornar() {
    return {
        "username": document.getElementById('username').value,
        "email": document.getElementById('email').value,
        "telefono": document.getElementById('telefono').value,
        "clave1": document.getElementById('clave1').value,
        "clave2": document.getElementById('clave2').value
    };
}

//$("#registrarse").validate();
$('#guardar').click(function() {
    var c1 = document.getElementById("clave1").value;
    var c2 = document.getElementById("clave2").value;

    if ($("#registrarse").valid() == false) {
        return;
    } else {
        if (c1 != c2) {
            Alerta("error", "Error", "Las contraseñas no coinciden", '1');//NORMAL
        }else{
            $.ajax({
                url: "?path=Publico&c=Registro&a=guardar",
                data: retornar(),
                type: 'POST',
                dataType: 'json',
                beforeSend: function() {
                    Alerta("info", "Espere un momento...", "-", '2');//SPINNER
                },
                success: function(data) {
                    if(data=="Exito"){
                        Alerta("success", "Te has registrado con éxito", "Te hemos enviado un código a tu correo para que actives tu cuenta", "3");//IR A...
                    }else if(data=="Existe"){
                        Alerta("info", "Estimado Usuario", "El usuario ya existe, por favor intenta de nuevo", '1');//NORMAL
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
                window.location.href = "?path=Publico&c=Registro&a=activar";
            }, 4000);
            break;
    }
}
