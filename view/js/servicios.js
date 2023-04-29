
$(document).ready(function () { traerServiciosAll(); });


const traerServiciosAll = async () => {
    try {
        Main.DataTable('example', 'api/controller/servicios?datatable');
    } catch (error) {
        console.log(error);
    }
}


const traerServicios = async (id_servicio) => {

    let response = await fetch(`api/controller/servicios/${id_servicio}`);
    let servicio = await response.json();

    console.log(servicio);

    $("#id_servicio").val(servicio.id_servicio);
    $("#nombre_servicio").val(servicio.nombre_servicio);
    $("#txt_monto_servicio_u").val(servicio.monto_servicio);

    $("#modalUpdateServicios").modal('show');
}


const crearServicios = async () => {

    let servicio = {
        nombre_servicio: $("#txt_nombre_servicio").val(),
        monto_servicio: $("#txt_monto_servicio").val(),
    }

    console.log(JSON.stringify(servicio));
    let response = await fetch('api/controller/servicios', {
        method: 'POST',
        body: JSON.stringify(servicio),
        headers: {
            'Content-Type': 'application/json'
        }
    });
    let data = await response.json();
    if (data.response) {
        Swal.fire('Success!', 'Servicio agregado con exito!', 'success');
        reloadDatatable();
        $("#modalAgregarServicios").modal('hide');
    } else {
        Swal.fire('Error!', 'Ocurrio un error, verifica los datos!', 'error');
    }
}


const actulizarServicios = async () => {

    let especialidades = {
        id_servicio: $("#id_servicio").val(),
        nombre_servicio: $("#nombre_servicio").val(),
        monto_servicio: $("#txt_monto_servicio_u").val()
    }

    let response = await fetch('api/controller/servicios', {
        method: 'PUT',
        body: JSON.stringify(especialidades),
        headers: {
            'Content-Type': 'application/json'
        }
    });

    let data = await response.json();
    console.log(especialidades);
    if (data.response) {
        Swal.fire('Success!', 'Especialidad actualizada con exito!', 'success');
        reloadDatatable();
        $("#modalUpdateServicios").modal('hide');

    } else {
        Swal.fire('Error!', 'Ocurrio un error, verifica los datos!', 'error');
    }

}



const deleteServicios = (id_servicio) => {


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

            try {
                let response = await fetch(`api/controller/servicios/${id_servicio}`, {
                    method: 'DELETE'
                });
                let data = await response.json();
                if (data.response) {
                    Swal.fire('Deleted!', 'Your file has been deleted.', 'success');
                    reloadDatatable();
                } else {
                    Swal.fire('Error!', 'Ocurrio un error, verifica los datos!', 'error');
                }

            } catch (error) {

                console.log(error);

            }


        }
    })


}


const reloadDatatable = () => {

    $('#example').dataTable().fnDestroy();
    traerServiciosAll();

}