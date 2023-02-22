<?php require('Views/Emprendedor/Lib/Navbar.php');?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.9/jquery.datetimepicker.min.css" integrity="sha512-f0tzWhCwVFS3WeYaofoLWkTP62ObhewQ1EZn65oSYDZUg1+CyywGKkWzm8BxaJj5HGKI72PnMH9jYyIFz+GH7g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<br><br><br><br>
<?php $color = substr(md5(time()), 0, 6); ?>
<div class="divisor-frm"></div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-7 col-lg-7 col-md-7">
            <div class="card o-hidden border-0 shadow-lg ">
                <div class="col">
                    <div class="mt-3">
                        <div class="mb-1">
                            <div class="text-center img-icono"><img src="Assets/Img/Iconos/icono5.png" alt=""></div>
                        </div>
                        <div class="text-center mt-3">
                            <h1 class="h4 text-gray-900 mb-2 fw-bold" style="color:#431220;">Agendar una cita</h1>
                        </div>
                    </div>
                </div>
                <div class="row g-3 ms-4 me-5 mb-4">
                    <form id="form_cita" method="POST">
                        <div class="row g-3">
                            <div class="col-sm-12 col-xl-12">
                                <label class="form-label">Nombre:</label>
                                <input maxlength="100" type="text" class="form-control" name="nombres" id="nombres" placeholder="Nombre" autocomplete="off" required>
                            </div>
                            <div class="col-sm-12 col-xl-5">
                                <label class="form-label">Teléfono:</label>
                                <input minlength="9" maxlength="9" type="text" class="form-control" name="telefono" id="telefono" placeholder="Teléfono" autocomplete="off" required>
                            </div>
                            <div class="col-sm-12 col-xl-7">
                                <label class="form-label">Fecha y Hora:</label>
                                <input type="text" class="form-control" name="fecha" id="fecha" placeholder="dd/mm/aaaa" autocomplete="off" required>
                            </div>
                        </div>
                    </form>
                    <div class="d-flex flex-row-reverse">
                        <button type="button" id="guardarCita" class="btn btn-primary btn-sm">Guardar Cita</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br>
<?php require('Views/Emprendedor/Lib/Footer.php');?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.9/jquery.datetimepicker.full.min.js" integrity="sha512-hDFt+089A+EmzZS6n/urree+gmentY36d9flHQ5ChfiRjEJJKFSsl1HqyEOS5qz7jjbMZ0JU4u/x1qe211534g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="Js/Emprendedor/citas.js"></script>
<script>
$('#fecha').datetimepicker({onGenerate:function( ct ){
    $(this).find('.xdsoft_date.xdsoft_weekend')
    .addClass('xdsoft_disabled');
},
    lang:'ch',
    scrollMonth:false,
    minDate:'+1970/01/02',
    maxDate:'+1970/01/06',
    formatDate:'Y/m/d',
    prevButton:false,
    nextButton:false,
    todayButton:false,
    allowTimes: ['9:00','9:30','10:00','10:30','11:00','14:00','14:30','15:00','15:30','16:00']     
});
</script>
