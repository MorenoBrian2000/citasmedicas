<div class="page-header flex-wrap">
    <div class="header-left">
        <button class="btn btn-primary mb-2 mb-md-0 mr-2"> Reporte Pagos </button>
        <!-- <button class="btn btn-outline-primary bg-white mb-2 mb-md-0"> Impora </button> -->
    </div>
    <div class="header-right d-flex flex-wrap mt-2 mt-sm-0">
        <div class="d-flex align-items-center">
            <a href="#">
                <p class="m-0 pr-3">Pagos</p>
            </a>
            <a class="pl-3 mr-4" href="#">
                <p class="m-0">Listar Pagos</p>
            </a>
        </div>
        <a type="button" class="btn btn-primary mt-2 mt-sm-0 btn-icon-text" href="pago-cita">
            <i class="mdi mdi-plus-circle"></i> Agregar Pagos </a>
    </div>
</div>


<!-- Tabla de Medico-->
<div class="col-lg-12 p-0 mb-3 ">
    <table id="tablePagosAll" class="table table-striped mt-3" width="100%"></table>
</div>

<!-- Modal Agregar Datalles Pagos -->
<div class="modal fade" id="modalDetallePago" tabindex="-1" role="dialog" aria-labelledby="modalDetallePagoLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalDetallePagoLabel">Agregar Abono</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ">
                <div class="row p-3">
                    <div class="form-group col-md-4">
                        <label for="id_paciente"><b>Nombre Paciente</b></label>
                        <div class="input-group-prepend ">
                            <span class="input-group-text"><i class="fa fa-hospital-user" aria-hidden="true"></i></span>
                            <input type="text" id="folio_cita" disabled class="form-control">

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
                <div class="row">
                    <div class="col-12 pl-4 pr-4">
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
                                    <td><a onclick="nuevaFila();" style="cursor:pointer;color:blue;text-decoration:underline;">Agregar Serivcio / Paquete</a></td>
                                </tr>
                            </tfoot>
                        </table>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <!-- <button type="button" class="btn btn-primary" onclick="crearPagos();">Save changes</button> -->
            </div>
        </div>
    </div>
</div>

<!-- Modal Editar Pagos -->
<div class="modal fade show" id="modalInfoPago" tabindex="-1" role="dialog" aria-labelledby="modalInfoPagoLabel" aria-modal="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalInfoPagoLabel">Imformación del Pago</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body" id="modalInfo"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">CERRAR</button>
            </div>
        </div>
    </div>
</div>



<script src="view/js/pagos.js"></script>