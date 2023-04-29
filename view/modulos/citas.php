<div class="page-header flex-wrap">
    <div class="header-left">
        <h4>Lista de Citas</h4>
    </div>
    <div class="header-right d-flex flex-wrap mt-2 mt-sm-0">
        <button type="button" class="btn btn-primary mt-2 mt-sm-0 btn-icon-text" data-toggle="modal" data-target="#modalAgregarCitas">
            <i class="mdi mdi-plus-circle"></i> Agregar Cita </button>
        <button type="button" class="btn btn-primary mt-2 mt-sm-0 ml-2 btn-icon-text" data-toggle="modal" data-target="#modalAgregarCitas">
            <i class="fa fa-refresh"></i> Actualizar Citas </button>

    </div>

</div>

<!-- Tabla de Paquetes-->
<div class="col-lg-12 p-0 mb-3 ">
    <div class="table-responsive">
        <table id="table-citas" class="table table-striped mt-3">
            <thead>
                <tr>
                    <th><i class="mdi mdi-cogs"></i></th>
                    <th><i class="mdi mdi-cogs"></i></th>
                    <th>Paciente</th>
                    <th>Asunto</th>
                    <th>Estado</th>
                    <th>Fecha</th>
                    <th>Acciones</th>
                </tr>
            </thead>
        </table>
    </div>
</div>



<!--  -->

<!-- UPDATE STATUS CITA -->
<div class="modal fade" id="modalUpdateStatus" tabindex="-1" role="dialog" aria-labelledby="modalUpdateStatusLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalUpdateStatusLabel">Agregar Citas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Nombre  -->

                <form class="form-sample">

                    <input type="hidden" class="form-control" id="id_update_cita">
                    <!-- Estado de Cita -->
                    <div class="form-group">
                        <label for="estado_cita"><b>Estado de la cita</b></label>
                        <select class="form-control" id="id_estado_cita" style="color:black">
                            <option value="0">Seleciona un opcion</option>
                            <option value="1">Pendiente</option>
                            <option value="2">Aplicada</option>
                            <option value="3">No Asistio</option>
                            <option value="4">Cancelada</option>
                        </select>
                    </div>
                    <!-- Estado de pago -->
                    <div class="form-group">
                        <label for="estado_pago"><b>Estado del pago</b></label>
                        <select class="form-control" id="id_estado_pago" disabled style="color:black">
                            <option value="0">Seleciona un opcion</option>
                            <option value="1">Pendiente</option>
                            <option value="2">Pagado</option>
                            <option value="3">Anulado</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">CERRAR</button>
                <button type="button" class="btn btn-primary" id="updateStatusCita">GUARDAR</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Agregar Citas -->
<div class="modal fade" id="modalAgregarCitas" tabindex="-1" role="dialog" aria-labelledby="modalAgregarCitasLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAgregarCitasLabel">Agregar Citas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Nombre  -->

                <form class="form-sample">
                    <div class="row p-3">
                        <!-- Paciente-->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="txt_asunto"><b>Asunto</b></label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-tags" aria-hidden="true"></i></span>
                                    <input id="asunto" class="form-control" placeholder="Ingresa el asunto">
                                </div>
                            </div>
                        </div>
                        <!-- Paciente-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="id_paciente"><b>Nombre Paciente</b></label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-hospital-user" aria-hidden="true"></i></span>
                                    <input id="paciente" class="txtPaciente form-control" autocomplete="off" placeholder="Seleciona una opcion...">
                                    <input type="hidden" id="id_paciente" name="id_paciente">
                                </div>
                                <div id="contenedorPaciente" class="capa contenedorPaciente" style="display:none;"></div>
                            </div>
                        </div>
                        <!-- Doctor-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="id_medico"><b>Nombre Medico</b></label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-user-nurse" aria-hidden="true"></i></span>
                                    <input id="medico" class="txtMedico form-control" autocomplete="off" placeholder="Seleciona una opcion...">
                                    <input type="hidden" id="id_medico" name="id_medico">
                                </div>
                                <div id="contenedorMedico" class="capa contenedorMedico" style="display:none;"></div>
                            </div>
                        </div>
                        <!-- FECHA  -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="fechaProgramada_cita"><b>Fecha Cita</b></label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                                    <input type="date" class="form-control" id="fechaProgramada_cita">
                                </div>
                            </div>
                        </div>
                        <!-- FECHA  -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="horaInicio_cita"><b>Hora Inicio</b></label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-clock" aria-hidden="true"></i></span>
                                    <input type="time" class="form-control" id="horaInicio_cita">
                                </div>
                            </div>
                        </div>
                        <!-- FECHA  -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="horaFin_cita"><b>Hora Fin</b></label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-clock" aria-hidden="true"></i></span>
                                    <input type="time" class="form-control" id="horaFin_cita">
                                </div>
                            </div>
                        </div>

                        <!-- Nota-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nota"><b>Nota</b></label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-file-medical-alt" aria-hidden="true"></i></span>
                                    <input id="nota" class="form-control" placeholder="Ingresa una nota">
                                </div>
                            </div>
                        </div>
                        <!-- Enfermedad-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="emfermedad"><b>Enfermedad</b></label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-hand-holding-medical" aria-hidden="true"></i></span>
                                    <input id="emfermedad" class="form-control" placeholder="Ingresa alguna emfermedad">
                                </div>
                            </div>
                        </div>
                        <!-- Sintomas-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="sintomas"><b>Sintomas</b></label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-stethoscope" aria-hidden="true"></i></span>
                                    <input id="sintomas" class="form-control" placeholder="Ingresa los sintomas">
                                </div>
                            </div>
                        </div>
                        <!-- Medicamentos-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="medicamentos"><b>Medicamentos</b></label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-tablets" aria-hidden="true"></i></span>
                                    <input id="medicamentos" class="form-control" placeholder="Ingresa los medicamentos">
                                </div>
                            </div>
                        </div>
                        <!-- Estado de Cita -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="estado_cita"><b>Estado de la cita</b></label>
                                <select class="form-control" id="estado_cita" style="color:black">
                                    <option value="0">Seleciona un opcion</option>
                                    <option value="1">Pendiente</option>
                                    <option value="2">Aplicada</option>
                                    <option value="3">No Asistio</option>
                                    <option value="4">Cancelada</option>
                                </select>
                            </div>
                        </div>
                        <!-- Estado de pago -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="estado_pago"><b>Estado del pago</b></label>
                                <select class="form-control" id="estado_pago" style="color:black">
                                    <option value="0">Seleciona un opcion</option>
                                    <option value="1">Pendiente</option>
                                    <option value="2">Pagado</option>
                                    <option value="3">Anulado</option>
                                </select>
                            </div>
                        </div>
                        <!--  -->
                        <!-- Costo -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="costo"><b> $ Costo </b></label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-dollar-sign" aria-hidden="true"></i></span>
                                    <input id="costo" class="form-control" type="number">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">CERRAR</button>
                <button type="button" class="btn btn-primary" onclick="crearCitas();">GUARDAR</button>
            </div>
        </div>
    </div>
</div>



<!-- Datos Paciente -->
<div class="modal fade" id="modalInfoCita" tabindex="-1" role="dialog" aria-labelledby="modalInfoCitaLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalInfoCitaLabel">Imformacion de la Cita</h5>
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

<!-- Modal Agregar Citas -->
<div class="modal fade" id="modal-mensaje" tabindex="-1" role="dialog" aria-labelledby="modal-mensajeLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-mensajeLabel">Enviar SMS</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Nombre  -->

                <form class="form-sample">
                    <div class="row p-3">
                        <!-- Paciente-->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="txt_mensaje"><b>Mensaje </b></label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-tags" aria-hidden="true"></i></span>
                                    <input id="txt_mensaje" class="form-control" placeholder="Ingresa el asunto">
                                </div>
                            </div>
                        </div>
                        <!-- Telefono -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="txt_numtelefono"><b>Numero de Telefono</b></label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-tags" aria-hidden="true"></i></span>
                                    <input id="txt_numtelefono" class="form-control" placeholder="Ingresa el asunto">
                                </div>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">CERRAR</button>
                <button type="button" class="btn btn-primary" onclick="sendSMS();">GUARDAR</button>
            </div>
        </div>
    </div>
</div>


<script src="view/js/buscadores.js"></script>
<script src="view/js/citas.js"></script>