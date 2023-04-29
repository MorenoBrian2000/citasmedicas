<!-- partial:partials/_sidebar -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item " style="background: #ffffff;">
      <a class="nav-link d-block" href="inicio">
        <img class="sidebar-brand-logo mt-2" src="view/assets/images/Imagen1.png" style="width: 100%;" alt="" />
        <img class="sidebar-brand-logomini" src="view/assets/images/Imagen2.png" style="width: 75px; margin-bottom: -10px;margin-top: 5px;" alt="" />
      </a>
    </li>
    <li class="pt-2 pb-1">
      <span class="nav-item-head">Modulos</span>
    </li>
    <?php if ($_SESSION["rol_user"] == 1) : ?>

      <!-- Inicio -->
      <li class="nav-item">
        <a class="nav-link" href="inicio">
          <!-- <i class="fa fa-home  menu-icon"></i> -->
          <img src="view/assets/images/icons/home.svg" class="mr-2 mb-1 iconMenu" width="25" alt="">
          <span class="menu-title">Inicio</span>
        </a>
      </li>
      <!-- Medico-->
      <li class="nav-item">
        <a class="nav-link" href="medicos">
          <!-- <i class="fa fa-user-md menu-icon"></i> -->
          <img src="view/assets/images/icons/doctor.svg" class="mr-2 mb-1 iconMenu" width="25" alt="">
          <span class="menu-title">Medicos</span>
        </a>
      </li>
      <!-- Pacientes-->
      <li class="nav-item">
        <a class="nav-link" href="pacientes">
          <!-- <i class="fa fa-hospital-user  menu-icon"></i> -->
          <img src="view/assets/images/icons/pacient.svg" class="mr-2 mb-1 iconMenu" width="25" alt="">
          <span class="menu-title">Pacientes</span>
        </a>
      </li>
      <!-- Especialidades -->
      <li class="nav-item">
        <a class="nav-link" href="especialidades">
          <!-- <i class="fa fa-stethoscope  menu-icon"></i> -->
          <img src="view/assets/images/icons/especialidad1.svg" class="mr-2 mb-1 iconMenu" width="25" alt="">
          <span class="menu-title">Especialidades</span>
        </a>
      </li>

      <!-- Servicios -->
      <li class="nav-item">
        <a class="nav-link" href="servicios">
          <!-- <i class="fa fa-hand-holding-medical  menu-icon"></i> -->
          <img src="view/assets/images/icons/serive2.svg" class="mr-2 mb-1 iconMenu" width="25" alt="">
          <span class="menu-title">Servicios</span>
        </a>
      </li>
      <!-- paquetes -->
      <li class="nav-item">
        <a class="nav-link" href="paquetes">
          <!-- <i class="fa fa-th  menu-icon"></i> -->
          <img src="view/assets/images/icons/paquete.svg" class="mr-2 mb-1 iconMenu" width="25" alt="">
          <span class="menu-title">Paquetes</span>
        </a>
      </li>

      <!-- Citas -->
      <li class="nav-item">
        <a class="nav-link" href="citas">
          <!-- <i class="fa fa-calendar-plus  menu-icon"></i> -->
          <img src="view/assets/images/icons/cita2.svg" class="mr-2 mb-1 iconMenu" width="25" alt="">
          <span class="menu-title">Citas</span>
        </a>
      </li>

      <!-- Calendario -->

      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-calendario" aria-expanded="false" aria-controls="ui-calendario">
          <!-- <i class="fa fa-calendar-alt menu-icon"></i> -->
          <img src="view/assets/images/icons/calendar.svg" class="mr-2 mb-1 iconMenu" width="25" alt="">
          <span class="menu-title">Calendario</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-calendario">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item">
              <a class="nav-link" href="calendario">Calendario All</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="calendario-medico">Calendario por Medico</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="calendario-paciente">Calendario por Paciente</a>
            </li>
          </ul>
        </div>
      </li>

      <!-- Pagos -->

      <li class="nav-item">
        <a class="nav-link" href="pagos">
          <!-- <i class="fa fa-calendar-plus  menu-icon"></i> -->
          <img src="view/assets/images/icons/paymet.svg" class="mr-2 mb-1 iconMenu" width="25" alt="">
          <span class="menu-title">Pagos</span>
        </a>
      </li>
      <!--  -->
      <!-- Usuarios -->
      <li class="nav-item">
        <a class="nav-link" href="usuarios">
          <!-- <i class="fa fa-users  menu-icon"></i> -->
          <img src="view/assets/images/icons/user1.svg" class="mr-2 mb-1 iconMenu" width="25" alt="">
          <span class="menu-title">Usuarios</span>
        </a>
      </li>

    <?php endif; ?>

    <?php if ($_SESSION["rol_user"] == 2) : ?>
      <!-- Inicio -->
      <li class="nav-item">
        <a class="nav-link" href="inicio">
          <!-- <i class="fa fa-home  menu-icon"></i> -->
          <img src="view/assets/images/icons/home.svg" class="mr-2 mb-1 iconMenu" width="25" alt="">
          <span class="menu-title">Inicio</span>
        </a>
      </li>
      <!-- Medico-->
      <li class="nav-item">
        <a class="nav-link" href="medicos">
          <!-- <i class="fa fa-user-md menu-icon"></i> -->
          <img src="view/assets/images/icons/doctor.svg" class="mr-2 mb-1 iconMenu" width="25" alt="">
          <span class="menu-title">Medicos</span>
        </a>
      </li>
      <!-- Pacientes-->
      <li class="nav-item">
        <a class="nav-link" href="pacientes">
          <!-- <i class="fa fa-hospital-user  menu-icon"></i> -->
          <img src="view/assets/images/icons/pacient.svg" class="mr-2 mb-1 iconMenu" width="25" alt="">
          <span class="menu-title">Pacientes</span>
        </a>
      </li>
      <!-- Especialidades -->
      <li class="nav-item">
        <a class="nav-link" href="especialidades">
          <!-- <i class="fa fa-stethoscope  menu-icon"></i> -->
          <img src="view/assets/images/icons/especialidad1.svg" class="mr-2 mb-1 iconMenu" width="25" alt="">
          <span class="menu-title">Especialidades</span>
        </a>
      </li>
      <!-- Citas -->
      <li class="nav-item">
        <a class="nav-link" href="citas">
          <!-- <i class="fa fa-calendar-plus  menu-icon"></i> -->
          <img src="view/assets/images/icons/cita2.svg" class="mr-2 mb-1 iconMenu" width="25" alt="">
          <span class="menu-title">Citas</span>
        </a>
      </li>

<!-- Calendario -->

      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-calendario" aria-expanded="false" aria-controls="ui-calendario">
          <!-- <i class="fa fa-calendar-alt menu-icon"></i> -->
          <img src="view/assets/images/icons/calendar.svg" class="mr-2 mb-1 iconMenu" width="25" alt="">
          <span class="menu-title">Calendario</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-calendario">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item">
              <a class="nav-link" href="calendario">Calendario All</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="calendario-medico">Calendario por Medico</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="calendario-paciente">Calendario por Paciente</a>
            </li>
          </ul>
        </div>
      </li>
    <?php endif; ?>

    <style>
      .iconMenu:hover {
        width: 30px;
      }
    </style>

  </ul>
</nav>