<?php require('Views/Emprendedor/Lib/Navbar.php');?> 
<style type="text/css">
    #form_registro fieldset:not(:first-of-type) {
        display: none;
    }
</style>
<div class="divisor-frm"></div>
  <div class="container">
    <form action="" id="form_registro" class="f1">
      <div class="row justify-content-center">
        <div class="col-xl-9 col-lg-12 col-md-9">
          <div class="card border-0 shadow-lg my-5">
            <div class="pt-2 pb-1 bg-primary">
              <div class="text-center">
                  <p class="h4 text-gray-900">FORMULARIO PRELIMINAR DE INGRESO A LA OFICINA DE APOYO A LA INNOVACIÓN G'NIUS</p>
              </div>
            </div>
            <div class="p-4 pt-1">
              <div class="f1-steps">
                <div class="f1-progress">
                  <div class="f1-progress-line" data-now-value="8" data-number-of-steps="6" style="width: 8%;"></div>
                </div>
                <div class="f1-step active">
                  <div class="f1-step-icon"><i class="bi bi-lightbulb"></i></div>
                </div>
                <div class="f1-step">
                  <div class="f1-step-icon"><i class="bi bi-building"></i></div>
                </div>
                <div class="f1-step f1-step2">
                  <div class="f1-step-icon2"></div>
                </div>
                <div class="f1-step f1-step2">
                  <div class="f1-step-icon2"></div>
                </div>
                <div class="f1-step">
                  <div class="f1-step-icon"><i class="bi bi-people"></i></div>
                </div>
                <div class="f1-step">
                  <div class="f1-step-icon"><i class="bi bi-clipboard2-check"></i></div>
                </div>
                <div class="f1-step-text">
                  <p>Sección 1</p>
                  <p>Sección 2</p>
                  <p></p>
                  <p></p>
                  <p>Sección 3</p>
                  <p>Sección Final</p>
                </div>
              </div>
              <fieldset>
                <div class="text-center">
                  <p class="h6 mb-4 mt-0 fw-bold">1. Generalidades</p>
                </div>
                <div class="row gx-2">
                  <div class="col-sm-12 col-xl-12 mb-3">
                    <input maxlength="100" autocomplete="off" type="text" class="form-control form-control-sm" placeholder="Nombre del equipo investigador" name="nombre_empresa" required>
                  </div>
                  <div class="col-sm-6 col-xl-8 mb-3">
                    <input maxlength="100" autocomplete="off" type="email" class="form-control form-control-sm" placeholder="Correo" name="correo_empresa" required>
                  </div>
                  <div class="col-sm-6 col-xl-4 mb-3">
                    <input minlength="9" maxlength="9" autocomplete="off" type="text" class="telefono_empresa form-control form-control-sm" placeholder="Teléfono" name="telefono_empresa" required>
                  </div>
                  <div class="col-sm-6 col-xl-6 mb-3">
                    <textarea autocomplete="off" maxlength="200" class="form-control form-control-sm" cols="20" rows="2" placeholder="Dirección" name="direccion_empresa" required></textarea>
                  </div>
                  <div class="col-sm-6 col-xl-6 mb-3">
                    <input autocomplete="off" maxlength="100" type="text" class="form-control form-control-sm" placeholder="Rubro" name="rubro" required>
                  </div>
                  <div class="col-sm-12 col-xl-12 mb-3">
                    <textarea autocomplete="off" maxlength="200" class="form-control form-control-sm" cols="20" rows="2" placeholder="¿Posee algún vínculo con la UTEC?" name="vinculo" required></textarea>
                  </div>
                </div>
                <input type="button" class="next-form btn btn-primary btn-sm align-input" value="Siguiente" />
              </fieldset>
              <fieldset>
                <div class="text-center">
                  <div class="mt-0 mb-3">
                    <div class="h6 fw-bold">2. Emprendimiento</div>
                    <div class="h6 fw-normal fst-italic">Parte 1</div>
                  </div>
                </div>
                <div class="row gx-2">
                  <div class="col-sm-12 col-xl-12 mb-3">
                    <textarea autocomplete="off" maxlength="500" class="form-control form-control-sm" cols="20" rows="2" placeholder="Describa brevemente en que consiste su proyecto emprendedor" name="descripcion" required></textarea>
                  </div>
                  <div class="col-sm-12 col-xl-12 mb-3">
                    <textarea autocomplete="off" maxlength="1000" class="form-control form-control-sm" cols="20" rows="2" placeholder="Perfil de la investigacion" name="perfil" required></textarea>
                  </div>
                  <div class="col-sm-12 col-xl-12 mb-3">
                    <input autocomplete="off" maxlength="100" type="text" class="form-control form-control-sm" placeholder="Título de la investigación" name="titulo" required>
                  </div>
                </div>
                <input type="button" name="previous" class="previous-form btn btn-secondary btn-sm " value="Regresar" />
                <input type="button" class="next-form btn btn-primary btn-sm align-input" value="Siguiente" />
              </fieldset>
              <fieldset>
                <div class="text-center">
                  <div class="mt-0 mb-3">
                    <div class="h6 fw-bold">2. Emprendimiento</div>
                    <div class="h6 fw-normal fst-italic">Parte 2</div>
                  </div>
                </div>
                <div class="row gx-2">
                  <div class="col-sm-12 col-xl-12 mb-3">
                    <textarea autocomplete="off" maxlength="1500" class="form-control form-control-sm" cols="20" rows="2" placeholder="Planteamiento del problema" name="planteamiento" required></textarea>
                  </div>
                  <div class="col-sm-12 col-xl-12 mb-3">
                    <textarea autocomplete="off" maxlength="1500" class="form-control form-control-sm" cols="20" rows="2" placeholder="Antecedentes" name="antecedentes" required></textarea>
                  </div>
                  <div class="col-sm-12 col-xl-12 mb-3">
                    <textarea autocomplete="off" maxlength="1500" class="form-control form-control-sm" cols="20" rows="2" placeholder="Delimitación" name="delimitacion" required></textarea>
                  </div>
                  <div class="col-sm-12 col-xl-12 mb-3">
                    <textarea autocomplete="off" maxlength="1500" class="form-control form-control-sm" cols="20" rows="2" placeholder="Justificación" name="justificacion" required></textarea>
                  </div>
                </div>
                <input type="button" name="previous" class="previous-form btn btn-secondary btn-sm" value="Regresar" />
                <input type="button" class="next-form btn btn-primary btn-sm align-input" value="Siguiente" />
              </fieldset>
              <fieldset>
                <div class="text-center">
                  <div class="mt-0 mb-3">
                    <div class="h6 fw-bold">2. Emprendimiento</div>
                    <div class="h6 fw-normal fst-italic">Parte 3</div>
                  </div>
                </div>
                <div class="row gx-2">
                  <div class="col-sm-12 col-xl-12 mb-3">
                    <textarea autocomplete="off" maxlength="1000" class="form-control" cols="20" rows="2" placeholder="Objetivos" name="objetivos" required></textarea>
                  </div>
                  <div class="col-sm-12 col-xl-12 mb-3">
                    <textarea autocomplete="off" maxlength="1000" class="form-control" cols="20" rows="2" placeholder="Metodología" name="metodologia" required></textarea>
                  </div>
                  <div class="col-sm-12 col-xl-12 mb-3">
                    <textarea autocomplete="off" maxlength="1500" class="form-control" cols="20" rows="2" placeholder="Cronograma de actividades" name="cronograma" required></textarea>
                  </div>
                </div>
                <input type="button" name="previous" class="previous-form btn btn-secondary btn-sm" value="Regresar" />
                <input type="button" class="next-form btn btn-primary btn-sm align-input" value="Siguiente" />
              </fieldset>
              <fieldset>
                <div class="text-center">
                  <p class="h6 mb-4 mt-0 fw-bold">3. Recurso Humano</p>
                </div>
                <div class="row gx-2">
                  <div class="col-sm-12 col-xl-12 mb-3">
                    <textarea autocomplete="off" maxlength="700" id="txtDatos" class="form-control form-control-sm" placeholder="Carreras de cada integrante en el equipo investigador" name="datos_integrantes" required></textarea>
                  </div>
                </div>
                <input id="input-integrantes" name="cont-integrantes" class="d-none" type="text" >
                <p class="lh-1 fst-italic fs-6 text-center">Si desea agregar más integrantes dar click en el botón " <i class="bi bi-plus-lg"></i>Integrante "<br>
                  Para eliminar integrante dar click en el botón " <i class="bi bi-person-dash-fill"></i> "
                </p>
                <div id="div_integrantes" class="contador">
                  <div class="row gx-2">
                    <div class="col-xl-12 mb-1">
                      <div class="contIntegrante"></div>
                        <label class="label-integrante fw-bold fst-italic form-label">Integrante 1</label>
                        <button class="btn btn-primary btn-sm align-input" id="agregarIntegrante" type="button"> <i class="bi bi-plus-lg"></i> Integrante</button>
                      </div>
                    <div class="col-sm-8 col-xl-9 mb-1">
                      <input autocomplete="off" maxlength="200" type="text" class="nomIntegrante form-control form-control-sm" maxlength="100" placeholder="Nombre integrante" name="nombreintegrante0" required>
                    </div>
                    <div class="col-sm-4 col-xl-3 mb-1">
                      <input autocomplete="off" minlength="9" maxlength="9" type="text" class="telIntegrante telefono form-control form-control-sm" placeholder="Teléfono" name="telefonoIntegrante0" required>
                    </div>
                    <div class="col-sm-7 col-xl-6 mb-1">
                      <input autocomplete="off" maxlength="200" type="email" class="corIntegrante form-control form-control-sm" placeholder="Correo" name="correoIntegrante0" required>
                    </div>
                    <div class="col-sm-5 col-xl-6 mb-3">
                      <input autocomplete="off" maxlength="200" type="text" class="dirIntegrante form-control form-control-sm" maxlength="100" placeholder="Direccion" name="direccionIntegrante0" required>
                    </div>
                  </div>
                </div>
                <div id="integranteRow" class=""></div>
                <input type="button" name="previous" class="previous-form btn btn-secondary btn-sm" value="Regresar" />
                <input type="button" class="next-form btn btn-primary btn-sm align-input" value="Siguiente" />
              </fieldset>
              <fieldset>
                <div class="text-center">
                  <p class="h6 mb-4 mt-0 fw-bold">4. Tipo de apoyo</p>
                </div>
                <div class="row gx-2">
                  <div class="col-sm-12 col-xl-12 mb-3">
                    <label class="form-label">Responda brevemente el tipo de apoyo solicitado</label>
                    <textarea autocomplete="off" maxlength="300" class="form-control" cols="20" rows="2" placeholder="" name="apoyo" required></textarea>
                  </div>
                </div>
                <input type="button" name="previous" class="previous-form btn btn-secondary btn-sm" value="Regresar" />
                <button type="button" name="submit" id="enviaFrm" class="submit btn btn-primary btn-sm align-input">Enviar</button>
              </fieldset>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
<?php require('Views/Emprendedor/Lib/Footer.php');?>
<script src="Js/Emprendedor/formulario.js"></script>