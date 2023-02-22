<?php require('Views/Asesor/Lib/sidebar.php');?> 
<div class="row">
    <div class="col-lg-5 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header">
                <div class="icon icon-data">
                    <span class="icon-img material-icons">equalizer</span>
                </div>
            </div>
            <div class="card-content">
                <p class="category"><strong>Cantidad de respuestas</strong></p>
                <h3 class="card-title" id="cantidad"></h3>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-12 col-md-12 content-page">
    <div class="card-header-text">
        <h4 class="card-title fw-bold">Registro de Contacto</h4>
        <p class="category">Datos:</p>
    </div>
    <div class="card-content table-responsive">
        <table id="tabla_contacto" class="table table-sm table-striped table-hover">
            <thead class="text-white color-primary">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Usuario</th>
                    <th scope="col">Mensaje</th>
                    <th></th>
                </tr>
            </thead>
            <tbody id="datos_contacto">
            </tbody>
        </table>
        <br>
    </div>
</div>
<br><br><br><br><br><br><br><br>          
<?php require('Views/Asesor/Lib/footer.php');?> 
<?php require_once('Views/Asesor/Contacto/responder.php');?>   
<script src="Js/Asesor/contacto.js"></script>
