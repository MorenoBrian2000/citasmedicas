<div class="page-header flex-wrap">
    <div class="header-left">
        <h4>Lista de Usuarios</h4>
    </div>
    <div class="header-right d-flex flex-wrap mt-2 mt-sm-0">
        <button type="button" class="btn btn-primary mt-2 mt-sm-0 btn-icon-text" data-toggle="modal" data-target="#modalAgregarUsuario">
            <i class="mdi mdi-plus-circle"></i> Agregar Usuarios </button>
    </div>
</div>
<!--  -->

<div class="modal fade in" id="largeModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="largeModalLabel">Modal title</h4>
            </div>
            <div class="modal-body">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin sodales orci ante, sed ornare eros vestibulum ut. Ut accumsan
                vitae eros sit amet tristique. Nullam scelerisque nunc enim, non dignissim nibh faucibus ullamcorper.
                Fusce pulvinar libero vel ligula iaculis ullamcorper. Integer dapibus, mi ac tempor varius, purus
                nibh mattis erat, vitae porta nunc nisi non tellus. Vivamus mollis ante non massa egestas fringilla.
                Vestibulum egestas consectetur nunc at ultricies. Morbi quis consectetur nunc.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect">SAVE CHANGES</button>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
            </div>
        </div>
    </div>
</div>


<!-- Tabla de usuarios-->


<div class="col-lg-12 p-0 mb-3 ">
    <table id="example" class="table dt-responsive nowrap" width="100%"></table>
</div>



<!-- Modal Agregar Usuarios -->
<div class="modal fade" id="modalAgregarUsuario" tabindex="-1" role="dialog" aria-labelledby="modalAgregarUsuarioLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAgregarUsuarioLabel">Agregar Usuarios</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="modal-body">
                    <form class="form-sample">
                        <p class="card-description">Completa los campos correctamente</p>
                        <div class="row">
                            <!-- Nombre  -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nombre_user"><b>Nombre</b></label>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">@</span>
                                        <input type="text" class="form-control" id="txt_nombre_user" placeholder="Nombre">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="apaterno_user"><b>Apellido Paterno</b></label>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">@</span>
                                        <input type="text" class="form-control" id="txt_apaterno_user" placeholder="Apellido Paterno">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="amaterno_user"><b>Apellido Materno</b></label>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">@</span>
                                        <input type="text" class="form-control" id="txt_amaterno_user" placeholder="Apellido Materno">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="correo_user"><b>Correo</b></label>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">@</span>
                                        <input type="text" class="form-control" id="txt_correo_user" placeholder="Correo">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="domicilio_user"><b>Domicilio</b></label>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">@</span>
                                        <input type="text" class="form-control" id="txt_domicilio_user" placeholder="Domicilio">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="telefono_user"><b>Telefono</b></label>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">@</span>
                                        <input type="text" class="form-control" id="txt_telefono_user" placeholder="Telefono">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="username_user"><b>Username</b></label>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">@</span>
                                        <input type="text" class="form-control" id="txt_username_user" placeholder="Username">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password_user"><b>Password</b></label>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">@</span>
                                        <input type="password" class="form-control" id="txt_password_user" placeholder="Password">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-success" onclick="crearUsuarios();">Guardar Cambios</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal Actualizar Usuarios -->
<div class="modal fade" id="modalUpdateUsuario" tabindex="-1" role="dialog" aria-labelledby="modalUpdateUsuarioLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" >
            <div class="modal-header">
                <h5 class="modal-title" id="modalUpdateUsuarioLabel">Modificar Usuarios</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-sample">
                    <p class="card-description">Completa los campos correctamente</p>
                    <div class="row">
                        <!-- Nombre  -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nombre_user"><b>Nombre</b></label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">@</span>
                                    <input type="hidden" id="id_user">
                                    <input type="text" class="form-control" id="nombre_user" placeholder="Nombre">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="apaterno_user"><b>Apellido Paterno</b></label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">@</span>
                                    <input type="text" class="form-control" id="apaterno_user" placeholder="Apellido Paterno">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="amaterno_user"><b>Apellido Materno</b></label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">@</span>
                                    <input type="text" class="form-control" id="amaterno_user" placeholder="Apellido Materno">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="correo_user"><b>Correo</b></label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">@</span>
                                    <input type="text" class="form-control" id="correo_user" placeholder="Correo">
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="domicilio_user"><b>Domicilio</b></label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">@</span>
                                    <input type="text" class="form-control" id="domicilio_user" placeholder="Domicilio">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="telefono_user"><b>Telefono</b></label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">@</span>
                                    <input type="text" class="form-control" id="telefono_user" placeholder="Telefono">
                                </div>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-success" onclick="actulizarUsuario();">Guardar Cambios</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Actualizar Credenciales -->
<div class="modal fade" id="modalUpdateCredenciales" tabindex="-1" role="dialog" aria-labelledby="modalUpdateCredencialesabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" >
            <div class="modal-header">
                <h5 class="modal-title" id="modalUpdateCredencialesabel">Modificar Username / Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-sample">
                    <p class="card-description">Completa los campos correctamente</p>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="username_user"><b>Username</b></label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">@</span>
                                    <input type="hidden" id="id_user_u">
                                    <input type="text" class="form-control" id="username_user" placeholder="Username">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="password_user"><b>Nueva Password</b></label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">@</span>
                                    <input type="password" class="form-control" id="password_user" placeholder="Escriba la nueva contraseña">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-success" onclick="actulizarUsuarioCredenciales();">Guardar Cambios</button>
            </div>
        </div>
    </div>
</div>


<script src="view/js/usuarios.js"></script>