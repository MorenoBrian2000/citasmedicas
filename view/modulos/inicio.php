<div class="main-panel">
    <div class="content-wrapper pb-0">
        <div class="page-header flex-wrap">
            <div class="header-left d-flex">
                <h5 class="m-0 pr-3">Inicio</h5>
            </div>
            <div class="header-right d-flex flex-wrap mt-2 mt-sm-0 align-items-center">
                <h5 class="font-weight-normal"><?php echo date("F j, Y, g:i a");   ?></h5>
                <form class="search-form d-none d-md-block mb-2 ml-2" action="#">
                    <i class="mdi mdi-magnify"></i>
                    <input type="search" class="form-control" placeholder="Search Here" title="Search here">
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-8 stretch-card grid-margin">
                <div class="title-banner">
                    <div class="d-lg-flex justify-content-between">
                        <div class="mr-4">
                            <h3>GR Clínica Dental</h3>
                            <p class="m-0">Sistema de Administración Clínica</p>
                        </div>
                        <img src="view/assets/images/dashboard/hospital/banner-thumb.png" alt="">
                    </div>
                </div>
            </div>
            <div class="col-xl-4 stretch-card grid-margin">
                <div class="card">
                    <div class="time-banner">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="text-center border-right pr-3">
                                <i class="mdi mdi-clock-outline"></i>
                                <h6 class="m-0 font-weight-normal">Open Hours</h6>
                            </div>
                            <div class="pl-3">
                                <p class="m-0">Monday-Saturday: 10.00 - 24.00</p>
                                <p class="m-0">Sunday: 12.00 - 18.00</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-2 col-sm-4 stretch-card grid-margin">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center hospital-features">
                            <div class="badge btn-facebook">3 New</div>
                            <!-- <i class="mdi mdi-stethoscope icon-md text-danger"></i> -->
                            <img src="view/assets/images/icons/doctor.svg" class="mr-2 mb-1 iconMenu" width="45" alt="">

                            <h5 class="font-weight-normal">Medicos</h5>
                            <h5 id="count_medico"></h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-sm-4 stretch-card grid-margin">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center hospital-features">
                            <div class="badge btn-facebook">1 New</div>
                            <!-- <i class="mdi mdi-stethoscope icon-md text-danger"></i> -->
                            <img src="view/assets/images/icons/pacient.svg" class="mr-2 mb-1 iconMenu" width="45" alt="">

                            <h5 class="font-weight-normal">Pacientes</h5>
                            <h5 id="count_medico"></h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-sm-4 stretch-card grid-margin">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center hospital-features">
                            <div class="badge btn-facebook">3 New</div>
                            <!-- <i class="mdi mdi-stethoscope icon-md text-danger"></i> -->
                            <img src="view/assets/images/icons/serive2.svg" class="mr-2 mb-1 iconMenu" width="45" alt="">
                            <h5 class="font-weight-normal">Especialidades</h5>
                            <h5 id="count_especialidades"></h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-sm-4 stretch-card grid-margin">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center hospital-features">
                            <div class="badge btn-facebook">3 New</div>
                            <!-- <i class="mdi mdi-stethoscope icon-md text-danger"></i> -->
                            <img src="view/assets/images/icons/paquete.svg" class="mr-2 mb-1 iconMenu" width="45" alt="">
                            <h5 class="font-weight-normal">Paquetes</h5>
                            <h5 id="count_paquetes"></h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-sm-4 stretch-card grid-margin">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center hospital-features">
                            <!-- <i class="mdi mdi-stethoscope icon-md text-danger"></i> -->
                            <img src="view/assets/images/icons/cita.svg" class="mr-2 mb-1 iconMenu" width="45" alt="">
                            <h5 class="font-weight-normal">Citas</h5>
                            <h5 id="count_citas"></h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-sm-4 stretch-card grid-margin">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center hospital-features">
                            <!-- <i class="mdi mdi-stethoscope icon-md text-danger"></i> -->
                            <img src="view/assets/images/icons/users.svg" class="mr-2 mb-1 iconMenu" width="45" alt="">
                            <h5 class="font-weight-normal">Usuarios</h5>
                            <h5 id="count_usuarios"></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="row">
            <div class="col-xl-3 col-sm-4 stretch-card grid-margin">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">Doctors list</div>
                        <div class="doctor-list d-flex align-items-center">
                            <img src="view/assets/images/dashboard/hospital/Doc_11.jpg" alt="">
                            <div>
                                <h6 class="mb-0">Dr.Freddy</h6>
                                <p class="text-small m-0">gynaecology</p>
                            </div>
                        </div>
                        <div class="doctor-list d-flex align-items-center">
                            <img src="view/assets/images/dashboard/hospital/Doc_3.jpg" alt="">
                            <div>
                                <h6 class="mb-0">Dr.Kita Chihoko</h6>
                                <p class="text-small m-0">Cardiology</p>
                            </div>
                        </div>
                        <div class="doctor-list d-flex align-items-center">
                            <img src="view/assets/images/dashboard/hospital/Doc_1.jpg" alt="">
                            <div>
                                <h6 class="mb-0">Dr.Nwoye</h6>
                                <p class="text-small m-0">Cardiology</p>
                            </div>
                        </div>
                        <div class="doctor-list d-flex align-items-center">
                            <img src="view/assets/images/dashboard/hospital/Doc_6.jpg" alt="">
                            <div>
                                <h6 class="mb-0">Dr.Richard</h6>
                                <p class="text-small m-0">Orthopedic</p>
                            </div>
                        </div>
                        <div class="doctor-list d-flex align-items-center border-0">
                            <img src="view/assets/images/dashboard/hospital/Doc_9.jpg" alt="">
                            <div>
                                <h6 class="mb-0">Dr.Herman Beck</h6>
                                <p class="text-small m-0">Pediatric</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-9  col-sm-8 stretch-card grid-margin">
                <div class="card">
                    <div class="card-body">
                        <div class="d-lg-flex justify-content-between">
                            <h4 class="card-title">Recent Appointments </h4>
                            <div class="dropdown">
                                <button class="btn btn-light btn-sm mb-2 text-muted " type="button" id="dropdownMenuIconButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="mdi mdi-settings"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuIconButton1">
                                    <a class="dropdown-item bg-light ary p-2 mb-1" href="#"><i class="mdi mdi-file-excel"></i> Excel</a>
                                    <a class="dropdown-item  bg-light p-2 mb-1" href="#"><i class="mdi mdi-file-pdf"></i> PDF</a>
                                    <a class="dropdown-item  bg-light p-2 mb-1" href="#"><i class="mdi mdi-file-document"></i> Doc</a>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive custom-datatable">
                            <div id="order-listing_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="dataTables_length" id="order-listing_length"><label>Sort by <select name="order-listing_length" aria-controls="order-listing" class="custom-select custom-select-sm form-control">
                                                    <option value="2">2</option>
                                                    <option value="5">5</option>
                                                    <option value="10">10</option>
                                                    <option value="15">15</option>
                                                    <option value="-1">All</option>
                                                </select></label></div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div id="order-listing_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control" placeholder="Search" aria-controls="order-listing"></label></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="order-listing" class="table table-striped apointment-table dataTable no-footer" role="grid">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 118px;"> Patient </th>
                                                    <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 182px;"> Doctor </th>
                                                    <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 112px;"> Date </th>
                                                    <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 82px;"> Timing </th>
                                                    <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 123px;"> Contact </th>
                                                </tr>
                                            </thead>
                                            <tbody>






                                                <tr role="row" class="odd">
                                                    <td>Nik Jordan </td>
                                                    <td>
                                                        <img src="view/assets/images/dashboard/hospital/Doc_11.jpg" class="mr-2" alt="image"> Alfie Wood
                                                    </td>
                                                    <td>
                                                        12 Sep 2020
                                                    </td>
                                                    <td> 10:02PM </td>
                                                    <td> 087-288-7626 </td>
                                                </tr>
                                                <tr role="row" class="even">
                                                    <td> Lily Wozniak </td>
                                                    <td>
                                                        <img src="view/assets/images/dashboard/hospital/Doc_3.jpg" class="mr-2" alt="image"> Dr.Kita Chihoko
                                                    </td>
                                                    <td>
                                                        14 Mar 2020
                                                    </td>
                                                    <td> 05:11PM </td>
                                                    <td> 958-984-6484 </td>
                                                </tr>
                                                <tr role="row" class="odd">
                                                    <td> Samuel Path </td>
                                                    <td>
                                                        <img src="view/assets/images/dashboard/hospital/Doc_1.jpg" class="mr-2" alt="image"> Dr.Nwoye
                                                    </td>
                                                    <td>
                                                        26 Feb 2020
                                                    </td>
                                                    <td> 08:05PM </td>
                                                    <td> 782-097-9355 </td>
                                                </tr>
                                                <tr role="row" class="even">
                                                    <td> Mia Mai</td>
                                                    <td>
                                                        <img src="view/assets/images/dashboard/hospital/Doc_9.jpg" class="mr-2" alt="image"> Dr.Herman Beck
                                                    </td>
                                                    <td>
                                                        22 Apr 2020
                                                    </td>
                                                    <td> 08:54PM </td>
                                                    <td> 892-335-8026 </td>
                                                </tr>
                                                <tr role="row" class="odd">
                                                    <td> Herman Beck</td>
                                                    <td>
                                                        <img src="view/assets/images/dashboard/hospital/Doc_12.jpg" class="mr-2" alt="image"> Dr.Herman Beck
                                                    </td>
                                                    <td>
                                                        26 Oct 2020
                                                    </td>
                                                    <td> 08:18PM </td>
                                                    <td> 027-758-9324 </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-5"></div>
                                    <div class="col-sm-12 col-md-7">
                                        <div class="dataTables_paginate paging_simple_numbers" id="order-listing_paginate">
                                            <ul class="pagination">
                                                <li class="paginate_button page-item previous disabled" id="order-listing_previous"><a href="#" aria-controls="order-listing" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                                                <li class="paginate_button page-item active"><a href="#" aria-controls="order-listing" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                                                <li class="paginate_button page-item next disabled" id="order-listing_next"><a href="#" aria-controls="order-listing" data-dt-idx="2" tabindex="0" class="page-link">Next</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- first row starts here -->
        <!-- <div class="row">
            <div class="col-xl-8 stretch-card grid-margin">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between flex-wrap">
                            <div>
                                <div class="card-title mb-0">Patient total</div>
                                <p class="mt-3">Here are your important tasks, updates and alerts.</p>
                            </div>
                            <div>
                                <ul class="horizontal-legend">
                                    <li><span class="bg-success"></span>New Patients</li>
                                    <li><span class="bg-primary"></span>Old Patients</li>
                                </ul>
                            </div>
                        </div>
                        <div class="flot-chart-wrapper">
                            <div id="patientTotal" class="flot-chart" style="padding: 0px;">
                                <canvas class="flot-base" width="632" height="216" style="width: 632.031px; height: 216px;"></canvas>
                                <div class="flot-text" style="position: absolute; inset: 0px; font-size: smaller; color: rgb(84, 84, 84);">
                                    <div class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; inset: 0px;">
                                        <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 96px; top: 201px; left: 2px; text-align: center;">Sun</div>
                                        <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 96px; top: 201px; left: 102px; text-align: center;">Mon</div>
                                        <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 96px; top: 201px; left: 204px; text-align: center;">Tue</div>
                                        <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 96px; top: 201px; left: 303px; text-align: center;">Wed</div>
                                        <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 96px; top: 201px; left: 405px; text-align: center;">Thu</div>
                                        <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 96px; top: 201px; left: 510px; text-align: center;">Fri</div>
                                        <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 96px; top: 201px; left: 608px; text-align: center;">Sat</div>
                                    </div>
                                </div>
                                <canvas class="flot-overlay" width="632" height="216" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 632.031px; height: 216px;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 stretch-card grid-margin">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">Diseases Report</div>
                        <p class="mt-2 mt-sm-0">a specialist will contact you shortly</p>
                        <div class="doughnut-wrapper m-auto">
                            <div class="chartjs-size-monitor">
                                <div class="chartjs-size-monitor-expand">
                                    <div class=""></div>
                                </div>
                                <div class="chartjs-size-monitor-shrink">
                                    <div class=""></div>
                                </div>
                            </div>
                            <canvas id="deseaseReport" height="421" style="display: block; width: 632px; height: 421px;" width="632" class="chartjs-render-monitor"></canvas>
                            <div id="deseaseReport-legend3" class="pl-lg-0 rounded-legend w-100">
                                <ul class="m-auto pl-0 w-100 d-flex justify-content-between">
                                    <li>
                                        <div><span class="legend-dots" style="background:#00cff4"></span>Pneumonia</div>
                                    </li>
                                    <li>
                                        <div><span class="legend-dots" style="background:#5e6eed"></span>diabetes</div>
                                    </li>
                                    <li>
                                        <div><span class="legend-dots" style="background:#ff0d59"></span>Colds</div>
                                    </li>
                                    <li>
                                        <div><span class="legend-dots" style="background:#00d284"></span>Flue</div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
</div>

<script src="view/js/inicio.js"></script>