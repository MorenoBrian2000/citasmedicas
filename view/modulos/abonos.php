<div class="page-header flex-wrap">
    <div class="header-left">
        <h4>Pago Abono Paciente</h4>
        <input type="hidden" id="folio_pago" value="<?php echo $_GET['folio']; ?>">
        <input type="hidden" id="id_pago" value="<?php echo $_GET['id']; ?>">
    </div>

    <button type="button" class="btn btn-primary mt-2 mt-sm-0 btn-icon-text" data-toggle="modal" data-target="#modalAgregarPago">
        <i class="mdi mdi-plus-circle"></i> Agrgear Abono</button>
</div>

<!-- Tabla de Paciente-->
<div class="row mt-5">
    <div class="col-md-7 col-sm-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Tabla Pago Abono Paciente </h4>

                <div class="col-lg-12 p-0 mb-3 ">
                    <table id="example" class="table dt-responsive nowrap" width="100%"></table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-5 col-sm-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <div class="row col-sm-12 ">

                    <div class="col-12 mt-3">
                        <h5>Detalles de pago</h5>
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th style="width:50%">Pago Total:</th>
                                        <td>
                                            <p id="costoTotal"></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th style="width:50%">Pago acumulado:</th>
                                        <td>
                                            <p id="totalPago"></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Saldo Restante:</th>
                                        <td>
                                            <p id="saldoRestante"></p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ifno cita -->
<!-- Datos Cita -->
<div class="modal fade" id="modalAgregarPago" tabindex="-1" role="dialog" aria-labelledby="modalAgregarPagoLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAgregarPagoLabel">Agregar Pago</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group col-md-12">
                    <label for=""><b>Folio</b></label>
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-box" aria-hidden="true"></i></span>
                        <input type="text" id="folio_pago" value="<?php echo $_GET['folio']; ?>" disabled class="form-control">
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <label for=""><b>Monto Pago</b></label>
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-dolar" aria-hidden="true"></i></span>
                        <input type="text" id="monto-pago" class="form-control">
                    </div>
                </div>
                <div class="form-group col-12">
                    <label for="lst_tipo_pago"><b>Tipo </b></label>
                    <select name="" id="lst_tipo_pago" style="color: black;" class="form-control">
                        <option value="EFECTIVO">EFECTIVO</option>
                        <option value="TRANSFERENCiA">TRANSFERENCiA</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">CERRAR</button>
                <button type="button" class="btn btn-primary" onclick="agrgearPago();" data-dismiss="modal">GUARDAR</button>
            </div>
        </div>
    </div>
</div>


<script src="view/js/abonos.js"></script>