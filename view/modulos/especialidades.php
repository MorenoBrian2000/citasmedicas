<div class="page-header flex-wrap">
    <div class="header-left">
        <h4>Lista de Especialidades</h4>
    </div>
    <div class="header-right d-flex flex-wrap mt-2 mt-sm-0">
        <button type="button" class="btn btn-primary mt-2 mt-sm-0 btn-icon-text" data-toggle="modal"
            data-target="#modalAgregarEspecialidades">
            <i class="mdi mdi-plus-circle"></i> Agregar Especialidades </button>
    </div>
</div>

<!-- Tabla de Medico-->
<div class="col-lg-12 p-0 mb-3 ">
    <div class="table-responsive">
        <table id="example" class="table table-striped mt-3">
            <thead>
                <tr>
                    <th><i class="mdi mdi-cogs"></i></th>
                    <th><i class="mdi mdi-cogs"></i></th>
                    <th>Descripción</th>
                    <th>Estatus</th>
                    <th>Acciones</th>
                </tr>
            </thead>
        </table>
    </div>
</div>


<!-- Modal Agregar Especialidades -->
<div class="modal fade" id="modalAgregarEspecialidades" tabindex="-1" role="dialog"
    aria-labelledby="modalAgregarEspecialidadesLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAgregarEspecialidadesLabel">Agregar Especialidades</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Nombre  -->
                <p class="card-description">Completa los campos correctamente</p>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="nombre_especialidad"><b>Nombre</b></label>
                            <div class="input-group-prepend">
                                <span class="input-group-text">@</span>
                                <input type="hidden" id="id_especialidad">
                                <input type="text" class="form-control" id="txt_nombre_especialidad"
                                    placeholder="Nombre">
                            </div>
                        </div>
                    </div>
                    <!-- Doctor-->
                    <!-- <div class="col-md-12">
                        <div class="form-group">
                            <label for="id_medico"><b>Nombre Medico</b></label>
                            <div class="input-group-prepend">
                                <span class="input-group-text">@</span>
                                <input id="txtMedico" class="txtMedico form-control" autocomplete="off" placeholder="Elige la Linea...">
                                <input type="hidden" id="id_medico" name="id_medico">
                            </div>
                            <div id="contenedorMedico" class="capa contenedorMedico" style="display:none;"></div>
                        </div>
                    </div> -->
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">CERRAR</button>
                <button type="button" class="btn btn-success" onclick="crearEspecialidades();">GUARDAR</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal Actualizar Especialidades -->
<div class="modal fade" id="modalUpdateEspecialidades" tabindex="-1" role="dialog"
    aria-labelledby="modalUpdateEspecialidadesLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalUpdateEspecialidadesLabel">Editar Especialidades</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-sample">
                    <p class="card-description">Completa los campos correctamente</p>
                    <div class="row">
                        <!-- Nombre  -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="nombre_especialidad"><b>Nombre</b></label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">@</span>
                                    <input type="hidden" id="id_especialidad">
                                    <input type="text" class="form-control" id="nombre_especialidad"
                                        placeholder="Nombre">
                                </div>
                            </div>
                        </div>
                        <!-- Doctor-->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="id_medico"><b>Estatus</b></label>
                                <select class="form-control" id="">
                                    <option value="">Selecciona una opnción</option>
                                    <option value="1">Activo</option>
                                    <option value="2">Inactivo</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">CERRAR</button>
                <button type="button" class="btn btn-success" onclick="actulizarEspecialidades();">GUARDAR</button>
            </div>
        </div>
    </div>
</div>


<script src="view/js/especialidades.js"></script>