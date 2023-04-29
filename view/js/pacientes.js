
$(document).ready(function () { traerPacientesAll(); });

const traerPacientesAll = async () => {
    try {
        Main.DataTable('example', 'api/controller/pacientes?datatable');
    } catch (error) {
        console.log(error);
    }
}


const traerPeciente = async (id_paciente) => {

    let response = await fetch(`api/controller/pacientes/${id_paciente}`);
    let pacientes = await response.json();

    console.log(pacientes);

    $("#id_paciente").val(pacientes.id_paciente);
    $("#nombre_paciente").val(pacientes.nombre_paciente);
    $("#apaterno_paciente").val(pacientes.apaterno_paciente);
    $("#amaterno_paciente").val(pacientes.amaterno_paciente);
    $("#correo_paciente").val(pacientes.correo_paciente);
    $("#domicilio_paciente").val(pacientes.domicilio_paciente);
    $("#telefono_paciente").val(pacientes.telefono_paciente);
    $("#alergias_paciente").val(pacientes.alergias_paciente);
    $("#rfc_paciente").val(pacientes.rfc_paciente);

    $("#modalUpdatePacientes").modal('show');
}


const crearPacientes = async () => {

    let pacientes = {
        nombre_paciente: $("#txt_nombre_paciente").val(),
        apaterno_paciente: $("#txt_apaterno_paciente").val(),
        amaterno_paciente: $("#txt_amaterno_paciente").val(),
        correo_paciente: $("#txt_correo_paciente").val(),
        domicilio_paciente: $("#txt_domicilio_paciente").val(),
        telefono_paciente: $("#txt_telefono_paciente").val(),
        alergias_paciente: $("#txt_alergias_paciente").val(),
        rfc_paciente: $("#txt_rfc_paciente").val(),
        status_paciente: "1",
    }
    let response = await fetch('api/controller/pacientes', {
        method: 'POST',
        body: JSON.stringify(pacientes),
        headers: {
            'Content-Type': 'application/json'
        }
    });
    let data = await response.json();
    if (data.response) {
        Swal.fire('Success!', 'Pacientes agregado con exito!', 'success');
        reloadDatatable();
        $(".form-control").val('');
        $("#modalAgregarPacientes").modal('hide');
    } else {
        Swal.fire('Error!', 'Ocurrio un error, verifica los datos!', 'error');
    }
}


const actulizarPacientes = async () => {


    let pacientes = {
        id_paciente: $("#id_paciente").val(),
        nombre_paciente: $("#nombre_paciente").val(),
        apaterno_paciente: $("#apaterno_paciente").val(),
        amaterno_paciente: $("#amaterno_paciente").val(),
        correo_paciente: $("#correo_paciente").val(),
        domicilio_paciente: $("#domicilio_paciente").val(),
        telefono_paciente: $("#telefono_paciente").val(),
        alergias_paciente: $("#alergias_paciente").val(),
        rfc_paciente: $("#rfc_paciente").val(),
        status_paciente: "1",
    }

    let response = await fetch('api/controller/pacientes', {
        method: 'PUT',
        body: JSON.stringify(pacientes),
        headers: {
            'Content-Type': 'application/json'
        }
    });

    let data = await response.json();

    if (data.response) {
        Swal.fire('Success!', 'Paciente agregado con exito!', 'success');
        $("#modalUpdatePacientes").modal('hide');
        reloadDatatable();

    } else {
        Swal.fire('Error!', 'Ocurrio un error, verifica los datos!', 'error');
    }

}



const deletePacientes = (id_paciente) => {


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
                let response = await fetch(`api/controller/pacientes/${id_paciente}`, {
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


const mostarDetallesMedico = async (id_paciente) => {

    $("#modalInfoPaciente").modal()

    try {

        let response = await fetch(`api/controller/pacientes/${id_paciente}`);
        let paciente = await response.json();

        console.log(paciente);

        let templete = `
        <div class="row">
            <div class="col-12 text-center">
                <img src="view/assets/images/icons/pacient.svg" alt="" width="100" class="img-circle img-fluid">
            </div>
           <div class="col-12">
                <h2>${paciente.nombre_paciente} ${paciente.apaterno_paciente} ${paciente.amaterno_paciente}</h2>
                <h4><strong>Correo Electronico: </strong> ${paciente.correo_paciente} </h4>
            </div>
            <div class="col-12">
                <ul class="list-unstyled">
                    <li><i class="fa fa-building"></i> <b> Domicilio: </b>${paciente.domicilio_paciente} </li>
                    <li><i class="fa fa-phone"></i> <b> Telefono : </b>${paciente.telefono_paciente} </li>
                    <li><i class="fa fa-address-card"></i> <b> RFC : </b>${paciente.rfc_paciente} </li>
                    <li><i class="fa fa-allergies"></i> <b> Alergias : </b>${paciente.alergias_paciente} </li>
                </ul>
            </div>
        </div>`;

        document.getElementById('modalInfo').innerHTML = templete;

    } catch (error) {
        console.log(error);
    }

}


const reloadDatatable = () => {

    $('#example').dataTable().fnDestroy();
    traerPacientesAll();

}