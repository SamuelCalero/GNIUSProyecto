$(document).ready(function() {
    Consultar();
    Contar();
});
function Consultar() {
    $.ajax({
        data: { "data": "consultar" },
        url: "?path=Asesor&c=Contacto&a=consultar",
        type: 'POST',
        dataType: 'json'
    }).done(function(response) {
        var html = "";
        $.each(response, function(index, data) {
            html += "<tr>";
            html += "<td>" + data.id_contacto + "</td>";
            html += "<td>" + data.correo + "</td>";
            html += "<td>" + data.mensaje + "</td>";
            html += "<td><a href='' name='ver' class='ver btn btn-sm' data-bs-toggle='modal' data-bs-target='#Responder'><i class='btn-table bi bi-chat-fill'></i></a></td>";
            html += "</tr>";
        });
        document.getElementById("datos_contacto").innerHTML = html;
        $('#tabla_contacto').DataTable({
            language: {
                "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json"
            },
            "columnDefs":[
            {
                "targets":[3],
                "orderable":false,
            }]
        });
    }).fail(function(response) {
        console.log(response);
    });
}
function Contar(){
    $.ajax({
        data: { "contar": "Datos" },
        url: "?path=Asesor&c=Contacto&a=contar",
        type: 'POST',
        dataType: 'json'
    }).done(function(data) { 
        document.getElementById('cantidad').innerHTML = data.cantidad;
    }).fail(function(data) {
        document.getElementById('cantidad').innerHTML = "000";
    });
}
$(document).on("click",".ver",function(){
    fila = $(this).closest("tr");
    id = parseInt(fila.find('td:eq(0)').text());
    
    $.ajax({
        data:{"id": id},
        url:"?path=Asesor&c=Contacto&a=Obtener",
        type:'POST',
        dataType:'json'
    }).done(function(response){
        $.each(response, function(index,data){
            document.getElementById("id").value=data.id_contacto;
            document.getElementById("correo").value=data.correo;
            document.getElementById("mensaje").value=data.mensaje;
        });
    });
})
$.validator.setDefaults({
    highlight: function(element) {
        $(element).closest("#respuesta").addClass("is-invalid");
    },
    unhighlight: function(element) {
        $(element).closest("#respuesta").removeClass("is-invalid");
        
        $(element).closest("#respuesta").addClass("is-valid");
    },
});
$("#FormResponder").validate();
function retornar() {
    return {
        "id": document.getElementById('id').value,
        "correo": document.getElementById('correo').value,
        "respuesta": document.getElementById('respuesta').value
    };
}
$('#enviar').click(function() {
    if ($("#FormResponder").valid() == false) {
        return;
    }else {
        $.ajax({
            url: '?path=Asesor&c=Contacto&a=Responder',
            data: retornar(),
            type: 'POST',
            dataType: 'json',
            beforeSend: function() {
                Alerta("info", "Espere un momento...", "-", '3');//SPINNER
            },
            success: function(data) {
                if (data == "Exito") {
                    Alerta('success', 'Se ha enviado su respuesta con éxito', '', '2')
                    $('#Responder').modal('hide');
                }else{
                    Alerta('error', data, 'Por favor intentalo de nuevo', '1')
                }
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