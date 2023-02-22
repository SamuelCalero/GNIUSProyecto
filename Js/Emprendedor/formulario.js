var previous_form, next_form, total_forms;
total_forms = $("fieldset").length;

var elemento = document.getElementsByName('telefonoIntegrante0');
$(elemento).mask('0000-0000');
$('.telefono_empresa').mask('0000-0000');

$("#form_registro").validate({
    messages: {
        telefono_empresa : "Formato incorrecto."
    }
});

$(".next-form").click(function() {
    if ($("#form_registro").valid() == false) {
        return;
    } else {
        previous_form = $(this).parent();
        next_form = $(this).parent().next();
        next_form.show();
        previous_form.hide();
        var current_active_step = $(this).parents('.f1').find('.f1-step.active');
        current_active_step.removeClass('active').addClass('activated').next().addClass('active');
        var progress_line = $(this).parents('.f1').find('.f1-progress-line');
        bar_progress(progress_line, 'right');
    }

});
$(".previous-form").click(function() {
    previous_form = $(this).parent();
    next_form = $(this).parent().prev();
    next_form.show();
    previous_form.hide();
    var current_active_step = $(this).parents('.f1').find('.f1-step.active');
    current_active_step.removeClass('active').prev().removeClass('activated').addClass('active');
    var progress_line = $(this).parents('.f1').find('.f1-progress-line');
    bar_progress(progress_line, 'left');
});
$("#enviaFrm").click(function() {
    if ($("#form_registro").valid() == false) {
        return;
    } else {
        var formInfo = $('#form_registro').serialize();
        $.ajax({
            type: "POST",
            url: "?path=Emprendedor&c=formulario&a=guardar",
            data: formInfo,
            dataType: 'json',
            success: function(data) {
                if(data == "ok"){
                    Alerta("success", "Gracias por llenar el Formulario", "Espera las indicaciones de tu asesor encargado", "2");
                }else{
                    Alerta("question", "Error", "Algo salió mal, por favor intenta de nuevo", '1');
                }
            },
            error: function(error) {
                Alerta("error", "Error", "Error en enviar los datos", '1');
            }
        });

    }
});

function bar_progress(progress_line_object, direction) {
    var number_of_steps = progress_line_object.data('number-of-steps');
    var now_value = progress_line_object.data('now-value');
    var new_value = 0;
    if (direction == 'right') {
        new_value = now_value + (100 / number_of_steps);
    } else if (direction == 'left') {
        new_value = now_value - (100 / number_of_steps);
    }
    progress_line_object.attr('style', 'width: ' + new_value + '%;').data('now-value', new_value);
}
var contador = 0;
document.getElementById('input-integrantes').value = contador;
$("#agregarIntegrante").click(function() {
    contador++;
    var html = '';
    html += '<div id="div_integrantes" class="contador">';
    html += '<div class="row gx-2">';
    html += '<div class="col-xl-12 mb-1">';
    html += '<div class="contIntegrante"></div>';
    html += '<label class="label-integrante fw-bold fst-italic form-label">Integrante ' + (contador + 1) + ' </label>';
    html += '<button id="removeRow" type="button" class="btn btn-danger btn-sm align-input"><i class="bi bi-person-dash-fill"></i></button>'
    html += '</div>';
    html += '<div class="col-sm-8 col-xl-9 mb-1">';
    html += '<input autocomplete="off" maxlength="200" type="text" class="nomIntegrante form-control form-control-sm" placeholder="Nombre integrante" name="nombreintegrante' + contador + '" required>';
    html += '</div>';
    html += '<div class="col-sm-4 col-xl-3 mb-1">';
    html += '<input autocomplete="off" minlength="9" maxlength="9" type="text" class="telIntegrante form-control form-control-sm" placeholder="Teléfono" name="telefonoIntegrante' + contador + '" required>';
    html += '</div>';
    html += '<div class="col-sm-7 col-xl-6 mb-1">';
    html += '<input autocomplete="off" maxlength="200" type="email" class="corIntegrante form-control form-control-sm" placeholder="Correo" name="correoIntegrante' + contador + '" required>';
    html += ' </div>';
    html += '<div class="col-sm-5 col-xl-6 mb-3">';
    html += '<input autocomplete="off" maxlength="200" type="text" class="dirIntegrante form-control form-control-sm" placeholder="Direccion" name="direccionIntegrante' + contador + '" required>';
    html += '</div>';
    html += '</div>';
    html += '</div>';
    $('#integranteRow').append(html);
    MaskInput();
    document.getElementById('input-integrantes').value = contador;
});

function MaskInput(){
    $('input.telIntegrante').on('input.telIntegrante',function(){
        $(this).mask('0000-0000');
    })
}

$(document).on('click', '#removeRow', function() {
    contador--;
    $(this).closest('#div_integrantes').remove();
    $('label.label-integrante').remove();
    $('label.error').remove();

    var rowIntegrante = document.getElementsByClassName("contIntegrante");
    var nomIntegrante = document.getElementsByClassName('nomIntegrante');
    var telIntegrante = document.getElementsByClassName('telIntegrante');
    var corIntegrante = document.getElementsByClassName('corIntegrante');
    var dirntegrante = document.getElementsByClassName('dirIntegrante');

    for (var i = 0; i <= rowIntegrante.length; i++) {
        $(rowIntegrante[i]).after('<label class="label-integrante fw-bold fst-italic form-label">Integrante ' + (i + 1) + '</label>');
        try {
            nomIntegrante[i].setAttribute("name", "nombreintegrante" + i);
            telIntegrante[i].setAttribute("name", "telefonoIntegrante" + i);
            corIntegrante[i].setAttribute("name", "correoIntegrante" + i);
            dirntegrante[i].setAttribute("name", "direccionIntegrante" + i);
        } catch (error) {
            continue;
        }

    }
    document.getElementById('input-integrantes').value = contador;
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
            }, 4000);
            break;
    }
}
