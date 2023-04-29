<script src="view/assets/vendors/fullcalendar/fullcalendar.js"></script>

<!-- Container -->
<div class="page-header flex-wrap">
    <div class="header-left">
        <h4>Calendario - Todas las Cias</h4>
        <input type="hidden" id="id_medico" value="<?php echo $_GET['id']; ?>">
    </div>
</div>
<!-- filtro -->
<div class="row">

    <div class="col-12">
        <!-- <h4 class="card-title">Calendario de Citas </h4> -->
        <div id='calendar'></div>
    </div>

</div>



<!-- Datos Cita -->
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


<!-- CITAS -->
<!-- Modal Agregar Citas -->
<div class="modal fade" id="modalAgregarCitas" tabindex="-1" role="dialog" aria-labelledby="modalAgregarCitasLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
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
                    <p class="card-description">Completa los campos correctamente</p>
                    <div class="row">
                        <!-- Paciente-->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="id_paciente"><b>Nombre Paciente</b></label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">@</span>
                                    <input id="paciente" class="txtPaciente form-control" autocomplete="off" placeholder="Elige la Linea...">
                                    <input type="hidden" id="id_paciente" name="id_paciente">
                                </div>
                                <div id="contenedorPaciente" class="capa contenedorPaciente" style="display:none;"></div>
                            </div>
                        </div>
                        <!-- Doctor-->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="id_medico"><b>Nombre Medico</b></label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">@</span>
                                    <input id="medico" class="txtMedico form-control" autocomplete="off" placeholder="Elige la Linea...">
                                    <input type="hidden" id="id_medico" name="id_medico">
                                </div>
                                <div id="contenedorMedico" class="capa contenedorMedico" style="display:none;"></div>
                            </div>
                        </div>
                        <!-- FECHA  -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="fechaProgramada_cita"><b>Fecha Cita</b></label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">@</span>
                                    <input type="date" class="form-control" disabled id="fechaProgramada_cita">
                                </div>
                            </div>
                        </div>
                        <!-- FECHA  -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="horaInicio_cita"><b>Hora Inicio</b></label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">@</span>
                                    <input type="time" class="form-control" id="horaInicio_cita">
                                </div>
                            </div>
                        </div>
                        <!-- FECHA  -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="horaFin_cita"><b>Hora Fin</b></label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">@</span>
                                    <input type="time" class="form-control" id="horaFin_cita">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="crearCitas();">Guardar Cambios</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Actualizar Citas -->
<div class="modal fade" id="modalUpdateCitas" tabindex="-1" role="dialog" aria-labelledby="modalUpdateCitasLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalUpdateCitasLabel">Agregar Citas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Nombre  -->
                <form class="form-sample">
                    <p class="card-description">Completa los campos correctamente</p>
                    <div class="row">
                        <!-- Paciente-->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="id_paciente"><b>Nombre Paciente</b></label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">@</span>
                                    <input id="txtPacienteU" class="txtPaciente  form-control" disabled autocomplete="off" placeholder="Elige la Linea...">
                                    <input type="hidden" id="id_pacienteU" name="id_pacienteU">
                                    <input type="hidden" id="id_cita" name="id_cita">
                                </div>
                                <div id="contenedorPaciente" class="capa contenedorPaciente" style="display:none;"></div>
                            </div>
                        </div>
                        <!-- Doctor-->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="id_medico"><b>Nombre Medico</b></label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">@</span>
                                    <input id="txtMedicoU" class="txtMedico form-control" disabled autocomplete="off" placeholder="Elige la Linea...">
                                    <input type="hidden" id="id_medicoU" name="id_medicoU">
                                </div>
                                <div id="contenedorMedico" class="capa contenedorMedico" style="display:none;"></div>
                            </div>
                        </div>
                        <!-- FECHA  -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="fechaProgramada_cita"><b>Fecha Cita</b></label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">@</span>
                                    <input type="date" class="form-control" id="fechaProgramada_citaU">
                                </div>
                            </div>
                        </div>
                        <!-- FECHA  -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="horaInicio_cita"><b>Hora Inicio</b></label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">@</span>
                                    <input type="time" class="form-control" id="horaInicio_citaU">
                                </div>
                            </div>
                        </div>
                        <!-- FECHA  -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="horaFin_cita"><b>Hora Fin</b></label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">@</span>
                                    <input type="time" class="form-control" id="horaFin_citaU">
                                </div>
                            </div>
                        </div>
                </form>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-primary" onclick="actulizarCitas();">Guardar Cambios</button>
        </div>
    </div>
</div>

<script src="view/js/calendar.js"></script>

<script src="view/js/buscadores.js"></script>