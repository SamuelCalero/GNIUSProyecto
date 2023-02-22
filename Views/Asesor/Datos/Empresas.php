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
                <p class="category"><strong>Cantidad de Empresas:</strong></p>
                <h3 class="card-title" id="cantidad"></h3>
            </div>
        </div>
    </div>
</div>
<nav>
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <a href="?path=Asesor&c=DatosEmprendedores&a=inicio" class="nav-link" id="" type="button">Emprendedores</a>
        <a href="?path=Asesor&c=DatosEmpresas&a=inicio" class="nav-link active" id="" type="button">Empresas</a>
    </div>
</nav>
<div class="tab-content" id="nav-tabContent">
    <div class="col-lg-12 col-md-12 content-page">
        <div class="card-header-text">
            <h4 class="card-title fw-bold">Registro de Empresas</h4>
            <p class="category">Datos:</p>
            <div class="card-body d-flex justify-content-between align-items-center">
                <p></p>
                <button type="button" id="reporte" class="btn btn-primary btn-sm"><i class="bi bi-download"></i>&nbsp;&nbsp;&nbsp;Crear reporte</button>
            </div>
        </div>
        <div class="card-content table-responsive">
            <table id="tabla_empresas" class="table table-sm table-striped table-hover">
                <thead class="text-white color-primary">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre Empresa</th>
                        <th scope="col">Rubro</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="datos_empresas">
                </tbody>
            </table>
            <br>
        </div>
    </div>
</div>
<br><br><br><br><br><br><br><br>  
<?php require_once('Views/Asesor/Datos/Modal_empresa.php');?>             
<?php require('Views/Asesor/Lib/footer.php');?> 
<script src="Js/Asesor/datos-empresas.js"></script>
