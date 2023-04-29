<div class="page-header flex-wrap">
    <div class="header-left">
        <h4 class="card-title">Generar Pago Cita</h4>
    </div>
    <div class="header-right d-flex flex-wrap mt-2 mt-sm-0">
        <a class='badge badge-primary badge-sm' href='pagos'><i class='mdi mdi-arrow-left '></i> Regresar</a>
    </div>
</div>

<div class="col-12 grid-margin stretch-card">

    <div class="card">

        <div class="card-body">
            <div class="row">
                <!-- FOLIO CITA -->

                <div class="col-md-12 row">
                    <div class="form-group col-md-4">
                        <label for=""><b>Ingrese el folio de cita</b></label>
                        <div class="input-group-prepend ">
                            <select class="form-control" onchange="getFolioCita();" id="selectCitas1">
                                <option value="0">Selecciona un valor </option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="id_paciente"><b>Nombre Paciente</b></label>
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-hospital-user" aria-hidden="true"></i></span>
                            <input type="text" id="nombre_paciente" disabled class="form-control">
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="id_paciente"><b>Nombre medico</b></label>
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-user-nurse" aria-hidden="true"></i></span>
                            <input type="text" id="nombre_medico" disabled class="form-control">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-4">
                    <label for="fechaProgramada_cita"><b>Fecha Cita</b></label>
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                        <input type="text" id="fechaProgramada_cita" disabled class="form-control">
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <label for="horaInicio_cita"><b>Hora Inicio</b></label>
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-clock" aria-hidden="true"></i></span>
                        <input type="text" id="horaInicio_cita" disabled class="form-control">
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <label for="horaFin_cita"><b>Hora Fin</b></label>
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-clock" aria-hidden="true"></i></span>
                        <input type="text" id="horaFin_cita" disabled class="form-control">
                    </div>
                </div>
            </div>
            <!--  -->
            <div class="row">

                <div class="tablaServicios col-md-12">
                    <table class="table dt-responsive table-bordered table-striped nowrap" id="tabla-pago">
                        <thead>
                            <tr>
                                <th style="width: 5%;"><b> #</b></th>
                                <th style="width: 15%;"><b> Tipo</b></th>
                                <th style="width: 25%;"><b> Nombre</b></th>
                                <th style="width: 15%;"><b> Costo</b></th>
                                <th style="width: 15%;"><b> IVA </b></th>
                                <th style="width: 15%;"><b> Subtotal</b></th>
                            </tr>
                        </thead>
                        <tbody id="datosPago"></tbody>
                        <tfoot>
                            <tr>
                                <td></td>
                                <td><a style="cursor:pointer;color:blue;text-decoration:underline;" onclick="nuevaFila();">Agregar Serivcio / Paquete</a></td>
                            </tr>
                        </tfoot>
                    </table>

                </div>
            </div>
            <div class="row">
                <div class="row col-md-6 col-sm-12 ">
                    <div class="form-group col-12" style="display: none;">
                        <br>

                        <label for="cantidad_abono"><b>Cantidad de Abono</b></label>
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-dollar" aria-hidden="true"></i></span>
                            <input type="text" id="txt_cantidad_abono" value="0" class="form-control">
                        </div>
                    </div>
                    <div class="form-group col-12">
                        <label for="lst_tipo_pago"><b>Tipo de pago</b></label>

                        <select name="" id="lst_tipo_pago" style="color: black;" class="form-control">
                            <option value="EFECTIVO">EFECTIVO</option>
                            <option value="TRANSFERENCiA">TRANSFERENCiA</option>
                        </select>
                    </div>
                    <div class="form-group col-12">
                        <label for="horaFin_cita"><b>Notas</b></label>
                        <textarea class="form-control" name="" id="txt_notas" cols="30" rows="5"></textarea>
                        <input id="txt_costoTotal" type="hidden"></input>
                        <input id="txt_costoIva" type="hidden"></input>
                        <input id="txt_costoSubtotal" type="hidden"></input>
                    </div>
                </div>
                <!-- /.col -->

                <div class="row col-md-6 col-sm-12 ">

                    <div class="col-12 mt-3">
                        <?php $hoy = getdate(); ?>
                        <h5>Monto Total <?php echo $hoy['mday'] . '/' . $hoy['mon'] . '/' . $hoy['year']  ?></h5>
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th style="width:50%">Subtotal:</th>
                                        <td>
                                            <p id="costoTotal"></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Iva (16%)</th>
                                        <td>
                                            <p id="costoIva"></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Total:</th>
                                        <td>
                                            <p id="costoSubtotal"></p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-md-6 mt-3">
                        <button type="button" class="btn btn-danger btn-block btn-lg " data-dismiss="modal">Cancelar</button> <br>
                    </div>
                    <div class="col-md-6 mt-3">
                        <button type="button" class="btn btn-primary btn-block btn-lg  " onclick="generarPagoCita();">Guardar </button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


<script src="view/js/pago-cita.js"></script>