<?php setlocale(LC_ALL, 'es_ES'); ?>


<div class="content-wrapper">
  <div class="page-header">
    <h3 class="page-title"> Invoice </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Sample pages</a></li>
        <li class="breadcrumb-item active" aria-current="page">Invoice</li>
      </ol>
    </nav>
  </div>
  <input type="hidden" id="folio_pago" value="<?PHP echo $_GET['folio_pago']; ?>">
  <div class="row" id="factura-print">
    <div class="col-lg-12">
      <div class="card px-2">
        <div class="card-body">
          <div class="container-fluid">
            <h3 class="text-right my-5">Invoice&nbsp;&nbsp;#<?PHP echo $_GET['folio_pago']; ?></h3>
            <hr>
          </div>
          <div class="container-fluid d-flex justify-content-between">
            <div class="col-lg-3 pl-0">
              <p class="mt-5 mb-2"><b>Sistema de Administración Clínica</b></p>
              <p>And. Ceres # 127 | CP.37240 ,<br> Col. Popular Anaya,<br>León, Gto.</p>
            </div>
            <div class="col-lg-3 pr-0">
              <p class="mt-5 mb-2 text-right"><b>Invoice to</b></p>
              <p class="text-right" id="data-paciente"></p>
            </div>
          </div>
          <div class="container-fluid d-flex justify-content-between">
            <div class="col-lg-5 pl-0">
              <p class="mb-0 mt-5">Fecha de factura: : <?PHP echo strftime("Hoy es %A día %d de %B"); ?></p>
            </div>
          </div>
          <div class="container-fluid mt-5 d-flex justify-content-center w-100">
            <div class="table-responsive w-100">
              <table class="table">
                <thead>
                  <tr class="bg-dark text-white">
                    <th>#</th>
                    <th>Descripción</th>
                    <th class="text-right">IVA (16%)</th>
                    <th class="text-right">Cantidad Abonada</th>
                    <th class="text-right">Subtotal</th>
                  </tr>
                </thead>
                <tbody id="datelle-pago"></tbody>
              </table>
            </div>
          </div>
          <div class="container-fluid mt-5 w-100">
            <p class="text-right mb-2" id="sub_total"></p>
            <p class="text-right" id="iva_total"></p>
            <h4 class="text-right mb-5" id="monto_total"></h4>
            <hr>
          </div>
          <div class="container-fluid w-100">
            <a href="#" class="btn btn-primary float-right mt-4 ml-2" onclick="printDiv('factura-print')"><i class="mdi mdi-printerer mr-1"></i>Print</a>
            <a href="#" class="btn btn-success float-right mt-4" onclick="enviarCorreo();"><i class="mdi mdi-telegram mr-1"></i>Send Invoice</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="view/js/factura.js"></script>