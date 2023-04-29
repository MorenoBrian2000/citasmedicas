<!-- load the CSS files in the right order -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.4/css/fileinput.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.4/themes/explorer-fa/theme.min.css">

<!-- load the JS files in the right order -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.4/js/fileinput.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.4/themes/explorer-fa/theme.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.4/js/locales/es.min.js"></script>


<!-- Container -->
<div class="page-header flex-wrap">
    <div class="header-left">
        <h4>Documentos Paciente</h4>
        <input type="hidden" id="id_paciente" value="<?php echo $_GET['id']; ?>">
    </div>
    <a class='badge badge-primary badge-sm' href='pacientes'><i class='mdi mdi-arrow-left '></i> Regresar</a>

</div>


<!-- Tabla de Medico-->
<div class="row">
    <div class="col-md-12 col-sm-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <div class="col-lg-12 p-0 mb-3 ">

                    <div class="file-loading">
                        <input id="input-ke-1" name="input-ke-1[]" type="file" multiple accept="image">
                    </div>
                    <small class="form-text text-muted">Seleccionar jpg, png, pdf .</small>

                </div>
            </div>
        </div>
    </div>

</div>



<script src="view/js/documentos-paciente.js"></script>