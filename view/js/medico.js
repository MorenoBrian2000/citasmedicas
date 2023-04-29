traerMedicosAll = async () => {
    try {
        Main.DataTable('datatable', 'api/controller/medicos?datatable');
    } catch (error) {
        console.log(error);
    }
}

const traerMedico = async (id_medico) => {
    let response = await fetch(`api/controller/medicos/${id_medico}`);
    let medicos = await response.json();
    console.log(medicos);
    $("#id_medico").val(medicos.id_medico);
    $("#nombre_medico").val(medicos.nombre_medico);
    $("#apaterno_medico").val(medicos.apaterno_medico);
    $("#amaterno_medico").val(medicos.amaterno_medico);
    $("#correo_medico").val(medicos.correo_medico);
    $("#domicilio_medico").val(medicos.domicilio_medico);
    $("#telefono_medico").val(medicos.telefono_medico);
    $("#especialidad_medico").val(medicos.id_especialidad);
    $("#rfc_medico").val(medicos.rfc_medico);
    $("#cedula_medico").val(medicos.cedula_medico);
    $("#modalUpdateMedico").modal('show');
}

document.getElementById('form-add').addEventListener('submit', async (e) => {
    let medico = {
        nombre: e.target[0].value,
        apaterno: e.target[1].value,
        amaterno: e.target[2].value,
        correo: e.target[3].value,
        domicilio: e.target[4].value,
        telefono: e.target[5].value,
        especialidad: e.target[6].value,
        rfc: e.target[7].value,
        cedula: e.target[8].value,
        status: "1",
    }
    let response = await fetch('api/controller/medicos', {
        method: 'POST',
        body: JSON.stringify(medico),
        headers: {
            'Content-Type': 'application/json'
        }
    });
    let data = await response.json();

    if (data.response) {
        Swal.fire('Success!', 'Medico agregado con exito!', 'success');
        $("#modalAgregarMedico").modal('hide');
        reloadDatatable();
        $(".form-control").val('');
        document.getElementById("form-add").reset();
    } else {
        Swal.fire('Error!', 'Ocurrio un error, verifica los datos!', 'error');
    }
});

const actulizarMedico = async () => {
    let medico = {
        id_medico: $("#id_medico").val(),
        nombre_medico: $("#nombre_medico").val(),
        apaterno_medico: $("#apaterno_medico").val(),
        amaterno_medico: $("#amaterno_medico").val(),
        correo_medico: $("#correo_medico").val(),
        domicilio_medico: $("#domicilio_medico").val(),
        telefono_medico: $("#telefono_medico").val(),
        id_especialidad: $("#especialidad_medico").val(),
        rfc_medico: $("#rfc_medico").val(),
        cedula_medico: $("#cedula_medico").val(),
        status_medico: "1",
    }
    let response = await fetch('api/controller/medicos', {
        method: 'PUT',
        body: JSON.stringify(medico),
        headers: {
            'Content-Type': 'application/json'
        }
    });
    let data = await response.json();

    if (data.response) {
        Swal.fire('Success!', 'Medico agregado con exito!', 'success');
        reloadDatatable();
        $("#modalUpdateMedico").modal('hide');

    } else {
        Swal.fire('Error!', 'Ocurrio un error, verifica los datos!', 'error');
    }

}

const deleteMedico = (id_medico) => {
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
                let response = await fetch(`api/controller/medicos/${id_medico}`, {
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

const medicosEspecialidades = async () => {
    try {
        let response = await fetch('api/controller/especialidades');
        let especialidades = await response.json();
        for (const especialidad of especialidades) {
            let { id_especialidad, nombre_especialidad } = especialidad;
            $("#txt_especialidad_medico").append(`<option value="${id_especialidad}">${nombre_especialidad}</option>`);
            $("#especialidad_medico").append(`<option value="${id_especialidad}">${nombre_especialidad}</option>`);
        }
    } catch (error) {
    }
}

const mostarDetallesMedico = async (id_medico) => {
    $("#modalInfoMedico").modal()
    try {
        let response = await fetch(`api/controller/medicos/${id_medico}`);
        let medico = await response.json();
        let templete = `
        <div class="row">
            <div class="col-12 text-center">
                <img src="vistas/assets/images/icons/doctor.svg" alt="" width="100" class="img-circle img-fluid">
            </div>
           <div class="col-12">
                <h2>${medico.nombre_medico} ${medico.apaterno_medico} ${medico.amaterno_medico}</h2>
                <h4><strong>Especialidad: </strong> ${medico.nombre_especialidad} </h4>
            </div>
            <div class="col-12">
                <ul class="list-unstyled">
                    <li><i class="fa fa-building"></i> Domicilio: ${medico.domicilio_medico} </li>
                    <li><i class="fa fa-phone"></i> Telefono : ${medico.telefono_medico} </li>
                    <li><i class="fa fa-file-alt"></i> RFC : ${medico.rfc_medico} </li>
                    <li><i class="fa fa-file-medical-alt"></i> Cedula : ${medico.cedula_medico} </li>
                </ul>
            </div>
        </div>`;
        document.getElementById('modalInfo').innerHTML = templete;
    } catch (error) {
        console.log(error);
    }
}

const reloadDatatable = () => {
    $('#datatable').dataTable().fnDestroy();
    traerMedicosAll();
}


document.addEventListener("DOMContentLoaded", () => {
    traerMedicosAll();
    medicosEspecialidades();
});
