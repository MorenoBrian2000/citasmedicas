<?php
session_start();
setlocale(LC_ALL, 'es_MX');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="theme-color">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>SAC |
        <?php $rute = (isset($_GET["ruta"])) ? $_GET["ruta"] : "INICIO";
        echo strtoupper($rute); ?>
    </title>
    <link rel="stylesheet" href="view/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="view/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="view/assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="view/assets/vendors/jquery-bar-rating/css-stars.css" />
    <link rel="stylesheet" href="view/assets/css/demo_1/style.css" />
    <link rel="icon" href="view/assets/images/favicon.png" type="image/png" />
    <link href="view/assets/js/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="view/assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
    <link rel="stylesheet" href="view/assets/js/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="view/assets/js/responsive.dataTables.min.css">
    <link rel="stylesheet" href="view/assets/js/dataTables.bootstrap.css">
    <link rel="stylesheet" href="view/assets/vendors/fullcalendar/fullcalendar.css">

    <script src="view/assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="view/assets/js/sweetalert2@10.js"></script>
    <script src="view/assets/js/select2.min.js"></script>
    <script src="view/assets/js/jquery.dataTables.js"></script>
    <script src="view/assets/js/dataTables.bootstrap4.js"></script>
    <script src="view/assets/js/dataTables.responsive.min.js"></script>
    <script src="view/js/main.js"></script>
</head>

<body class="">
    <?php

    if (isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok") {
        echo '<div class="container-scroller">';
        include "modulos/src/_sidebar.php";
        echo '<div class="container-fluid page-body-wrapper" style="width: 100%";>';
        echo '<div class="main-panel"> <div class="content-wrapper pb-0" style="background: white !important;">';
        include "modulos/src/_navbar.php";
        if (isset($_GET["ruta"])) {
            if (
                $_GET["ruta"] == "calendario" ||
                $_GET["ruta"] == "factura" ||
                $_GET["ruta"] == "calendario-medico" ||
                $_GET["ruta"] == "calendario-paciente" ||
                $_GET["ruta"] == "especialidades" ||
                $_GET["ruta"] == "graficas" ||
                $_GET["ruta"] == "login" ||
                $_GET["ruta"] == "pacientes" ||
                $_GET["ruta"] == "abonos" ||
                $_GET["ruta"] == "pago" ||
                $_GET["ruta"] == "pagos" ||
                $_GET["ruta"] == "pago-cita" ||
                $_GET["ruta"] == "pagar-cita" ||
                $_GET["ruta"] == "servicios" ||
                $_GET["ruta"] == "citas" ||
                $_GET["ruta"] == "estados-cuenta" ||
                $_GET["ruta"] == "inicio" ||
                $_GET["ruta"] == "medicos" ||
                $_GET["ruta"] == "paquetes" ||
                $_GET["ruta"] == "usuarios" ||
                $_GET["ruta"] == "historial-medico" ||
                $_GET["ruta"] == "historial-paciente" ||
                $_GET["ruta"] == "documentos-paciente" ||
                $_GET["ruta"] == "cita" ||
                $_GET["ruta"] == "salir"
            ) {
                include "modulos/" . $_GET["ruta"] . ".php";
            } else {
                include "modulos/src/_404.php";
            }
        } else {
            include "modulos/calendario.php";
        }

        echo '</div>';

        include "modulos/src/_footer.php";

        echo '</div>';
    } else {

        include "modulos/login.php";
    }

    ?>

    <script src="view/assets/js/hoverable-collapse.js"></script>
    <script src="view/assets/js/misc.js"></script>
</body>

</html>