$.validator.addMethod("correoCompleto", function(value, element, parametro){
    return this.optional(element) || /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i.test(value);
}, "Por favor, escribe una dirección de correo válida");
$.validator.setDefaults({
    highlight: function(element) {
        $(element).closest("#clave").addClass("is-invalid");
        $(element).closest("#correo").addClass("is-invalid");
    },

    unhighlight: function(element) {
        $(element).closest("#correo").removeClass("is-invalid");
        $(element).closest("#clave").removeClass("is-invalid");
        $(element).closest("#correo").addClass("is-valid");
        $(element).closest("#clave").addClass("is-valid");
    },

});
$("#FormLogin").validate({
    rules: {
        correo:{
            correoCompleto:true
        }
    }
});
function retornarDatos() {
    return {
        "correo": document.getElementById('correo').value,
        "clave": document.getElementById('clave').value
    };
}

$('#ingresar').click(function() {
    if ($("#FormLogin").valid() == false) {
        return;
    } else {
        $.ajax({
            url: '?path=publico&c=login&a=ingresar',
            data: retornarDatos(),
            type: 'POST',
            dataType: 'json',
            success: function(data) {
                if (data == "NoData") {
                    MostrarAlerta("Error", "Usuario incorrecto", "error");
                } else {
                    $.ajax({
                        url: "?path=publico&c=login&a=iniciarsesion",
                        type: "POST",
                        data: {
                            id: data['id'],
                            nombre: data['nombre'],
                            correo: data['correo'],
                            rol: data['rol']
                        },
                        success: function() {
                            $('#Login').modal('hide');
                            window.location.reload();
                        },
                        error: function(error) {
                            alert("Error")
                        }
                    });
                }
            }
        })
    }
})

function MostrarAlerta(titulo, descripcion, tipoAlerta) {
    Swal.fire({
        position: 'top',
        icon: tipoAlerta,
        title: titulo,
        text: descripcion,
        showConfirmButton: false,
        /*timer: 1500,*/
        showCloseButton: true
    })
}