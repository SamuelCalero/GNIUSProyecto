    <!--Validación-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.js"></script>
    <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.10.0/localization/messages_es.js"></script>
    <!--SweetALERT-->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!--BOOTSTRAP-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js " integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM " crossorigin="anonymous "></script>
    <!--CLOUDFLARE-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js "></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <!--SCRIPTS-->
    <script src="Assets/Js/paginas-script.js"></script>
    <script src="Js/Emprendedor/contacto.js"></script>
    <script >
        $(document).ready(function() {
            $.ajax({
                url: "?path=Emprendedor&c=Principal&a=consultar",
                data: { "datos": "Datos" },
                type: 'POST',
                dataType: 'json',
                success: function(data) {
                    if(data=="NoCita"){
                        $('#formulario').addClass("disabled");
                    }else if(data=="NoCitaR"){
                        $('#reunion').addClass("disabled");
                        $('#formulario').addClass("disabled");
                    }else if(data=="SiFrm"){
                        $('#reunion').addClass("disabled");
                        $('#formulario').addClass("disabled");
                    }else if(data=="NoFrm"){
                        $('#formulario').removeClass("disabled");
                        $('#reunion').addClass("disabled");
                    }else{
                        $('#reunion').addClass("disabled");
                        $('#formulario').addClass("disabled");
                    }
                },
                error: function(error) {
                    Alerta("warning", "Error", "Error en enviar los datos", '1');
                }
            });
        });
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>
</body>
</html>