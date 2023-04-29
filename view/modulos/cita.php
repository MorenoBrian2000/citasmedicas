<div class="page-header flex-wrap">
    <div class="header-left">
        <h4>Formulario de Citas</h4>
    </div>
    <a class='badge badge-primary badge-sm' href='citas'><i class='mdi mdi-arrow-left '></i> Regresar</a>

</div>

<div class="col-12 grid-margin">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Completa todos los campos </h4>
            <form class="form-sample">
                <p class="card-description">Completa correctamente los campos de cita</p>
                <!-- 1 -->
                <div class="row">

                    <input type="hidden" id="id_cita" value="<?php echo $_GET['id']; ?>" name="id_cita">

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
                                <select class="form-control" disabled id="estado_pago" style="color:black">
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

        <button type="button" class="btn btn-primary mr-2 " onclick="actulizarCitas();"> <i class="fa fa-floppy-o" aria-hidden="true"></i> ACTUALIZAR CITA </button>
        </form>
    </div>
</div>
</div>
<script src="view/js/buscadores.js"></script>
<script src="view/js/update-cita.js"></script>    