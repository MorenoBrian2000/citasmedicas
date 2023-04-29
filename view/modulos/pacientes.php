<div class="page-header flex-wrap">
    <div class="header-left">
        <h4 class="card-title">Lista de Pacientes </h4>
    </div>
    <div class="header-right d-flex flex-wrap mt-2 mt-sm-0">
        <button type="button" class="btn btn-primary mt-2 mt-sm-0 btn-icon-text" data-toggle="modal"
            data-target="#modalAgregarPacientes">
            <i class="mdi mdi-plus-circle"></i> Agregar Pacientes </button>
    </div>
</div>

<!-- Tabla de Pacientes-->

<div class="col-lg-12 p-0 mb-3 ">
    <div class="table-responsive">
        <table id="example" class="table table-striped mt-3">
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



<!-- Modal Agregar Pacientes -->
<div class="modal fade" id="modalAgregarPacientes" tabindex="-1" role="dialog"
    aria-labelledby="modalAgregarPacientesLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAgregarPacientesLabel">Agregar Pacientes</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form class="form-sample">
                    <p class="card-description">Completa las campos correctamente</p>
                    <div class="row">
                        <!-- Nombre  -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nombre_paciente"><b>Nombre</b></label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">@</span>
                                    <input type="text" class="form-control" id="txt_nombre_paciente"
                                        placeholder="Nombre">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="apaterno_paciente"><b>Apellido Paterno</b></label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">@</span>
                                    <input type="text" class="form-control" id="txt_apaterno_paciente"
                                        placeholder="Apellido Paterno">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="amaterno_paciente"><b>Apellido Materno</b></label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">@</span>
                                    <input type="text" class="form-control" id="txt_amaterno_paciente"
                                        placeholder="Apellido Materno">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="correo_paciente"><b>Correo</b></label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">@</span>
                                    <input type="text" class="form-control" id="txt_correo_paciente"
                                        placeholder="Correo">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="domicilio_paciente"><b>Domicilio</b></label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">@</span>
                                    <input type="text" class="form-control" id="txt_domicilio_paciente"
                                        placeholder="Domicilio">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="telefono_paciente"><b>Telefono</b></label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">@</span>
                                    <input type="text" class="form-control" id="txt_telefono_paciente"
                                        placeholder="Telefono">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="rfc_paciente"><b>RFC</b></label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">@</span>
                                    <input type="text" class="form-control" id="txt_rfc_paciente"
                                        placeholder="Escriba la nueva contraseña">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="alergias_paciente"><b>Alergias Paciente</b></label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">@</span>
                                    <textarea class="form-control" id="txt_alergias_paciente" rows="2"></textarea>
                                </div>
                            </div>
                        </div>

                    </div>

                </form>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">CERRAR</button>
                <button type="button" class="btn btn-success" onclick="crearPacientes();">GUARDAR</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal Actualizar Pacientes -->
<div class="modal fade" id="modalUpdatePacientes" tabindex="-1" role="dialog"
    aria-labelledby="modalUpdatePacientesLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalUpdatePacientesLabel">Agregar Pacientes</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-sample">
                    <p class="card-description">Completa los campos correctamente</p>
                    <div class="row">
                        <!-- Nombre  -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nombre_paciente"><b>Nombre</b></label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">@</span>
                                    <input type="hidden" id="id_paciente">
                                    <input type="text" class="form-control" id="nombre_paciente" placeholder="Nombre">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="apaterno_paciente"><b>Apellido Paterno</b></label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">@</span>
                                    <input type="text" class="form-control" id="apaterno_paciente"
                                        placeholder="Apellido Paterno">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="amaterno_paciente"><b>Apellido Materno</b></label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">@</span>
                                    <input type="text" class="form-control" id="amaterno_paciente"
                                        placeholder="Apellido Materno">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="correo_paciente"><b>Correo</b></label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">@</span>
                                    <input type="text" class="form-control" id="correo_paciente" placeholder="Correo">
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="domicilio_paciente"><b>Domicilio</b></label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">@</span>
                                    <input type="text" class="form-control" id="domicilio_paciente"
                                        placeholder="Domicilio">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="telefono_paciente"><b>Telefono</b></label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">@</span>
                                    <input type="text" class="form-control" id="telefono_paciente"
                                        placeholder="Telefono">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="rfc_paciente"><b>RFC</b></label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">@</span>
                                    <input type="text" class="form-control" id="rfc_paciente"
                                        placeholder="Escriba la nueva contraseña">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="alergias_paciente"><b>Alergias Paciente</b></label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">@</span>
                                    <input class="form-control" id="alergias_paciente" rows="4"></input>
                                </div>
                            </div>
                        </div>

                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">CERRAR</button>
                <button type="button" class="btn btn-success" onclick="actulizarPacientes();">GUARDAR</button>
            </div>
        </div>
    </div>
</div>


<!-- Datos Paciente -->
<div class="modal fade" id="modalInfoPaciente" tabindex="-1" role="dialog" aria-labelledby="modalInfoPacienteLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalInfoPacienteLabel">Imformación del Paciente</h5>
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

<script src="view/js/pacientes.js"></script>