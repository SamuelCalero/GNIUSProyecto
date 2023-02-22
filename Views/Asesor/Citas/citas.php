<link rel="stylesheet" href="Assets/Css/main.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.9/jquery.datetimepicker.min.css" integrity="sha512-f0tzWhCwVFS3WeYaofoLWkTP62ObhewQ1EZn65oSYDZUg1+CyywGKkWzm8BxaJj5HGKI72PnMH9jYyIFz+GH7g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<?php require('Views/Asesor/Lib/sidebar.php');?> 
<div class="container">
    <div id="calendar">
    </div>
    <br><br><br><br><br><br>
</div>
<!--MODAL-->
<div class="modal fade" id="CitasModal" tabindex="-1" aria-labelledby="Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-info2">
                <h5 class="modal-title" id="titulo">Registro de Eventos</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="formulario" autocomplete="off" method="POST">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-2">
                                <input id="codigo" type="hidden" class="form-control d-none" name="codigo">
                                <label for="title" class="form-label">Titulo</label>
                                <input id="title" type="text" class="form-control" name="title" placeholder="Titulo" required>
                            </div>
                        </div>
                        <div class="row">
                            <!--input type="text" id="estado"-->
                            <div id="row1" class="mb-2 col-md-12">
                                <label for="nombres" class="form-label">Nombres</label>
                                <input type="text" class="form-control" name="nombres" id="nombres" placeholder="Nombres" autocomplete="off" required>
                            </div>
                            <div id="row2" class="mb-2 col-md-12">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                            </div>
                            <div id="row3" class="mb-2 col-md-4">
                                <label for="telefono" class="form-label">Telefono</label>
                                <input type="text" class="form-control" name="telefono" id="telefono" placeholder="Telefono" required>
                            </div>
                            <div class="mb-2 col-md-6">
                                <label for="fecha" class="form-label">Fecha y Hora</label>
                                <input type="text" class="form-control" name="start" id="start" placeholder="dd/mm/aaaa" autocomplete="off" required>
                            </div>
                            <div class="col-md-2">
                                <label for="color" class="form-label">Color</label>
                                <input class="form-control" id="color" type="color" name="color">
                            </div>
                        </div>
                    </div>
                    <div id="respInfo" class="mt-2 d-none">
                        <h6 class="info">Recuerda que si confirmas, de inmediato se le enviará un correo al emprendedor para que proceder al paso del llenado del formulario</h6>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="Realizada" name="resp" id="resp1">
                            <label class="form-check-label">Sí</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="Incumplida" name="resp" id="resp2">
                            <label class="form-check-label">Incumplida</label>
                        </div>
                    </div>
                </div>
            </form>
            <hr class="divider3">
            <div class="row">
                <div id="botones" class="col-md-6 text-start">
                    <div class="ps-3 pb-3 pt-2 bd-highlight"><a class="resp link-secondary" id="btnResp">¿La reunión ya fue realizada?</a></div>
                </div>
                <div id="botones_accion" class="col-md-6 text-end">
                    <div class="ps-2 pb-3 pe-4 pt-2">
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal" id="btnCancelar">Cancelar</button>
                        <button type="button" class="btn btn-primary btn-sm" name="btnAccion" id="btnAccion">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
 
<?php require('Views/Asesor/Lib/footer.php');?> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.9/jquery.datetimepicker.full.min.js" integrity="sha512-hDFt+089A+EmzZS6n/urree+gmentY36d9flHQ5ChfiRjEJJKFSsl1HqyEOS5qz7jjbMZ0JU4u/x1qe211534g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="Assets/Js/main.min.js"></script>
<script src="Assets/Js/es.js"></script>
<script src="Js/Asesor/citas.js"></script>

<script>
    $('#start').datetimepicker({onGenerate:function( ct ){
		$(this).find('.xdsoft_date.xdsoft_weekend')
		.addClass('xdsoft_disabled');
	},
        lang:'ch',
        scrollMonth:false,
	    formatDate:'Y/m/d',
        prevButton:false,
        nextButton:false,
        todayButton:false,
        allowTimes: ['9:00','9:30','10:00','10:30','11:00','11:30','14:00','14:30','15:00','15:30','16:00']     
    });
</script>