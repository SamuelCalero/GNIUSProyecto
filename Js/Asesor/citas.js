function limpiar(){
    $("#title").removeClass("is-invalid");
    $("#nombres").removeClass("is-invalid");
    $("#email").removeClass("is-invalid");
    $("#telefono").removeClass("is-invalid");
    $("#start").removeClass("is-invalid");
    
    $("#title").removeClass("is-valid");
    $("#nombres").removeClass("is-valid");
    $("#email").removeClass("is-valid");
    $("#telefono").removeClass("is-valid");
    $("#start").removeClass("is-valid");
}
let calendarEl = document.getElementById('calendar');
let frm = document.getElementById('formulario');
let eliminar = document.getElementById('btnEliminar');
let myModal = new bootstrap.Modal(document.getElementById('CitasModal'));
$('#start').mask('0000/00/00 00:00');
document.addEventListener('DOMContentLoaded', function () {
    calendar= new FullCalendar.Calendar(calendarEl, {
        timeZone: 'local',
        initialView: 'dayGridMonth',
        locale: 'es',
        headerToolbar: {
            left: 'prev next today',
            center: 'title',
            right: 'dayGridMonth timeGridWeek listWeek'
        },
        events: '?path=Asesor&c=Citas&a=Listar',
        editable: true,
        dateClick: function (info) {
            frm.reset();
            limpiar();
            document.getElementById('botones').classList.add('d-none');
            $('#respInfo').addClass("d-none");
            document.getElementById("resp1").checked = false;
            document.getElementById("resp2").checked = false;
            $('#botones_accion').removeClass("col-md-6").addClass("col-md-12");
            document.getElementById('nombres').readOnly = false;
            document.getElementById('email').readOnly = false;
            document.getElementById('telefono').readOnly = false;
            document.getElementById('title').readOnly = false;
            document.getElementById('nombres').required = true;
            document.getElementById('email').required = true;
            document.getElementById('telefono').required = true;
            fecha = info.dateStr[0]+""+info.dateStr[1]+""+info.dateStr[2]+""+info.dateStr[3]+"/"+info.dateStr[5]+""+info.dateStr[6]+"/"+info.dateStr[8]+""+info.dateStr[9];
            document.getElementById('start').value = fecha + " 00:00";
            document.getElementById('codigo').value = '';
            document.getElementById('btnAccion').textContent = 'Registrar';
            document.getElementById('titulo').textContent = 'Registrar Evento';
            myModal.show();
        },

        eventClick: function (info) {
            //document.getElementById('botones').classList.remove('d-none');
            $('#respInfo').addClass("d-none");
            limpiar();
            document.getElementById("resp1").checked = false;
            document.getElementById("resp2").checked = false;
            $('#botones_accion').addClass("col-md-6").removeClass("col-md-12");
            document.getElementById('nombres').readOnly = true;
            document.getElementById('email').readOnly = true;
            document.getElementById('telefono').readOnly = true;
            document.getElementById('title').readOnly = true;
            document.getElementById('nombres').required = false;
            document.getElementById('email').required = false;
            document.getElementById('telefono').required = false;
            document.getElementById('codigo').value = info.event.id;
            var id = info.event.id;
            $.ajax({
                data: { "id": id },
                url: "?path=Asesor&c=Citas&a=obtener",
                type: 'POST',
                dataType: 'json'
            }).done(function(response) {
                if(response=="Error"){
                    alert(response)
                }else{
                    $.each(response, function(index, data) {
                        document.getElementById('start').value = data.fecha;
                        document.getElementById('title').value = data.titulo;
                        document.getElementById('nombres').value = data.nombres;
                        document.getElementById('email').value = data.email;
                        document.getElementById('telefono').value = data.telefono;
                        if(data.estado == "Agendada"){
                            document.getElementById('botones').classList.remove('d-none');
                            //document.getElementById('estado').value = data.estado;
                        }else{
                            document.getElementById('botones').classList.add('d-none');
                            $('#botones_accion').removeClass("col-md-6").addClass("col-md-12");
                            //document.getElementById('estado').value = "No";
                        }
                        
    
                    });
                    document.getElementById('color').value = info.event.backgroundColor;
                    document.getElementById('btnAccion').textContent = 'Modificar';
                    document.getElementById('titulo').textContent = 'Actualizar Evento';
                    myModal.show();
                }
            });

            
        },
        eventDrop: function (info) {
            var fecha = info.event.startStr[0]+""+info.event.startStr[1]+""+info.event.startStr[2]+""+info.event.startStr[3]+"/"+info.event.startStr[5]+""+info.event.startStr[6]+"/"+info.event.startStr[8]+""+info.event.startStr[9];
            var hora = info.event.startStr[11]+""+info.event.startStr[12]+":"+info.event.startStr[14]+""+info.event.startStr[15];
            //const start = info.event.startStr[1];
            const start = fecha+" "+hora;
            const id = info.event.id;
            const formDta = new FormData();
            formDta.append('start', start);
            formDta.append('id', id);
            $.ajax({
                url: '?path=Asesor&c=Citas&a=Drag',
                data: formDta,
                processData: false,
                contentType: false,
                type: 'POST',
                dataType: 'json',
                beforeSend: function() {
                    Alerta("info", "Espere un momento...", "-", '3');
                },
                success: function(data) {
                    //alert(data)
                    if (data == "Exito") {
                        Alerta("success", "Ingresado", "Datos ingresados correctamente", "2");
                        myModal.hide();
                        calendar.refetchEvents();
                    } else {
                        Alerta("question", data, "Algo salió mal, por favor intenta de nuevo", '2');
                        calendar.refetchEvents();
                    }
                },
                error: function(error) {
                    Alerta("warning", "Error", "Error en enviar los datos", '1');
                    calendar.refetchEvents();
                } 
            })

        }
    });
    calendar.render();
    
})
$.validator.setDefaults({
    highlight: function(element) {
        $(element).closest("#title").addClass("is-invalid");
        $(element).closest("#nombres").addClass("is-invalid");
        $(element).closest("#email").addClass("is-invalid");
        $(element).closest("#telefono").addClass("is-invalid");
        $(element).closest("#start").addClass("is-invalid");
    },
    unhighlight: function(element) {
        $(element).closest("#title").removeClass("is-invalid");
        $(element).closest("#nombres").removeClass("is-invalid");
        $(element).closest("#email").removeClass("is-invalid");
        $(element).closest("#telefono").removeClass("is-invalid");
        $(element).closest("#start").removeClass("is-invalid");
        
        $(element).closest("#title").addClass("is-valid");
        $(element).closest("#nombres").addClass("is-valid");
        $(element).closest("#email").addClass("is-valid");
        $(element).closest("#telefono").addClass("is-valid");
        $(element).closest("#start").addClass("is-valid");
    },
});
$('#telefono').mask('0000-0000');
$('#btnResp').click(function() {
    $('#respInfo').removeClass("d-none");
})
function retornar() {
    var resp;
    if(document.getElementById('resp1').checked){
        resp = "Realizada";
    }else if(document.getElementById('resp2').checked){
        resp = "Incumplida";
    }else{
        resp = "Nulo";
    }
    return {
        "codigo": document.getElementById('codigo').value,
        "nombres": document.getElementById('nombres').value,
        "email": document.getElementById('email').value,
        "telefono": document.getElementById('telefono').value,
        "title": document.getElementById('title').value,
        "color": document.getElementById('color').value,
        "start": document.getElementById('start').value,
        "resp": resp
    };
}
$.validator.addMethod("correoCompleto", function(value, element, parametro){
    return this.optional(element) || /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i.test(value);
}, "Por favor, escribe una dirección de correo válida");
$("#formulario").validate({
    rules: {
        email:{
            correoCompleto:true
        }
    }
});
$('#btnAccion').click(function() {
    if ($("#formulario").valid() == false) {
        return;
    }else {
        $.ajax({
            url: '?path=Asesor&c=Citas&a=Registrar',
            data: retornar(),
            type: 'POST',
            dataType: 'json',
            beforeSend: function() {
                Alerta("info", "Espere un momento...", "-", '3');//SPINNER
            },
            success: function(data) {
                if (data == "Exito") {
                    Alerta("success", "Ingresado", "Datos ingresados correctamente", "2");
                    myModal.hide();
                    calendar.refetchEvents();
                } else {
                    Alerta("question", data, "Algo salió mal, por favor intenta de nuevo", '1');
                    myModal.hide();
                    calendar.refetchEvents();
                }
            },
            error: function(error) {
                Alerta("warning", "Error", "Error en enviar los datos", '1');
                myModal.hide();
                calendar.refetchEvents();
            }
            
        })
    }
})

$('#btnCancelar').click(function(){
    limpiar();
});
//if (document.getElementById('radio1').checked)
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
            }, 3000);
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