
$(document).ready(function () { traerPaqueteAll(); });


const traerPaqueteAll = async () => {
    try {
        Main.DataTable('example', 'api/controller/paquetes?datatable');
    } catch (error) {
        console.log(error);
    }
}


const traerPaquete = async (id_paquete) => {

    let response = await fetch(`api/controller/paquetes/${id_paquete}`);
    let paquete = await response.json();

    console.log(paquete);

    $("#id_paquete").val(paquete.id_paquete);
    $("#nombre_paquete").val(paquete.nombre_paquete);
    $("#monto_paquete").val(paquete.monto_paquete);

    $("#modalUpdatePaquetes").modal('show');
}


const crearPaquetes = async () => {

    let paquete = {
        nombre_paquete: $("#txt_nombre_paquete").val(),
        monto_paquete: $("#txt_monto_paquete").val(),
        id_medico: "1",
    }

    console.log(JSON.stringify(paquete));
    let response = await fetch('api/controller/paquetes', {
        method: 'POST',
        body: JSON.stringify(paquete),
        headers: {
            'Content-Type': 'application/json'
        }
    });
    let data = await response.json();
    if (data.response) {
        Swal.fire('Success!', 'Paquete agregado con exito!', 'success');
        $("#modalAgregarPaquetes").modal('hide');
        reloadDatatable();
    } else {
        Swal.fire('Error!', 'Ocurrio un error, verifica los datos!', 'error');
    }
}


const actulizarPaquetes = async () => {

    let especialidades = {
        id_paquete: $("#id_paquete").val(),
        nombre_paquete: $("#nombre_paquete").val(),
        monto_paquete: $("#monto_paquete").val()
    }

    let response = await fetch('api/controller/paquetes', {
        method: 'PUT',
        body: JSON.stringify(especialidades),
        headers: {
            'Content-Type': 'application/json'
        }
    });

    let data = await response.json();

    if (data.response) {
        Swal.fire('Success!', 'Especialidad actualizada con exito!', 'success');
        $("#modalUpdatePaquetes").modal('hide');
        reloadDatatable();
    } else {
        Swal.fire('Error!', 'Ocurrio un error, verifica los datos!', 'error');
    }

}



const deletePaquetes = (id_paquete) => {


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
                let response = await fetch(`api/controller/paquetes/${id_paquete}`, {
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
    traerPaqueteAll();

}







