<div class="page-header flex-wrap">
    <div class="header-left">
        <h4>Lista de Servicios</h4>
    </div>
    <div class="header-right d-flex flex-wrap mt-2 mt-sm-0">
        <button type="button" class="btn btn-primary mt-2 mt-sm-0 btn-icon-text" data-toggle="modal" data-target="#modalAgregarServicios">
            <i class="mdi mdi-plus-circle"></i> Agregar Servicios </button>
    </div>
</div>

<!-- Tabla de Servicios-->

<div class="col-lg-12 p-0 mb-3 ">
    <div class="table-responsive">
        <table id="example" class="table table-striped mt-3">
            <thead>
                <tr>
                    <th><i class="mdi mdi-cogs"></i></th>
                    <th><i class="mdi mdi-cogs"></i></th>
                    <th>Descripción</th>
                    <th>Costo</th>
                    <th>Estatus</th>
                    <th>Acciones</th>
                </tr>
            </thead>
        </table>
    </div>
</div>


<!-- Modal Agregar Servicios -->
<div class="modal fade" id="modalAgregarServicios" tabindex="-1" role="dialog" aria-labelledby="modalAgregarServiciosLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAgregarServiciosLabel">Agregar Servicios</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Nombre  -->
                <form class="form-sample">
                    <p class="card-description">Completa los campos correctamente</p>
                    <div class="row">
                        <!-- Nombre  -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="txt_nombre_servicio"><b>Nombre</b></label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">@</span>
                                    <input type="text" class="form-control" id="txt_nombre_servicio" placeholder="Nombre">
                                </div>
                            </div>
                        </div>
                        <!-- COSTO -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="txt_monto_servicio"><b>Monto </b></label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">@</span>
                                    <input type="number" class="form-control" id="txt_monto_servicio" placeholder="servicio">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">CERRAR</button>
                <button type="button" class="btn btn-success" onclick="crearServicios();">GUARDAR</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal Actualizar servicios -->
<div class="modal fade" id="modalUpdateServicios" tabindex="-1" role="dialog" aria-labelledby="modalUpdateServiciosLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalUpdateServiciosLabel">Agregar Servicios</h5>
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
                                <label for="nombre_servicio"><b>Nombre</b></label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">@</span>
                                    <input type="hidden" id="id_servicio">
                                    <input type="text" class="form-control" id="nombre_servicio" placeholder="Nombre">
                                </div>
                            </div>
                        </div>
                        <!-- COSTO -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="txt_monto_servicio_u"><b>Monto </b></label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">@</span>
                                    <input type="number" step="any" class="form-control" id="txt_monto_servicio_u" placeholder="servicio">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">CERRAR</button>
                <button type="button" class="btn btn-success" onclick="actulizarServicios();">GUARDAR</button>
            </div>
        </div>
    </div>
</div>






<script src="view/js/servicios.js"></script>