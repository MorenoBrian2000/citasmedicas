<!-- partial:view/partials/_navbar.html -->
<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
  <div class="navbar-menu-wrapper d-flex align-items-stretch">
    <ul class="navbar-nav">
      <li class="nav-item dropdown icon-max">
        <a class="nav-link" id="messageDropdown" href="#" data-toggle="minimize" aria-expanded="false">
          <i class="mdi mdi-menu"></i>
        </a>
      </li>

      <li class="nav-item dropdown icon-min">
        <a class="nav-link" id="messageDropdown" href="#" data-toggle="minimize" aria-expanded="false">
          S A C
        </a>
      </li>
    </ul>
    <ul class="navbar-nav navbar-nav-right">

      <li class="nav-item nav-profile dropdown">
        <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
          <div class="nav-profile-img">
            <img src="view/assets/images/faces-clipart/pic-1.png" alt="image">
          </div>
          <div class="nav-profile-text">
            <!-- <p class="text-black font-weight-semibold m-0">  <?php echo $_SESSION["nombre"] ?> </p> -->
            <span class="font-13 online-color"> <?php echo $_SESSION["nombre"] ?> <i class="mdi mdi-chevron-down"></i></span>
          </div>
        </a>
        <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
          <a class="dropdown-item" href="salir">
            <i class="mdi mdi-logout mr-2 text-primary"></i> Salir </a>
        </div>
      </li>
    </ul>
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
      <span class="mdi mdi-menu"></span>
    </button>
  </div>
</nav>

<style>
  @media screen and (max-width: 992px) {

    .icon-max {
      display: none;
    }

    .icon-min {
      display: block;
    }
  }
</style>