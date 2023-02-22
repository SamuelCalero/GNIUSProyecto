$(document).ready(function() {
    foto();
    datos();
});
$('#telefono_usuario').mask('0000-0000');
function foto(){
    $.ajax({
        data: { "consultar": "Datos" },
        url: "?path=Asesor&c=Perfil&a=foto",
        type: 'POST',
        dataType: 'json'
    }).done(function(data) {
        if(data == "No" || data == "Error"){
            document.getElementById("img").src = "Assets/Img/Foto/img-perfil.jpg";
        }else{
            document.getElementById("img").src = data;
        }
    }).fail(function(data) {
        Alerta('info', 'Hubo un error', '', '1');
    });
}

function datos(){
    $.ajax({
        data: { "consultar": "Datos" },
        url: "?path=Asesor&c=Perfil&a=consultar",
        type: 'POST',
        dataType: 'json'
    }).done(function(response) {
        $.each(response, function(index, data) {
            document.getElementById("nombre_usuario").value = data.nombre;
            document.getElementById("correo_usuario").value = data.correo;
            document.getElementById("telefono_usuario").value = data.telefono;
            document.getElementById("direccion_usuario").value = data.direccion;
        });
        $.ajax({
            data: { "consultar": "Datos" },
            url: "?path=Asesor&c=Perfil&a=consultar2",
            type: 'POST',
            dataType: 'json'
        }).done(function(data) {
            document.getElementById("clave_usuario").value = data;
        }).fail(function(data) {
            Alerta('info', 'Hubo un error', '', '1');
        });
    }).fail(function(data) {
        Alerta('info', 'Hubo un error', '', '1');
    });
}
$.validator.setDefaults({
    highlight: function(element) {
        $(element).closest("#nombre_usuario").addClass("is-invalid");
        $(element).closest("#correo_usuario").addClass("is-invalid");
        $(element).closest("#clave_usuario").addClass("is-invalid");
        $(element).closest("#telefono_usuario").addClass("is-invalid");
        $(element).closest("#direccion_usuario").addClass("is-invalid");
    },
    unhighlight: function(element) {
        $(element).closest("#nombre_usuario").removeClass("is-invalid");
        $(element).closest("#correo_usuario").removeClass("is-invalid");
        $(element).closest("#clave_usuario").removeClass("is-invalid");
        $(element).closest("#telefono_usuario").removeClass("is-invalid");
        $(element).closest("#direccion_usuario").removeClass("is-invalid");
        
        $(element).closest("#nombre_usuario").addClass("is-valid");
        $(element).closest("#correo_usuario").addClass("is-valid");
        $(element).closest("#clave_usuario").addClass("is-valid");
        $(element).closest("#telefono_usuario").addClass("is-valid");
        $(element).closest("#direccion_usuario").addClass("is-valid");
    },
});
function retornar() {
    return {
        "nombre_usuario": document.getElementById('nombre_usuario').value,
        "clave_usuario":  document.getElementById('clave_usuario').value,
        "telefono_usuario":  document.getElementById('telefono_usuario').value,
        "direccion_usuario":  document.getElementById('direccion_usuario').value
    };
}
$("#perfil").validate();

$("#guardar_perfil").click(function() {
    if ($("#perfil").valid() == false) {
        return;
    } else {
        var doc = document.getElementById("imagen").files.length;
        if ( doc == 0) {
            $.ajax({
                url:"?path=Asesor&c=Perfil&a=guardar",
                method:'POST',
                data: retornar(),
                dataType: 'json',
                success:function(data)
                {
                    if(data=="Ok"){
                        Alerta('success', 'Se ha editado con éxito', '', '2')
                    }else{
                        Alerta('info', 'Hubo un error', 'Por favor vuelve a intentarlo más tarde', '1')
                    }
                },
                error: function(error) {
                    Alerta('info', 'Error', 'Fue imposible enviar los datos', '1');
                }
            });
        }else{
            var parametros = new FormData($('#perfil')[0]);
            $.ajax({
                url:"?path=Asesor&c=Perfil&a=guardar",
                method:'POST',
                data: parametros,
                contentType:false,
                processData:false,
                dataType: 'json',
                success:function(data)
                {
                    if(data=="Ok"){
                        Alerta('success', 'Se ha editado con éxito', '', '2')
                    }else{
                        Alerta('info', 'Hubo un error', 'Por favor vuelve a intentarlo más tarde', '1')
                    }
                },
                error: function(error) {
                    Alerta('info', 'Error', 'Fue imposible enviar los datos', '1');
                }
            });
        }
    }
});

function preview(e){
    const img = e.target.files[0];
    const imgTmp = URL.createObjectURL(img);
    document.getElementById("img-preview").src = imgTmp;
    document.getElementById("icon-perfil").classList.add('d-none');
    document.getElementById("icono-perfil2").innerHTML = '<button class="btn-btn-img" onclick="deleteImg(event)"><i class="bi bi-x-lg"></i></button>';
    document.getElementById("nombre-imagen").innerHTML = `${img['name']}`;
}

function deleteImg(e){
    document.getElementById("icono-perfil2").innerHTML = '';
    document.getElementById("nombre-imagen").innerHTML ='';
    document.getElementById("icon-perfil").classList.remove('d-none');
    document.getElementById("img-preview").src = '';
    document.getElementById("img-preview").classList.add('d-none');
    document.getElementById("img").classList.remove('d-none');
    $('#imagen').val('');
}

$(document).on('change','input[type="file"]',function(){
    var fileName = this.files[0].name;
	var fileSize = this.files[0].size;

	if(fileSize > 3000000){
        Alerta('warning', 'El archivo no debe superar los 3 MB', 'Por favor vuelve a intentarlo', '1')
        limpiar();
		this.value = '';
		//this.files[0].name = '';
	}else{
		var ext = fileName.split('.').pop();
		ext = ext.toLowerCase();
		switch (ext) {
			case 'jpg':
			case 'jpeg':
			case 'png': 
                document.getElementById("img-preview").classList.remove('d-none');
                document.getElementById("img").classList.add('d-none');
                break;
			default:
                Alerta('warning', 'El archivo no tiene la extensión adecuada', 'Por favor vuelve a intentarlo', '1')
                limpiar();
				this.value = '';
				this.files[0].name = '';
		}
	}
});

function limpiar(){
    document.getElementById("icono-perfil2").innerHTML = '';
    document.getElementById("nombre-imagen").innerHTML ='';
    document.getElementById("icon-perfil").classList.remove('d-none');
    document.getElementById("img-preview").src = '';
    $('#imagen').val('');
}

$('#mostrar').click(function () {
    if ($('#mostrar').is(':checked')) {
      $('#clave_usuario').attr('type', 'text');
    } else {
      $('#clave_usuario').attr('type', 'password');
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
            }, 1500);
            break;
        case '3'://IR A...
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
            }, 1500);
            break;
    }
}