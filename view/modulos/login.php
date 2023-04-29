<?php include('view/modulos/src/header-login.php'); ?> 


<div class="limiter">
    <div class="container-login100"
        style="background-image: url('https://www.wallpapertip.com/wmimgs/9-96793_oral-surgery-data-src-vertical-dentist-wallpapers-clinica.jpg');">
        <div class="wrap-login100" style="background: linear-gradient(-135deg, #29438c, #3ba2b3);">
            <form class="login100-form validate-form" id="form-login">
                <span class="login100-form-logo">
                    <img src="vistas/assets/images/login_img.png" width="100" alt="">
                    <!-- <i class="zmdi zmdi-landscape"></i> -->
                </span>
                <span class="login100-form-title  p-t-30"> S A C</span>
                <p style="color: white;" class="text-center p-b-34">Sistema de Administración Clínica</p>
                <div class="wrap-input100 validate-input" data-validate="Enter username">
                    <input class="input100" type="text" id="InputUsername1" name="username" placeholder="Username">
                    <span class="focus-input100" data-placeholder="&#xf207;"></span>
                </div>
                <div class="wrap-input100 validate-input" data-validate="Enter password">
                    <input class="input100" type="password" id="InputPassword1" name="pass" placeholder="Password">
                    <span class="focus-input100" data-placeholder="&#xf191;"></span>
                </div>

                <div class="container-login100-form-btn">
                    <button type="submit" class="login100-form-btn" id="btn_login">Login</button>
                </div>

            </form>
        </div>
    </div>
</div>


<script>
    document.getElementById('form-login').addEventListener('submit', function (e) {
        e.preventDefault();
        Main.validarUsaurio(e);
        Main.init(e);
    });
</script>