$(document).ready(function() {
    Consultar();
    Contar();
});

function Consultar() {
    $.ajax({
        data: { "consultar": "Datos" },
        url: "?path=Asesor&c=Formulario&a=consultar",
        type: 'POST',
        dataType: 'json'
    }).done(function(response) {
        var html = "";
        $.each(response, function(index, data) {
            html += "<tr>";
            html += "<td>" + data.id_formulario + "</td>";
            html += "<td>" + data.nombre_empresa + "</td>";
            html += "<td>" + data.correo_empresa + "</td>";
            html += "<td>" + data.vinculo_utec + "</td>";
            html += "<td>" + data.dato_emprendedor + "</td>";
            html += "<td>" + data.apoyo + "</td>";
            html += "<td><button name='ver' class='ver btn btn-sm' data-bs-toggle='modal' data-bs-target='#verFormulario'><i class='btn-table bi bi-eye-fill'></i></button></td>";
            html += "<td><button name='eliminar' class='eliminar btn btn-sm'><i class='btn-table bi bi-trash-fill'></i></button></td>";
            html += "<td><button name='reporte' id='reporte' class='reporte btn btn-sm'><i class='btn-table bi bi-download'></i></button></td>";
            html += "</tr>";
        });
        document.getElementById("datos").innerHTML = html;
        $('#tabla_formulario').DataTable({
            language: {
                "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json"
            },
            "columnDefs":[
            {
                "targets":[6, 7, 8],
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
        url: "?path=Asesor&c=Formulario&a=contar",
        type: 'POST',
        dataType: 'json'
    }).done(function(data) { 
        document.getElementById('cantidad').innerHTML = data.cantidad;
    }).fail(function(data) {
        document.getElementById('cantidad').innerHTML = "000";
    });
}
$(document).on("click",".eliminar", function(){
    Swal.fire({
        title: '¿Estas seguro de eliminar el registro?',
        text: 'Con ello eliminas los datos de las empresas y emprendedores que se registraron en el Formulario',
        showDenyButton: true,
        confirmButtonColor: '#431220',
        denyButtonColor: '#8A8A8A',
        confirmButtonText: 'Eliminar',
        denyButtonText: 'Cancelar',
    }).then((result) => {
        if(result.isConfirmed) {
            fila = $(this).closest("tr");
            id = parseInt(fila.find('td:eq(0)').text());
            $.ajax({
                data: { "id": id },
                url: "?path=Asesor&c=Formulario&a=eliminar",
                type: 'POST',
                dataType: 'json'
            }).done(function(data) {
                if(data == "Ok"){
                    Alerta('success', 'Se ha eliminado con éxito', '', '2')
                }else{
                    Alerta('error', 'No se ha podido eliminar', '', '2')
                }
            }).fail(function(error) {
                Alerta('warning', 'Hubo un error', 'Error al momento de eliminar', '1')
            });
        }else if (result.isDenied) {
            Alerta('info', 'Cancelado', '', '1');
        }
    })
});

$(document).on("click",".ver", function(){
    fila = $(this).closest("tr");
    id = parseInt(fila.find('td:eq(0)').text());
    $.ajax({
        data: { "id": id },
        url: "?path=Asesor&c=Formulario&a=obtener",
        type: 'POST',
        dataType: 'json'
    }).done(function(response) {
        $.each(response, function(index, data) {
            document.getElementById('nombre-empresa').innerHTML = "<strong>Nombre Empresa: </strong>" + data.nombre_empresa;
            document.getElementById('direccion-empresa').innerHTML = "<strong>Dirección: </strong>" + data.direccion;
            document.getElementById('correo-empresa').innerHTML = "<strong>Correo: </strong>" + data.correo_empresa;
            document.getElementById('telefono-empresa').innerHTML = "<strong>Teléfono: </strong>" + data.telefono;
            document.getElementById('rubro-empresa').innerHTML = "<strong>Rubro: </strong>" + data.rubro;
            document.getElementById('titulo-inv').innerHTML = "<strong>Título Investigación: </strong>" + data.titulo_investigacion;
            document.getElementById('vinculo').innerHTML = data.vinculo_utec;
            document.getElementById('apoyo').innerHTML = data.apoyo;
            document.getElementById('descripcion').innerHTML = data.descripcion_emprendimiento;
            document.getElementById('perfil2').innerHTML = data.perfil_investigacion;
            document.getElementById('problema').innerHTML = data.planteamiento_problema;
            document.getElementById('antecedentes').innerHTML = data.antecedentes;
            document.getElementById('delimitacion').innerHTML = data.delimitacion;
            document.getElementById('justificacion').innerHTML = data.justificacion;
            document.getElementById('objetivos').innerHTML = data.objetivos;
            document.getElementById('metodologia').innerHTML = data.metodologia;
            document.getElementById('cronograma').innerHTML = data.cronograma;
            document.getElementById('datos-emprendedor').innerHTML = data.dato_emprendedor;
            /*document.getElementById("titulo").value = data.titulo_investigacion;*/
        });
        $.ajax({
            data: { "id": id },
            url: "?path=Asesor&c=Formulario&a=cantidad",
            type: 'POST',
            dataType: 'json'
        }).done(function(data) {
            
            var cantidad = data.contador;
            var contador = 0;
            var clase = "";
            var c = 0;

            $.ajax({
                data: { "id": id },
                url: "?path=Asesor&c=Formulario&a=datos",
                type: 'POST',
                dataType: 'json'
            }).done(function(response) {
                if((cantidad%2)!=0){
                    cantidad = (cantidad - 1)/2;
                    var html = "";
                    var html2 = "";
                    $.each(response, function(index, data) {
                        c++;
                        contador++;
                        
                        if(contador==1){
                            clase = "sl-first";
                        }else if(contador == 2){
                            clase = "sl-second";
                        }else{
                            clase = "sl-third";
                            contador=0;
                        }
                        if(c<=(cantidad+1)){
                            html += '<div class="sl-item '+clase+'">';
                            html += '<div class="sl-content">';
                            html += '<div class="fw-bold text-capitalize tittle-act">'+data.nombre_emprendedor+'</div>';
                            html += '<div class="text-act text-lowercase">'+data.correo+'</div>';
                            html += '<div class="text-act"><strong>Telefono: </strong>'+data.telefono+'</div>';
                            html += '<div class="text-act"><strong>Direccion: </strong>'+data.direccion+'</div>';
                            html += '</div>';
                            html += '</div>';
                        }else{
                            html2 += '<div class="sl-item '+clase+'">';
                            html2 += '<div class="sl-content">';
                            html2 += '<div class="fw-bold text-capitalize tittle-act">'+data.nombre_emprendedor+'</div>';
                            html2 += '<div class="text-act text-lowercase">'+data.correo+'</div>';
                            html2 += '<div class="text-act"><strong>Telefono: </strong>'+data.telefono+'</div>';
                            html2 += '<div class="text-act"><strong>Direccion: </strong>'+data.direccion+'</div>';
                            html2 += '</div>';
                            html2 += '</div>';
                        }
                    });
                    document.getElementById("datos-emprendedor1").innerHTML = html;
                    document.getElementById("datos-emprendedor2").innerHTML = html2;
                }else{
                    cantidad = cantidad/2;
                    var html = "";
                    var html2 = "";
                    $.each(response, function(index, data) {
                        c++;
                        contador++;
                        
                        if(contador==1){
                            clase = "sl-first";
                        }else if(contador == 2){
                            clase = "sl-second";
                        }else{
                            clase = "sl-third";
                            contador=0;
                        }
                        if(c<=cantidad){
                            html += '<div class="sl-item '+clase+'">';
                            html += '<div class="sl-content">';
                            html += '<div class="fw-bold text-capitalize tittle-act">'+data.nombre_emprendedor+'</div>';
                            html += '<div class="text-act text-lowercase">'+data.correo+'</div>';
                            html += '<div class="text-act"><strong>Telefono: </strong>'+data.telefono+'</div>';
                            html += '<div class="text-act"><strong>Direccion: </strong>'+data.direccion+'</div>';
                            html += '</div>';
                            html += '</div>';
                        }else{
                            html2 += '<div class="sl-item '+clase+'">';
                            html2 += '<div class="sl-content">';
                            html2 += '<div class="fw-bold text-capitalize tittle-act">'+data.nombre_emprendedor+'</div>';
                            html2 += '<div class="text-act text-lowercase">'+data.correo+'</div>';
                            html2 += '<div class="text-act"><strong>Telefono: </strong>'+data.telefono+'</div>';
                            html2 += '<div class="text-act"><strong>Direccion: </strong>'+data.direccion+'</div>';
                            html2 += '</div>';
                            html2 += '</div>';
                        }
                    });
                    document.getElementById("datos-emprendedor1").innerHTML = html;
                    document.getElementById("datos-emprendedor2").innerHTML = html2;
                }
                
                
            });

        });
    });
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
$(document).on("click",".reporte", function(){
    fila = $(this).closest("tr");
    id = parseInt(fila.find('td:eq(0)').text());
    window.open('?path=Asesor&c=Formulario&a=reporte&id='+id+'');
})