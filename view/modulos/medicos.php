<div class="page-header flex-wrap">
    <div class="header-left">
        <h4>Lista de Medico</h4>
    </div>
    <div class="header-right d-flex flex-wrap mt-2 mt-sm-0">
        <button type="button" class="btn btn-primary mt-2 mt-sm-0 btn-icon-text" data-toggle="modal"
            data-target="#modalAgregarMedico">
            <i class="mdi mdi-plus-circle"></i> Agregar Medico
        </button>
    </div>
</div>

<!-- Tabla de Medico-->
<div class="col-lg-12 p-0 mb-3 ">
    <div class="table-responsive">
        <table id="datatable" class="table table-striped mt-3">
            <thead>
                <tr>
                    <th><i class="mdi mdi-cogs"></i></th>
                    <th><i class="mdi mdi-cogs"></i></th>
                    <th>Nombre</th>
                    <th>Especialidad</th>
                    <th>Correo</th>
                    <th>Estatus</th>
                    <th>Acciones</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

<!-- Modal Agregar Medicos -->
<div class="modal fade" id="modalAgregarMedico" tabindex="-1" role="dialog" aria-labelledby="modalAgregarMedicoLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAgregarMedicoLabel">Agregar Medicos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-sample" id='form-add'>
                <div class="modal-body">
                    <p class="card-description">Completa los campos correctamente</p>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nombre_medico"><b>Nombre</b></label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">@</span>
                                    <input type="text" required class="form-control" id="txt_nombre_medico"
                                        placeholder="Nombre">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="apaterno_medico"><b>Apellido Paterno</b></label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">@</span>
                                    <input type="text" class="form-control" id="txt_apaterno_medico" required
                                        placeholder="Apellido Paterno">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="amaterno_medico"><b>Apellido Materno</b></label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">@</span>
                                    <input type="text" class="form-control" id="txt_amaterno_medico"
                                        placeholder="Apellido Materno">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="correo_medico"><b>Correo</b></label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">@</span>
                                    <input type="email" class="form-control" id="txt_correo_medico"
                                        placeholder="Correo">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="domicilio_medico"><b>Domicilio</b></label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">@</span>
                                    <input type="text" class="form-control" id="txt_domicilio_medico"
                                        placeholder="Domicilio">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="telefono_medico"><b>Telefono</b></label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">@</span>
                                    <input type="text" class="form-control" id="txt_telefono_medico"
                                        placeholder="Telefono">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="especialidad_medico"><b>Especialidad</b></label>
                                <div class="input-group-prepend">
                                    <select id="txt_especialidad_medico" required class="form-control">
                                        <option value="">Seleciona una especialidad</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="rfc_medico"><b>RFC</b></label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">@</span>
                                    <input type="text" class="form-control" id="txt_rfc_medico"
                                        placeholder="Escriba la nueva contraseña">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="cedula_medico"><b>Cedula</b></label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">@</span>
                                    <input type="text" class="form-control" id="txt_cedula_medico" placeholder="Cedula">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">CERRAR</button>
                    <input type="submit" class="btn btn-success" value="GUARDAR">
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Actualizar Medicos -->
<div class="modal fade" id="modalUpdateMedico" tabindex="-1" role="dialog" aria-labelledby="modalUpdateMedicoLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalUpdateMedicoLabel">Editar Medicos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-sample" id="editar-medico">
                    <p class="card-description">Completa los campos correctamente</p>
                    <div class="row">
                        <!-- Nombre  -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nombre_medico"><b>Nombre</b></label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">@</span>
                                    <input type="hidden" id="id_medico" required>
                                    <input type="text" class="form-control" id="nombre_medico" placeholder="Nombre"
                                        required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="apaterno_medico"><b>Apellido Paterno</b></label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">@</span>
                                    <input type="text" class="form-control" id="apaterno_medico" required
                                        placeholder="Apellido Paterno">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="amaterno_medico"><b>Apellido Materno</b></label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">@</span>
                                    <input type="text" class="form-control" id="amaterno_medico" required
                                        placeholder="Apellido Materno">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="correo_medico"><b>Correo</b></label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">@</span>
                                    <input type="text" class="form-control" id="correo_medico" placeholder="Correo">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="domicilio_medico"><b>Domicilio</b></label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">@</span>
                                    <input type="text" class="form-control" id="domicilio_medico"
                                        placeholder="Domicilio">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="telefono_medico"><b>Telefono</b></label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">@</span>
                                    <input type="text" class="form-control" id="telefono_medico" placeholder="Telefono">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="especialidad_medico"><b>Especialidad</b></label>
                                <div class="input-group-prepend">
                                    <select id="especialidad_medico" required class="form-control">
                                        <option value="0">Seleciona una especialidad</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="rfc_medico"><b>RFC</b></label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">@</span>
                                    <input type="text" class="form-control" id="rfc_medico"
                                        placeholder="Escriba la nueva contraseña">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cedula_medico"><b>Cedula</b></label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">@</span>
                                    <input type="text" class="form-control" required id="cedula_medico"
                                        placeholder="Cedula">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">CERRAR</button>
                <button type="button" class="btn btn-success" onclick="actulizarMedico();">GUARDAR</button>
            </div>
        </div>
    </div>
</div>

<!-- Datos Medico -->
<div class="modal fade" id="modalInfoMedico" tabindex="-1" role="dialog" aria-labelledby="modalInfoMedicoLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalInfoMedicoLabel">Imformación del Medico</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modalInfo"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">CERRAR</button>
            </div>
        </div>
    </div>
</div>

<!--  -->

<script src="view/js/medico.js"></script>