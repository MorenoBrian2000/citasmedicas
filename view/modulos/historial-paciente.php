<div class="page-header flex-wrap">
    <div class="header-left">
        <h4>Historial Paciente</h4>
        <input type="hidden" id="id_paciente" value="<?php echo $_GET['id']; ?>">
    </div>
    <a class='badge badge-primary badge-sm' href='pacientes'><i class='mdi mdi-arrow-left '></i> Regresar</a>
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

<!-- Tabla de Paciente-->
<div class="row">
    <div class="col-md-8 col-sm-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Tabla historial Paciente / Cita</h4>

                <div class="col-lg-12 p-0 mb-3 ">
                    <table id="example" class="table dt-responsive nowrap" width="100%"></table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Datos del Paciente</h4>
                <div class="col-lg-12 p-0 mb-3 ">
                    <div id="targetInfo"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ifno cita -->


<script src="view/js/historial-paciente.js"></script>