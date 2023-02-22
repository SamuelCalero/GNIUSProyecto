$(document).ready(function() {
    imgmenu();
});
function imgmenu(){
    $.ajax({
        data: { "consultar": "Datos" },
        url: "?path=Asesor&c=Perfil&a=foto",
        type: 'POST',
        dataType: 'json'
    }).done(function(data) {
        if(data == "No" || data == "Error"){
            document.getElementById("img-menu").src = "Assets/Img/Foto/img-perfil.jpg";
        }else{
            document.getElementById("img-menu").src = data;
        }
        //$('#img').html(data);
    }).fail(function(data) {
        console.log("error");
    });
}