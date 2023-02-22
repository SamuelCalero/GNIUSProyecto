$(document).ready(function() {
    datos();
});
function datos(){
    var id = document.getElementById("id").value;
    $.ajax({
        data: { "id": id },
        url: "?path=Emprendedor&c=Principal&a=foto",
        type: 'POST',
        dataType: 'json'
    }).done(function(data) {
        if(data == "No" || data == "Error"){
            document.getElementById("foto-index").src = "Assets/Img/Foto/img-perfil.jpg";
        }else{
            document.getElementById("foto-index").src = data;
        }
        $.ajax({
            data: { "id": id },
            url: "?path=Emprendedor&c=Principal&a=datos",
            type: 'POST',
            dataType: 'json'
        }).done(function(response) {
            $.each(response, function(index, data) {
                document.getElementById('nombreAsesor').innerHTML = "<b>Asesor: </b>" + data.nombre;
                document.getElementById('correoAsesor').innerHTML = data.correo;
            });
        }).fail(function(data) {
            alert("Error");
        });
    }).fail(function(data) {
        alert("Error");
    });
}