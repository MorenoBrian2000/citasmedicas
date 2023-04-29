
$(document).ready(function () { traerUsuariosAll(); });


const traerUsuariosAll = async () => {
    const dataSet = [];
    try {
        let response = await fetch('api/controller/users');
        let usuarios = await response.json();
        for (const usuario of usuarios) {
            let datos = [];
            datos.push(usuario.id_user);
            datos.push(`${usuario.nombre_user} ${usuario.amaterno_user} ${usuario.apaterno_user}`);
            datos.push(usuario.correo_user);
            datos.push(usuario.username_user);
            datos.push(`<label class="badge badge-success" onclick="" >Activo</label>`);
            datos.push(`<button class='badge badge-warning badge-sm'  onclick="modificarCredenciales(${usuario.id_user})"><i class='mdi mdi-key'></i> Credenciales</button>
            <button class='badge badge-primary badge-sm'   onclick="traerUsaurio(${usuario.id_user})"><i class='mdi mdi-pencil'></i> Editar</button>
            <button class='badge badge-danger badge-sm' btn-sm'  onclick="deleteUsuario(${usuario.id_user})"><i class='mdi mdi-delete'></i> Elimiar</button>`);
            dataSet.push(datos);
        }
        $('#example').DataTable({
            data: dataSet,
            columns: [
                { title: "#" },
                { title: "Nombre" },
                { title: "Correo" },
                { title: "Username" },
                { title: "Status" },
                { title: "Acciones" }
            ]
        });
    } catch (error) {
        console.log(error);
    }
}


const traerUsaurio = async (id_user) => {

    let response = await fetch(`api/controller/users/${id_user}`);
    let usuarios = await response.json();

    console.log(usuarios);

    $("#id_user").val(usuarios.id_user);
    $("#nombre_user").val(usuarios.nombre_user);
    $("#apaterno_user").val(usuarios.apaterno_user);
    $("#amaterno_user").val(usuarios.amaterno_user);
    $("#correo_user").val(usuarios.correo_user);
    $("#domicilio_user").val(usuarios.domicilio_user);
    $("#telefono_user").val(usuarios.telefono_user);

    $("#modalUpdateUsuario").modal('show');
}


const crearUsuarios = async () => {

    let Usuario = {
        nombre_user: $("#txt_nombre_user").val(),
        apaterno_user: $("#txt_apaterno_user").val(),
        amaterno_user: $("#txt_amaterno_user").val(),
        correo_user: $("#txt_correo_user").val(),
        domicilio_user: $("#txt_domicilio_user").val(),
        telefono_user: $("#txt_telefono_user").val(),
        username_user: $("#txt_username_user").val(),
        password_user: $("#txt_password_user").val(),
        status_user: "1",
        rol_user: "1"
    }

    let response = await fetch('api/controller/users', {
        method: 'POST',
        body: JSON.stringify(Usuario),
        headers: {
            'Content-Type': 'application/json'
        }
    });

    let data = await response.json();

    if (data.response) {
        Swal.fire('Success!', 'Usaurio agregado con exito!', 'success');
        reloadDatatable();
        $("#modalAgregarUsuario").modal('hide');
    } else {
        Swal.fire('Error!', 'Ocurrio un error, verifica los datos!', 'error');
    }
}


const actulizarUsuario = async () => {


    let usuario = {
        id_user: $("#id_user").val(),
        nombre_user: $("#nombre_user").val(),
        apaterno_user: $("#apaterno_user").val(),
        amaterno_user: $("#amaterno_user").val(),
        correo_user: $("#correo_user").val(),
        domicilio_user: $("#domicilio_user").val(),
        telefono_user: $("#telefono_user").val(),
        rol_user: "1"
    }
    let response = await fetch('api/controller/users', {
        method: 'PUT',
        body: JSON.stringify(usuario),
        headers: {
            'Content-Type': 'application/json'
        }
    });

    let data = await response.json();

    if (data.response) {
        Swal.fire('Success!', 'Usaurio agregado con exito!', 'success');
        reloadDatatable();
        $("#modalAgregarUsuario").modal('hide');
    } else {
        Swal.fire('Error!', 'Ocurrio un error, verifica los datos!', 'error');
    }

}



const deleteUsuario = (id_user) => {

    Swal.fire({
        title: '¿Estás seguro?',
        text: "¡No podrás revertir esto!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Eliminar!'
    }).then(async (result) => {
        if (result.isConfirmed) {

            let response = await fetch(`api/controller/users/${id_user}`, {
                method: 'DELETE'
            });
            let data = await response.json();
            if (data.response) {
                Swal.fire('Success!', 'Usaurio agregado con exito!', 'success');
                reloadDatatable();
                $("#modalAgregarUsuario").modal('hide');
            } else {
                Swal.fire('Error!', 'Ocurrio un error, verifica los datos!', 'error');
            }

        }
    })

}




const modificarCredenciales = async id_user => {
    try {

        let response = await fetch(`api/controller/users/${id_user}`);
        let credenciales = await response.json();
        $("#username_user").val(credenciales.username_user);
        $("#id_user_u").val(credenciales.id_user);
        $("#password_old_user").val(credenciales.password_user);
        $("#modalUpdateCredenciales").modal('show');

    } catch (error) {
        console.log(error);
    }
}


const actulizarUsuarioCredenciales = async () => {

    let datos = {
        username_user: $("#username_user").val(),
        password_user: $("#password_user").val(),
        id_user: $("#id_user_u").val(),
        action: 'updateCredenciales',
    }

    console.log(datos);

    $.post("controller/usuarios.controlador.php", datos, function (data) {

        let response = JSON.parse(data);
        if (response.response) {
            Swal.fire('Success!', 'Usaurio actualizado con exito!', 'success');
            reloadDatatable();
            $("#modalAgregarUsuario").modal('hide');
        } else {
            Swal.fire('Error!', 'Ocurrio un error, verifica los datos!', 'error');
        }
    });

}


const reloadDatatable = () => {

    $('#example').dataTable().fnDestroy();
    traerUsuariosAll();

}
