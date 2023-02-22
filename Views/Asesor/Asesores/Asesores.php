<?php require('Views/Asesor/Lib/sidebar.php');?> 
<input type="text" class="d-none" name="idAsesor" id="idAsesor" value="<?php echo $_SESSION['id'] ?>">
<div class="row">
    <div class="col-lg-5 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header">
                <div class="icon icon-data">
                    <span class="icon-img material-icons">equalizer</span>
                </div>
            </div>
            <div class="card-content">
                <p class="category"><strong>Cantidad de Asesores</strong></p>
                <h3 class="card-title" id="cantidad"></h3>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-12 col-md-12 content-page">
    <div class="card-header-text">
        <h4 class="card-title fw-bold">Registro de Asesores</h4>
        <p class="category">Datos:</p>
        <div class="card-body card-body-2 align-items-center">
            <button type="button" class="btn btn-primary btn-sm" id="nuevo"><i class="bi bi-person-plus-fill"></i>&nbsp;&nbsp;Nuevo Asesor</button>
        </div>
    </div>
    <div class="card-content table-responsive">
        <table id="tabla_asesores" class="table table-sm table-striped table-hover">
            <thead class="text-white color-primary">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Direccion</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody id="datos">
                
            </tbody>
        </table>
        <br>
    </div>
</div>
<br><br><br><br><br><br><br><br>
<?php require_once('Views/Asesor/Asesores/ver_modal.php');?>   
<?php require_once('Views/Asesor/Asesores/Agregar_modal.php');?>
<?php require('Views/Asesor/Lib/footer.php');?> 
<script src="Js/Asesor/asesores.js"></script>